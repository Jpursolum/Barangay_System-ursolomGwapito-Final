<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\BrgyCaptainCorner;
use App\Models\Gallery;
use App\Models\PhotoRelease;
use App\Models\SiteSetting;
use App\Models\Speech;

class brgycaptainController extends Controller
{
    public function showCaptainDetails()
    {
        // Fetch the latest Barangay Captain data
        $chairperson = BrgyCaptainCorner::latest()->first();

        // Fetch site settings and other related data
        $siteSetting = SiteSetting::first();
        $galleries = Gallery::all();
        $photoReleases = PhotoRelease::all();
        $speeches = Speech::all();
        $achievements = Achievement::all();

        // Return the view with the data
        return view('pages.captain-details', compact(
            'chairperson',
            'siteSetting',
            'galleries',
            'photoReleases',
            'speeches',
            'achievements'
        ));
    }
}
