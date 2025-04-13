<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aircraft_number = $_POST['aircraft_number'];
    $model = $_POST['model'];
    $capacity = $_POST['capacity'];
    $manufacturer = $_POST['manufacturer'];

    $sql = "INSERT INTO aircrafts (aircraft_number, model, capacity, manufacturer) 
            VALUES ('$aircraft_number', '$model', '$capacity', '$manufacturer')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Aircraft</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Add Aircraft</h1>
    <form method="POST">
        <label for="aircraft_number">Aircraft Number:</label>
        <input type="text" id="aircraft_number" name="aircraft_number" required>
        
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required>
        
        <label for="capacity">Capacity:</label>
        <input type="number" id="capacity" name="capacity" required>
        
        <label for="manufacturer">Manufacturer:</label>
        <input type="text" id="manufacturer" name="manufacturer" required>
        
        <button type="submit">Add Aircraft</button>
    </form>
</body>
</html>
