
<?php
require_once 'dbConfig.php';
require_once 'models.php';

// Register passenger and book flight
if (isset($_POST['registerAndBookBtn'])) {

    try {
        $pdo->beginTransaction();

        // Add passenger
        insertPassenger(
            $pdo,
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['email'],
            $_POST['phone']
        );

        // Get passenger ID
        $passenger_id = $pdo->lastInsertId();

        // Add booking
        insertBooking(
            $pdo,
            $passenger_id,
            $_POST['flight_number'],
            $_POST['route_origin'],
            $_POST['route_destination'],
            $_POST['assigned_seat'],
            $_POST['ticket_price']
        );

        $pdo->commit();

        header("Location: ../index.php");
        exit();

    } catch (Exception $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }

        die("Error: " . $e->getMessage());
    }
}

// Insert passenger only
if (isset($_POST['insertPassengerBtn'])) {
    insertPassenger(
        $pdo,
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['phone']
    );

    header("Location: ../index.php");
    exit();
}

// Edit passenger
if (isset($_POST['editPassengerBtn'])) {
    updatePassenger(
        $pdo,
        $_GET['passenger_id'],
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['phone']
    );

    header("Location: ../index.php");
    exit();
}

// Delete passenger
if (isset($_POST['deletePassengerBtn'])) {
    deletePassenger($pdo, $_GET['passenger_id']);

    header("Location: ../index.php");
    exit();
}

// Edit booking
if (isset($_POST['updateBookingBtn'])) {
    updateBooking(
        $pdo,
        $_GET['booking_id'],
        $_POST['flight_number'],
        $_POST['route_origin'],
        $_POST['route_destination'],
        $_POST['assigned_seat'],
        $_POST['ticket_price']
    );

    header("Location: ../index.php");
    exit();
}

// Cancel booking
if (isset($_POST['deleteBookingBtn'])) {
    deleteBooking($pdo, $_GET['booking_id']);

    header("Location: ../index.php");
    exit();
}
?>
