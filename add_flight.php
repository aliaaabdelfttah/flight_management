<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $flight_number = $_POST['flight_number'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $departure_time = $_POST['departure_time'];
    $aircraft_id = $_POST['aircraft_id'];

    $sql = "INSERT INTO flights (flight_number, origin, destination, departure_time, aircraft_id) 
            VALUES ('$flight_number', '$origin', '$destination', '$departure_time', '$aircraft_id')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}

$aircraft_query = "SELECT * FROM aircrafts";
$aircraft_result = $conn->query($aircraft_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Flight</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Add Flight</h1>
    <form method="POST">
        <label for="flight_number">Flight Number:</label>
        <input type="text" id="flight_number" name="flight_number" required>
        
        <label for="origin">Origin:</label>
        <input type="text" id="origin" name="origin" required>
        
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required>
        
        <label for="departure_time">Departure Time:</label>
        <input type="datetime-local" id="departure_time" name="departure_time" required>
        
        <label for="aircraft_id">Aircraft:</label>
        <select id="aircraft_id" name="aircraft_id" required>
            <?php while($aircraft = $aircraft_result->fetch_assoc()): ?>
                <option value="<?php echo $aircraft['id']; ?>"><?php echo $aircraft['aircraft_number']; ?></option>
            <?php endwhile; ?>
        </select>

        <button type="submit">Add Flight</button>
    </form>
</body>
</html>

<?php $conn->close(); ?>
