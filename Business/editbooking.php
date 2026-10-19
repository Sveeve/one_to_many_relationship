
<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

if (!isset($_GET['booking_id'])) {
    die("Booking ID is missing.");
}

$booking = getBookingByID($pdo, $_GET['booking_id']);

if (!$booking) {
    die("Booking not found.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Booking</title>
</head>
<body>

<h1>Edit Booking</h1>

<form action="core/handleForms.php?booking_id=<?php echo (int) $_GET['booking_id']; ?>" method="POST">

    <p>
        <label>Flight Number</label>
        <input type="text" name="flight_number"
        value="<?php echo htmlspecialchars($booking['flight_number']); ?>" required>
    </p>

    <p>
        <label>Origin</label>
        <input type="text" name="route_origin"
        value="<?php echo htmlspecialchars($booking['route_origin']); ?>" required>
    </p>

    <p>
        <label>Destination</label>
        <input type="text" name="route_destination"
        value="<?php echo htmlspecialchars($booking['route_destination']); ?>" required>
    </p>

    <p>
        <label>Seat</label>
        <input type="text" name="assigned_seat"
        value="<?php echo htmlspecialchars($booking['assigned_seat']); ?>" required>
    </p>

    <p>
        <label>Price</label>
        <input type="number" step="0.01" name="ticket_price"
        value="<?php echo htmlspecialchars($booking['ticket_price']); ?>" required>
    </p>

    <input type="submit" name="updateBookingBtn" value="Update Booking">

</form>

<br>
<a href="index.php">Back to Home</a>

</body>
</html>
