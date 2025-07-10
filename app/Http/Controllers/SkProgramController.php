<?php

namespace App\Http\Controllers;

use App\Models\SkProgram;

class SkProgramController extends Controller
{
    // Method to show the page with SK Programs
    public function index()
    {
        // Fetch all SK Programs
        $skPrograms = SkProgram::all();

        // Pass data to the view
        return view('your.view.name', [
            'skPrograms' => $skPrograms,
            // Add other variables if needed
        ]);
    }
}
