<?php
include('db.php');

// استعلام لاسترجاع الطائرات والرحلات
$aircraft_query = "SELECT * FROM aircrafts";
$aircraft_result = $conn->query($aircraft_query);

$flights_query = "SELECT * FROM flights";
$flights_result = $conn->query($flights_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Flight Management System</h1>
        <nav>
            <a href="add_aircraft.php">Add Aircraft</a> |
            <a href="add_flight.php">Add Flight</a>
        </nav>
    </header>

    <h2>Aircraft List</h2>
    <table>
        <thead>
            <tr>
                <th>Aircraft Number</th>
                <th>Model</th>
                <th>Capacity</th>
                <th>Manufacturer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($aircraft = $aircraft_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $aircraft['aircraft_number']; ?></td>
                    <td><?php echo $aircraft['model']; ?></td>
                    <td><?php echo $aircraft['capacity']; ?></td>
                    <td><?php echo $aircraft['manufacturer']; ?></td>
                    <td>
                        <a href="edit_aircraft.php?id=<?php echo $aircraft['id']; ?>">Edit</a> |
                        <a href="delete_aircraft.php?id=<?php echo $aircraft['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2>Flight List</h2>
    <table>
        <thead>
            <tr>
                <th>Flight Number</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Departure Time</th>
                <th>Aircraft</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($flight = $flights_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $flight['flight_number']; ?></td>
                    <td><?php echo $flight['origin']; ?></td>
                    <td><?php echo $flight['destination']; ?></td>
                    <td><?php echo $flight['departure_time']; ?></td>
                    <td><?php echo $flight['aircraft_id']; ?></td>
                    <td>
                        <a href="edit_flight.php?id=<?php echo $flight['id']; ?>">Edit</a> |
                        <a href="delete_flight.php?id=<?php echo $flight['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <footer>
        <p>Flight Management System &copy; 2025</p>
    </footer>
</body>
</html>

<?php $conn->close(); ?>
