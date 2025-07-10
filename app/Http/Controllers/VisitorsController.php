<?php

namespace App\Http\Controllers;

use App\Models\AssocFoundation;
use App\Models\Church;
use App\Models\Hospital;
use App\Models\Hotel;
use App\Models\JobHiring;
use App\Models\Ordinance;
use App\Models\Park;
use App\Models\Resolution;
use App\Models\Restaurant;
use App\Models\School;
use App\Models\SiteSetting;
use App\Models\TouristSpot;

class VisitorsController extends Controller
{
    public function showVisitors()
    {
        // Fetch site settings
        $siteSetting = SiteSetting::first();

        // Fetch data for the new sections
        $churches = Church::all();
        $hotels = Hotel::all();
        $jobOpportunities = JobHiring::all();
        $parks = Park::all();
        $restaurants = Restaurant::all();
        $schools = School::all();
        $touristSpots = TouristSpot::all();
        $hospitals = Hospital::all();

        // Return the view with the data
        return view('pages.visitors-lounge', compact(
            'siteSetting',
            'churches',
            'hotels',
            'jobOpportunities',
            'parks',
            'restaurants',
            'schools',
            'touristSpots',
            'hospitals'
        ));
    }

    public function ShowOrdinance()
    {
        $siteSetting = SiteSetting::first();
        $ordinances = Ordinance::all();
        $resolutions = Resolution::all();
        $assocfound = AssocFoundation::all();

        return view('pages.ordinance', compact(

            'siteSetting',
            'ordinances',
            'resolutions',
            'assocfound'

        ));
    }
}
