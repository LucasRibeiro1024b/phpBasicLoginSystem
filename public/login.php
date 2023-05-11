<?php
session_start();

use Lucas\BasicLoginSystem\model\User;

try {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if (empty($email) || empty($password)) {
        throw new Exception("");
    }

    $user = User::findByEmail($email);

    if (password_verify($password, $user->password_hash) === false) {
        throw new Exception("Invalid Password");
    }

    $_SESSION['user_logged_in'] = 'yes';
    $_SESSION['user_email'] = $email;

    header('HTTP/1.1 302 Redirect');
    header('Location: /dashboard');
} catch(\Exception $e) {
    $alert = $e->getMessage();
}

?>
<body>
    <section class="py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Login</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <form class="text-center" action="login" method="post">
                                <p class="text-danger"><?= $alert ?? '' ?></p>
                                <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Login</button></div>
                                <p class="text-muted"><a href="register">Sign Up</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>