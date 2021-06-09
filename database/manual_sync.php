<?php
// Prevention for accessing the file through GET request
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    header("Location: ../index.php");
    die();
}
// Passcode entered from the user/moderator
$enteredCode = $_POST['passcode'];
// Correct passcode required for database synchronization
$passcode = '8rK6jCGW+mE+vsQhoWzNJw==';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Tracker</title>
    <?php require_once "../components/links.php" ?>
</head>

<body class="bg-light d-flex align-items-center text-center" style="height:100vh; font-size: 30px;">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <?php
                // Checking the passcode, if the passcode entered is not correct an error message is displayed and after 5 seconds a redirection to the main page happens.
                // Else if the passcode entered is correct the database starts updating
                if ($enteredCode != $passcode) {
                    echo "
                        <div class='alert alert-danger' role='alert'>
                                The passcode you entered is incorrect! You will be redirected back shortly... 
                                <div class='spinner-border' role='status'>
                                    <span class='visually-hidden'>Loading...</span>
                                </div>
                        </div>";
                    header("refresh: 5; ../index.php");
                } else if ($enteredCode === $passcode) {
                    header('Location: data_sync.php');
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>