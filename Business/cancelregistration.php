
<?php
require_once 'core/models.php';
require_once 'core/dbConfig.php';

$passenger = getPassengerByID($pdo, $_GET['passenger_id']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Passenger</title>
</head>
<body>

<h1>Delete Passenger?</h1>

<?php if ($passenger) { ?>

    <h3><?php echo htmlspecialchars($passenger['first_name']); ?></h3>
    <h3><?php echo htmlspecialchars($passenger['last_name']); ?></h3>
    <h3><?php echo htmlspecialchars($passenger['email']); ?></h3>

    <form action="core/handleForms.php?passenger_id=<?php echo (int) $_GET['passenger_id']; ?>" method="POST">

        <p>Are you sure you want to delete this passenger?</p>

        <input type="submit" name="deletePassengerBtn" value="Delete">

    </form>

<?php } else { ?>

    <p>Passenger not found.</p>

<?php } ?>

</body>
</html>
