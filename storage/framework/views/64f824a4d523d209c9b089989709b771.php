<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, Map!</title>
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    
    <!-- Inline CSS for map container -->
    <style>
        #map { height: 400px; }
        #coordinates { margin-top: 10px; }
    </style>
</head>
<body>
    <h1>Leaflet map using Laravel</h1>
    

    <!-- Container for the map -->
    <div id="map"></div>

    <!-- Form for inputting coordinates -->
    <form id="coordinates-form">
        <label for="latitude">Latitude:</label>
        <input type="text" id="latitude" name="latitude" required>
        <label for="longitude">Longitude:</label>
        <input type="text" id="longitude" name="longitude" required>
        <button type="submit">Show on Map</button>
    </form>

    <!-- Dropdown list for countries -->
    <select id="country">
        <option value="">Select Country</option>
        <!-- Country options will be populated dynamically using JavaScript -->
    </select>

    <!-- Dropdown list for cities -->
    <select id="city">
        <option value="">Select City</option>
        <!-- City options will be populated dynamically using JavaScript -->
    </select>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Your JavaScript file -->
    <script src="<?php echo e(asset('js/map.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\Kdp\Desktop\leaflet-master\resources\views/map.blade.php ENDPATH**/ ?>