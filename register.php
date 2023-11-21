<?php include 'templates/header.php'; ?>
<script>
    function check(data) {
        let confirm = document.getElementById("password2").classList;
        let actual = document.getElementById("password").value;
        let button = document.getElementById('button');
        if (data !== actual) {
            button.style.display = "none";
            // button.setAttribute("disabled");
            confirm.add('is-invalid');
            document.getElementById("invalid").innerHTML = 'Password does not match !';
        } else {
            button.style.display = "block";
            // button.removeAttribute("disabled");
            confirm.remove('is-invalid');
            document.getElementById("invalid").innerHTML = '';
        }
    }
</script>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="../SPK/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="process/register.php">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="username">Username</label>
                                            <input id="username" type="username" class="form-control" name="username" required>
                                            <div class="invalid-feedback">
                                                isi Username anda
                                            </div>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" class="form-control" name="email" required>
                                            <div class="invalid-feedback">
                                                isi email anda
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="d-block">Password Confirmation</label>
                                            <input id="password2" type="password" class="form-control" name="password-confirm" onkeyup="check(this.value)">
                                            <div class="invalid-feedback">
                                                Password does not match !
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" form-group">
                                        <button id="button" name="register" type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; zm-ibrahim | Fina Orivia
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include 'templates/footer.php'; ?>