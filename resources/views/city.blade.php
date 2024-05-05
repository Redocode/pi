<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Details</title>
</head>
<body>
    <h1>City Details</h1>
    @if($city)
        <p>City: {{ $city->city }}</p>
        <p>Country: {{ $city->country }}</p>
        <p>Latitude: {{ $city->lat }}</p>
        <p>Longitude: {{ $city->lng }}</p>
        <p>City ASCII: {{ $city->city_ascii }}</p>
        <p>ISO2: {{ $city->iso2 }}</p>
        <p>ISO3: {{ $city->iso3 }}</p>
        <p>Admin Name: {{ $city->admin_name }}</p>
        <p>Capital: {{ $city->capital }}</p>
        <p>Population: {{ $city->population }}</p>
        <p>CSV ID: {{ $city->csv_id }}</p>
        <!-- Add more details as needed -->
    @else
        <p>No city found.</p>
    @endif
</body>
</html>
