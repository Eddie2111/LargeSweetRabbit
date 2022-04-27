<?php

include('dbconnect.php');
$name     = addslashes(trim($_REQUEST['name']));
$email    = trim($_REQUEST['email']);
$message  = addslashes(trim($_REQUEST['message']));
$conn->query("INSERT INTO `contactedus` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message')");
if ($conn->affected_rows > 0) {
    echo "success";
    header("Location: ../contact.php");
    exit();
} else {
    echo "failed to submit";
    header("Location: ../contact.php");
    exit();
}

?>
