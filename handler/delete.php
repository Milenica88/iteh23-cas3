<?php

if (isset($_POST["delete"])) {
    $idp = $_POST['delete-prijava']; //id prijave
    $_POST["delete"] = null;
    $_POST["delete-prijava"] = null;
    $status = Prijava::deleteById($idp, $conn);
    if ($status) {
        echo "Success";
    } else {
        echo "Failed";
    }
}
