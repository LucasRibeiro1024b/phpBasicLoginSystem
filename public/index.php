<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/loginForm.css">
</head>

<?php
    session_start([
        'cache_limiter' => 'private',
        'read_and_close' => true,
    ]);

    require_once "../vendor/autoload.php";

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
        $url = "https://";
    else  
        $url = "http://";

    $url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $arrUrl = parse_url($url);
    $arrUrl['sections'] = explode('/', $arrUrl['path']);

    switch ($arrUrl['sections'][1]) {
        case 'register':
            include_once 'register.php';
            exit;

        case 'dashboard':
            include_once 'dashboard.php';
            exit;

        default:
            include_once 'login.php';
            exit;
    }
?>