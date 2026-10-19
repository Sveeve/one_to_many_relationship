
<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Airline Booking System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Airline Booking System</h1>

<h2>Register Passenger and Book Flight</h2>

<form action="core/handleForms.php" method="POST">

    <h3>Passenger Information</h3>

    First Name: <input type="text" name="first_name" required><br><br>

    Last Name: <input type="text" name="last_name" required><br><br>

    Email: <input type="email" name="email" required><br><br>

    Phone: <input type="text" name="phone" required><br><br>

    <hr>

    <h3>Booking Information</h3>

    Flight Number: <input type="text" name="flight_number" required><br><br>

    Origin: <input type="text" name="route_origin" required><br><br>

    Destination: <input type="text" name="route_destination" required><br><br>

    Assigned Seat: <input type="text" name="assigned_seat" required><br><br>

    Ticket Price: <input type="number" name="ticket_price" step="0.01" min="0" required><br><br>

    <input type="submit" name="registerAndBookBtn" value="Register and Book">

</form>

<hr>

<h2>Registered Passengers</h2>

<?php
$passengers = getAllPassengers($pdo);

foreach ($passengers as $row) {
?>

    <div class="container">

        <h3>Passenger ID: <?php echo $row['passenger_id']; ?></h3>

        <p>Name: <?php echo $row['first_name'] . " " . $row['last_name']; ?></p>

        <p>Email: <?php echo $row['email']; ?></p>

        <p>Phone: <?php echo $row['phone']; ?></p>

        <a href="viewbooking.php?passenger_id=<?php echo $row['passenger_id']; ?>">View Booking</a> |

        <a href="editregistration.php?passenger_id=<?php echo $row['passenger_id']; ?>">Edit Registration</a> |

        <a href="cancelregistration.php?passenger_id=<?php echo $row['passenger_id']; ?>">Cancel Registration</a>

    </div>

<?php
}
?>

</body>
</html>
