<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;

class CitezensCharterController extends Controller
{
    public function showIndex()
    {

        $siteSetting = SiteSetting::first();

        return view('pages.citezens_charter', compact(

            'siteSetting',
        ));
    }
}
