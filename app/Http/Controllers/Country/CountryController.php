<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function country() {
        return response()->json(Country::get(), 200);
    }

    public function countryById($id) {
        return response()->json(Country::find($id), 200);
    }

    public function countrySave(Request $request) {
        $country = Country::create($request->all());
        return response()->json($country, 201);
    }

    public function countryEdit(Request $request, Country $country) {
        $country->update($request->all());
        return response()->json($country, 200);
    }

    public function countryDestroy(Request $request, Country $country) {
        $country->delete();
        return response()->json(204);
    }
}
