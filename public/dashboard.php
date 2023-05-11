<?php
session_start();

echo "Hello, user with email " . $_SESSION['user_email'] . ' you succesfully logged in our system. 🎉';

?>