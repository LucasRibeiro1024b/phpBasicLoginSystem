<?php
session_start();

if ($_SESSION['user_logged_in'] == 'no') {
    header('HTTP/1.1 302 Redirect');
    header('Location: /');
    exit();
}

echo "Hello, user with email " . $_SESSION['user_email'] . ' you succesfully logged in our system. 🎉';

?>


<form action="logout.php">
    <button type="submit">Logout</button>
</form>