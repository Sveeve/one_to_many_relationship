<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>

<?php
$getPassengerByID = getPassengerByID(
    $pdo,
    $_GET['passenger_id']
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Passenger</title>
</head>
<body>

<h1>Edit Passenger Registration</h1>

<form action="core/handleForms.php?passenger_id=<?php echo $_GET['passenger_id']; ?>" method="POST">

    <p>
        <label>First Name</label>
        <input
            type="text"
            name="first_name"
            value="<?php echo $getPassengerByID['first_name']; ?>">
    </p>

    <p>
        <label>Last Name</label>
        <input
            type="text"
            name="last_name"
            value="<?php echo $getPassengerByID['last_name']; ?>">
    </p>

    <p>
        <label>Email</label>
        <input
            type="email"
            name="email"
            value="<?php echo $getPassengerByID['email']; ?>">
    </p>

    <p>
        <label>Phone</label>
        <input
            type="text"
            name="phone"
            value="<?php echo $getPassengerByID['phone']; ?>">
    </p>

    <input type="submit"
           name="editPassengerBtn"
           value="Update Passenger">

</form>

</body>
</html>