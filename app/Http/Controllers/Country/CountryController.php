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
}
