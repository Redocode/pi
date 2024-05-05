// Initialize the map
var map = L.map('map').setView([34.020882, -6.841650], 13); // Rabat's coordinates

// Add a base tile layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var marker = null; // Variable to store the marker

// Function to get place name from coordinates using reverse geocoding
function getPlaceName(latitude, longitude) {
    return fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`)
        .then(response => response.json())
        .then(data => {
            if (data.display_name) {
                return data.display_name;
            } else {
                return 'Unknown place';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            return 'Unknown place';
        });
}

// Populate country dropdown
$.ajax({
    url: '/countries',
    method: 'GET',
    success: function (response) {
        // Populate country dropdown
        response.forEach(function (country) {
            $('#country').append('<option value="' + country + '">' + country + '</option>');
        });

        // Event listener for country selection
        $('#country').change(function () {
            var country = $(this).val();
            if (country) {
                // Send AJAX request to fetch cities
                fetch('/cities/' + country)
                    .then(response => response.json())
                    .then(data => {
                        // Clear existing options
                        var cityDropdown = $('#city');
                        cityDropdown.empty().append('<option value="">Select City</option>');
                        // Add options for cities
                        data.forEach(city => {
                            cityDropdown.append('<option value="' + city + '">' + city + '</option>');
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching cities:', error);
                    });
            } else {
                // Clear city dropdown if no country is selected
                $('#city').empty().append('<option value="">Select City</option>');
            }
        });
    },
    error: function (xhr, status, error) {
        console.error('Error fetching countries:', error);
    }
});

// Event listener for country selection
$('#country').change(function () {
    var country = $(this).val();
    if (country) {
        // Send AJAX request to fetch cities
        fetch('/cities/' + country)
            .then(response => response.json())
            .then(data => {
                // Clear existing options
                var cityDropdown = $('#city');
                cityDropdown.empty().append('<option value="">Select City</option>');
                // Add options for cities
                data.forEach(city => {
                    cityDropdown.append('<option value="' + city + '">' + city + '</option>');
                });
            })
            .catch(error => {
                console.error('Error fetching cities:', error);
            });
    } else {
        // Clear city dropdown if no country is selected
        $('#city').empty().append('<option value="">Select City</option>');
    }
});

// Event listener for city selection
$('#city').change(function () {
    var selectedCity = $(this).val();
    if (selectedCity) {
        // Here, you need to fetch the coordinates of the selected city from your backend
        // Replace 'fetchCityCoordinates' with the actual endpoint to fetch city coordinates
        fetch('/city-coordinates/' + selectedCity)
            .then(response => response.json())
            .then(data => {
                // Update the latitude and longitude fields with the coordinates of the selected city
                $('#latitude').val(data.latitude);
                $('#longitude').val(data.longitude);
            })
            .catch(error => {
                console.error('Error fetching city coordinates:', error);
            });
    }
});

// Event listener for map click
map.on('click', function (e) {
    var clickedLatLng = e.latlng; // Get the clicked coordinates

    // Update the coordinates input fields
    document.getElementById('latitude').value = clickedLatLng.lat;
    document.getElementById('longitude').value = clickedLatLng.lng;

    // Remove the previous marker if it exists
    if (marker !== null) {
        map.removeLayer(marker);
    }

    // Get the place name from coordinates using reverse geocoding
    getPlaceName(clickedLatLng.lat, clickedLatLng.lng)
        .then(placeName => {
            // Add a new marker at the clicked coordinates
            marker = L.marker(clickedLatLng).addTo(map);

            // Bind a popup to the marker with the place name
            marker.bindPopup(placeName).openPopup();
        });
});

// Event listener for form submission
document.getElementById('coordinates-form').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Get the input values
    var latitude = parseFloat(document.getElementById('latitude').value);
    var longitude = parseFloat(document.getElementById('longitude').value);

    // Validate latitude and longitude values
    if (!isNaN(latitude) && !isNaN(longitude)) {
        // Update the map view
        map.setView([latitude, longitude], 13);

        // Remove the previous marker if it exists
        if (marker !== null) {
            map.removeLayer(marker);
        }

        // Get the place name from coordinates using reverse geocoding
        getPlaceName(latitude, longitude)
            .then(placeName => {
                // Add a new marker at the specified coordinates
                marker = L.marker([latitude, longitude]).addTo(map);

                // Bind a popup to the marker with the place name
                marker.bindPopup(placeName).openPopup();
            });
    } else {
        alert('Please enter valid latitude and longitude values.');
    }
});
