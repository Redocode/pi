<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Details</title>
</head>
<body>
    <h1>City Details</h1>
    <?php if($city): ?>
        <p>City: <?php echo e($city->city); ?></p>
        <p>Country: <?php echo e($city->country); ?></p>
        <p>Latitude: <?php echo e($city->lat); ?></p>
        <p>Longitude: <?php echo e($city->lng); ?></p>
        <p>City ASCII: <?php echo e($city->city_ascii); ?></p>
        <p>ISO2: <?php echo e($city->iso2); ?></p>
        <p>ISO3: <?php echo e($city->iso3); ?></p>
        <p>Admin Name: <?php echo e($city->admin_name); ?></p>
        <p>Capital: <?php echo e($city->capital); ?></p>
        <p>Population: <?php echo e($city->population); ?></p>
        <p>CSV ID: <?php echo e($city->csv_id); ?></p>
        <!-- Add more details as needed -->
    <?php else: ?>
        <p>No city found.</p>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\Kdp\Desktop\leaflet-master\resources\views/city.blade.php ENDPATH**/ ?>