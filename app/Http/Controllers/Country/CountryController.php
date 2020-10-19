<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function country() {
        return response()->json(Country::get(), 200);
    }

    public function countryById($id) {
        $country = Country::find($id);

        if(is_null($country)){
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }

        return response()->json($country, 200);
    }

    public function countrySave(Request $request) {
        $rules = [
            'alias' => 'required|min:2|max:2',
            'name' => 'required|min:3',
            'name_en' => 'required|min:3'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $country = Country::create($request->all());
        return response()->json($country, 201);
    }

    public function countryEdit(Request $request, $id) {
        $rules = [
            'alias' => 'min:2|max:2',
            'name' => 'min:3',
            'name_en' => 'min:3'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $country = Country::find($id);

        if(is_null($country)){
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }

        $country->update($request->all());

        return response()->json($country, 200);
    }

    public function countryDestroy(Request $request, $id) {
        $country = Country::find($id);

        if(is_null($country)){
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }

        $country->delete();
        return response()->json(204);
    }
}
