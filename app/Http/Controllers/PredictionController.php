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
        // Validate the inputs
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

        // Gather the input features
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

        // Construct the command with features
        // $command = "C:/Users/Lenovo/anaconda3/python.exe ML_model/script.py " . implode(' ', $features);
        // $command = "ML_model/script.py " . implode(' ', $features);
        $command = "C:/Users/Lenovo/anaconda3/python.exe " . base_path('ML_model/script.py') . " " . implode(' ', $features);

        // Execute the Python script
        $output = [];
        $returnVar = 0;
    
        exec($command, $output, $returnVar);
               
        // Handle any errors
        // if ($returnVar !== 0) {
        //     return back()->withErrors(['error' => 'An error occurred while predicting.']);
        // }

        // Return the prediction result
        return back()->with('prediction', $output[0]);
    }
}
