<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Quality Predictor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 d-flex flex-column align-items-center">

    <!-- Display Success Message -->
    @if(session('prediction'))
        <div class="alert alert-success col-7">
            <strong>Prediction:</strong> {{ session('prediction') }}
        </div>
    @endif

    <!-- Display Validation Errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/predict" method="POST" class="shadow p-4 rounded bg-light col-7 ">
        @csrf

        <h1 class="text-center mb-5 text-primary">Air Quality Predictor</h1>
        
        <div class="d-flex justify-content-around">
            
            <div class="">
            <!-- Temperature -->
            <div class="mb-3">
                <label for="temperature" class="form-label">Temperature (°C):</label>
                <input type="number" step="0.001" class="form-control" id="temperature" name="temperature" value="{{ old('temperature') }}" required>
            </div>

            <!-- Humidity -->
            <div class="mb-3">
                <label for="humidity" class="form-label">Humidity (%):</label>
                <input type="number" step="0.001" class="form-control" id="humidity" name="humidity" value="{{ old('humidity') }}" required>
            </div>

            <!-- PM2.5 -->
            <div class="mb-3">
                <label for="pm25" class="form-label">PM2.5 (µg/m³):</label>
                <input type="number" step="0.001" class="form-control" id="pm25" name="pm25" value="{{ old('pm25') }}" required>
            </div>

            <!-- PM10 -->
            <div class="mb-3">
                <label for="pm10" class="form-label">PM10 (µg/m³):</label>
                <input type="number" step="0.001" class="form-control" id="pm10" name="pm10" value="{{ old('pm10') }}" required>
            </div>


                
            </div>
            <div class="">
                 <!-- SO2 -->
            <div class="mb-3">
                <label for="so2" class="form-label">SO2 (µg/m³):</label>
                <input type="number" step="0.001" class="form-control" id="so2" name="so2" value="{{ old('so2') }}" required>
            </div>

            <!-- CO -->
            <div class="mb-3">
                <label for="co" class="form-label">CO (ppm):</label>
                <input type="number" step="0.001" class="form-control" id="co" name="co" value="{{ old('co') }}" required>
            </div>

            <!-- Proximity to Industrial Areas -->
            <div class="mb-3">
                <label for="proximity" class="form-label">Proximity to Industrial Areas (km):</label>
                <input type="number" step="0.001" class="form-control" id="proximity" name="proximity" value="{{ old('proximity') }}" required>
            </div>

            <!-- Population Density -->
            <div class="mb-3">
                <label for="population_density" class="form-label">Population Density (people/km²):</label>
                <input type="number" step="0.001" class="form-control" id="population_density" name="population_density" value="{{ old('population_density') }}" required>
            </div>

                
            </div>

             
           
        </div>
        <div class="mx-5 d-flex flex-column justify-center align-items-center px-3 pt-1">
             <!-- NO2 -->
            <div class="mb-3 col-12">
                <label for="no2" class="form-label">NO2 (µg/m³):</label>
                <input type="number" step="0.001" class="form-control" id="no2" name="no2" value="{{ old('no2') }}" required>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary my-3 mx-3">Predict</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
