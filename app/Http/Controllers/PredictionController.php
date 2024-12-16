<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PredictionController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function reset(Request $req){
        
        $req->session()->forget(['prediction', 'inputs']);
    
       
        return back();
    
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
            'temperature' => $request->input('temperature'),
            'humidity' => $request->input('humidity'),
            'pm25' => $request->input('pm25'),
            'pm10' => $request->input('pm10'),
            'no2' => $request->input('no2'),
            'so2' => $request->input('so2'),
            'co' => $request->input('co'),
            'proximity' => $request->input('proximity'),
            'population_density' => $request->input('population_density'),
        ];

        // Construct the command with features
        $command = "C:/Users/Lenovo/anaconda3/python.exe " . base_path('ML_model/script.py') . " " . implode(' ', $features);

        // Execute the Python script
        $output = [];
        $returnVar = 0;
    
        exec($command, $output, $returnVar);
        
        // Handle any errors
        if ($returnVar !== 0) {
            return back()->withErrors(['error' => 'An error occurred while predicting.']);
        }

        // Return the prediction result with inputs
        return back()->with([
            'prediction' => $output[0],
            'inputs' => $features,
        ]);
    }
}
