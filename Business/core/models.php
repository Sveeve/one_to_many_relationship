
<?php

// Insert passenger
function insertPassenger($pdo, $first_name, $last_name, $email, $phone)
{
    $sql = "INSERT INTO Passengers (first_name, last_name, email, phone)
            VALUES (?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $email, $phone]);
}

// Get all passengers
function getAllPassengers($pdo)
{
    $sql = "SELECT * FROM Passengers";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Get passenger by ID
function getPassengerByID($pdo, $passenger_id)
{
    $sql = "SELECT * FROM Passengers WHERE passenger_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$passenger_id]);
    return $stmt->fetch();
}

// Update passenger
function updatePassenger($pdo, $passenger_id, $first_name, $last_name, $email, $phone)
{
    $sql = "UPDATE Passengers
            SET first_name = ?, last_name = ?, email = ?, phone = ?
            WHERE passenger_id = ?";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        $first_name,
        $last_name,
        $email,
        $phone,
        $passenger_id
    ]);
}

// Delete passenger and their bookings
function deletePassenger($pdo, $passenger_id)
{
    // Delete bookings first
    $sql = "DELETE FROM Bookings WHERE passenger_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$passenger_id]);

    // Delete passenger
    $sql = "DELETE FROM Passengers WHERE passenger_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$passenger_id]);
}

// Insert booking
function insertBooking($pdo, $passenger_id, $flight_number, $route_origin, $route_destination, $assigned_seat, $ticket_price)
{
    $sql = "INSERT INTO Bookings
            (passenger_id, flight_number, route_origin, route_destination, assigned_seat, ticket_price)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        $passenger_id,
        $flight_number,
        $route_origin,
        $route_destination,
        $assigned_seat,
        $ticket_price
    ]);
}

// Get bookings by passenger
function getBookingsByPassenger($pdo, $passenger_id)
{
    $sql = "SELECT * FROM Bookings WHERE passenger_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$passenger_id]);
    return $stmt->fetchAll();
}

// Get booking by ID
function getBookingByID($pdo, $booking_id)
{
    $sql = "SELECT * FROM Bookings WHERE booking_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$booking_id]);
    return $stmt->fetch();
}

// Update booking
function updateBooking($pdo, $booking_id, $flight_number, $route_origin, $route_destination, $assigned_seat, $ticket_price)
{
    $sql = "UPDATE Bookings
            SET flight_number = ?, route_origin = ?, route_destination = ?,
                assigned_seat = ?, ticket_price = ?
            WHERE booking_id = ?";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        $flight_number,
        $route_origin,
        $route_destination,
        $assigned_seat,
        $ticket_price,
        $booking_id
    ]);
}

// Delete booking
function deleteBooking($pdo, $booking_id)
{
    $sql = "DELETE FROM Bookings WHERE booking_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$booking_id]);
}

?>
