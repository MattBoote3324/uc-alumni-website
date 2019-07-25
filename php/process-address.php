<?php
include_once 'db-connect.php';
include_once 'functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

if (isset($_POST['city'], $_POST['postcode'], $_POST['country'])) {
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $country = $_POST['country'];

    updateAddress($city, $postcode, $country, $mysqli);
    header('Location: ../portal.php');
} else {
    // The correct POST variables were not sent to this page.
    header('Location: ../error.php?err=We could not update your address details.');
    exit();
}
?>
