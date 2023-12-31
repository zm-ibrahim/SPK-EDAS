<?php include 'templates/header.php';

if (isset($_SESSION['username'])) {
    header("location: dashboard/index.php");
}
?>
<?php
if (isset($_SESSION['flash_message'])) { ?>
    <div class="alert alert-<?= $_SESSION['flash_message'][1] ?> alert-dismissible fade show" role="alert">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <?= $_SESSION['flash_message'][0] ?>
        </div>
    </div>
<?php
    session_unset();
    session_destroy();
}
?>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <img src="../SPK/assets/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
                        <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">SPK EDAS</span></h4>
                        <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p>
                        <form method="POST" action="process/login.php" class="needs-validation" novalidate="">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="username" class="form-control" name="username" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your email
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    please fill in your password
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" name="login" tabindex="3">
                                    Login
                                </button>
                            </div>

                            <div class="mt-5 text-center">
                                Don't have an account? <a href="register.php">Create new one</a>
                            </div>
                        </form>

                        <div class="text-center mt-5 text-small">
                            Copyright &copy; zm-ibrahim | Fina Orivia
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../SPK/assets/img/unsplash/login-bg.jpg">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1>
                                <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
                            </div>
                            Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <?php include 'templates/footer.php' ?>