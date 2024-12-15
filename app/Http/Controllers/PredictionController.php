<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PredictionController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function predict(Request $request)
    {
        $request->validate([
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'pm25' => 'required|numeric',
            'pm10' => 'required|numeric',
            'no2' => 'required|numeric',
            'so2' => 'required|numeric',
            'co' => 'required|numeric',
            'proximity' => 'required|numeric',
            'population_density' => 'required|numeric',
        ]);

        $features = [
            $request->input('temperature'),
            $request->input('humidity'),
            $request->input('pm25'),
            $request->input('pm10'),
            $request->input('no2'),
            $request->input('so2'),
            $request->input('co'),
            $request->input('proximity'),
            $request->input('population_density'),
        ];
        $command = escapeshellcmd("C:/Users/user/AppData/Local/Programs/Python/Python312/python.exe " . storage_path('app/scripts/script.py') . " " . implode(' ', $features));

        $output = null;
        $return_var = null;

        exec($command, $output, $return_var);

//        if ($return_var !== 0) {
//            return back()->withErrors(['error' => 'An error occurred while predicting.']);
//        }

        return back()->with('prediction', $output[0]);
    }
}

