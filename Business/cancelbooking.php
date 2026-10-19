<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>

<?php $booking = getBookingByID($pdo, $_GET['booking_id']); ?>

<h1>Are you sure you want to cancel this booking?</h1>

<p>Flight Number: <?php echo $booking['flight_number']; ?></p>

<form action="core/handleForms.php?booking_id=<?php echo $_GET['booking_id']; ?>" method="POST">
    <input type="submit" name="deleteBookingBtn" value="Cancel Booking">
</form>
`