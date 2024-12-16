<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Quality Predictor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <!-- Display Success Message -->
    @if(session('prediction'))
        <div class="alert alert-success">
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

    <form action="/predict" method="POST" class="shadow p-4 rounded bg-light">
        @csrf

        <h1 class="text-center mb-4 text-primary">Air Quality Predictor</h1>

        <div class="row g-3">
            <!-- Temperature -->
            <div class="col-md-6">
                <label for="temperature" class="form-label">Temperature (°C):</label>
                <input 
                    type="number" 
                    step="0.001" 
                    class="form-control" 
                    id="temperature" 
                    name="temperature" 
                    value="{{ session('inputs.temperature', old('temperature')) }}" 
                    required>
            </div>

            <!-- Humidity -->
            <div class="col-md-6">
                <label for="humidity" class="form-label">Humidity (%):</label>
                <input 
                    type="number" 
                    step="0.001" 
                    class="form-control" 
                    id="humidity" 
                    name="humidity" 
                    value="{{ session('inputs.humidity', old('humidity')) }}" 
                    required>
            </div>

            <!-- PM2.5 -->
            <div class="col-md-6">
                <label for="pm25" class="form-label">PM2.5 (µg/m³):</label>
                <input 
                    type="number" 
                    step="0.001" 
                    class="form-control" 
                    id="pm25" 
                    name="pm25" 
                    value="{{ session('inputs.pm25', old('pm25')) }}" 
                    required>
            </div>

            <!-- PM10 -->
            <div class="col-md-6">
                <label for="pm10" class="form-label">PM10 (µg/m³):</label>
                <input 
                    type="number" 
                    step="0.001" 
                    class="form-control" 
                    id="pm10" 
                    name="pm10" 
                    value="{{ session('inputs.pm10', old('pm10')) }}" 
                    required>
            </div>

            <!-- NO2 -->
            <div class="col-md-6">
                <label for="no2" class="form-label">NO2 (µg/m³):</label>
                <input 
                    type="number" 
                    step="0.001" 
                    class="form-control" 
                    id="no2" 
                    name="no2" 
                    value="{{ session('inputs.no2', old('no2')) }}" 
                    required>
            </div>

            <!-- SO2 -->
            <div class="col-md-6">
                <label for="so2" class="form-label">SO2 (µg/m³):</label>
                <input 
                    type="number" 
                    step="0.001" 
                    class="form-control" 
                    id="so2" 
                    name="so2" 
                    value="{{ session('inputs.so2', old('so2')) }}" 
                    required>
            </div>

            <!-- CO -->
            <div class="col-md-6">
                <label for="co" class="form-label">CO (ppm):</label>
                <input 
                    type="number" 
                    step="0.001" 
                    class="form-control" 
                    id="co" 
                    name="co" 
                    value="{{ session('inputs.co', old('co')) }}" 
                    required>
            </div>

            <!-- Proximity to Industrial Areas -->
            <div class="col-md-6">
                <label for="proximity" class="form-label">Proximity to Industrial Areas (km):</label>
                <input 
                    type="number" 
                    step="0.001" 
                    class="form-control" 
                    id="proximity" 
                    name="proximity" 
                    value="{{ session('inputs.proximity', old('proximity')) }}" 
                    required>
            </div>

            <!-- Population Density -->
            <div class="col-md-12">
                <label for="population_density" class="form-label">Population Density (people/km²):</label>
                <input 
                    type="number" 
                    step="0.001" 
                    class="form-control" 
                    id="population_density" 
                    name="population_density" 
                    value="{{ session('inputs.population_density', old('population_density')) }}" 
                    required>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" formaction="/reset-r" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Predict</button>
        </div>
    </form>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
