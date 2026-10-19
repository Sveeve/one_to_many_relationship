
<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

if (!isset($_GET['passenger_id'])) {
    die("Passenger ID is missing.");
}

$passenger_id = (int) $_GET['passenger_id'];

$passenger = getPassengerByID($pdo, $passenger_id);
$bookings = getBookingsByPassenger($pdo, $passenger_id);

if (!$passenger) {
    die("Passenger not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Booking</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>View Booking</h1>

    <h2>Passenger Information</h2>

    <p>
        <strong>Passenger ID:</strong>
        <?php echo htmlspecialchars($passenger['passenger_id']); ?>
    </p>

    <p>
        <strong>Name:</strong>
        <?php echo htmlspecialchars($passenger['first_name'] . ' ' . $passenger['last_name']); ?>
    </p>

    <p>
        <strong>Email:</strong>
        <?php echo htmlspecialchars($passenger['email']); ?>
    </p>

    <p>
        <strong>Phone:</strong>
        <?php echo htmlspecialchars($passenger['phone']); ?>
    </p>

    <hr>

    <h2>Booking Details</h2>

    <?php if (!empty($bookings)) { ?>

        <?php foreach ($bookings as $booking) { ?>

            <div class="container" style="border: 1px solid black; width: 60%; padding: 15px; margin-top: 15px;">

                <p>
                    <strong>Booking ID:</strong>
                    <?php echo htmlspecialchars($booking['booking_id']); ?>
                </p>

                <p>
                    <strong>Flight Number:</strong>
                    <?php echo htmlspecialchars($booking['flight_number']); ?>
                </p>

                <p>
                    <strong>Origin:</strong>
                    <?php echo htmlspecialchars($booking['route_origin']); ?>
                </p>

                <p>
                    <strong>Destination:</strong>
                    <?php echo htmlspecialchars($booking['route_destination']); ?>
                </p>

                <p>
                    <strong>Assigned Seat:</strong>
                    <?php echo htmlspecialchars($booking['assigned_seat']); ?>
                </p>

                <p>
                    <strong>Ticket Price:</strong>
                    <?php echo htmlspecialchars($booking['ticket_price']); ?>
                </p>

                <div style="margin-top: 10px;">

                    <a href="editbooking.php?booking_id=<?php echo (int) $booking['booking_id']; ?>">
                        Edit Booking
                    </a>

                    |

                    <a href="cancelbooking.php?booking_id=<?php echo (int) $booking['booking_id']; ?>">
                        Cancel Booking
                    </a>

                </div>

            </div>

        <?php } ?>

    <?php } else { ?>

        <p>No bookings found for this passenger.</p>

    <?php } ?>

    <br>

    <a href="index.php">Back to Passengers</a>

</body>
</html>
