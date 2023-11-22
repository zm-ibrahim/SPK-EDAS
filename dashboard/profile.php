<?php include 'templates/layout.php'; ?>

<?php
include '../connect.php';

$sql = "SELECT * FROM informasi_pengguna WHERE id=$id";
$profile = mysqli_query($connect, $sql);
$profile = $profile->fetch_assoc();

?>
<!-- Validation -->
<script>
    function check(data) {
        let confirm = document.getElementById("password_confirmation").classList;
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

<!-- Validation Ends -->


<section class="section">
    <div class="section-header">
        <h1>Profie</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <form method="post" action="../dashboard/process/profile.php" class="needs-validation" novalidate="" enctype="multipart/form-data">
                <div class="card-header">
                    <h4>Edit Profile</h4>
                </div>
                <div class="card-body">

                    <!-- ALERT -->
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
                    }
                    ?>

                    <!-- ALERT ENDS -->

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" class="form-control" value="<?= $profile['username'] ?>" required="">
                        <div class="invalid-feedback">
                            Email harus diisi
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" class="form-control" value="<?= $profile['email'] ?>" required="">
                        <div class="invalid-feedback">
                            Email harus diisi
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <input id="old_password" name="oldpassword" type="password" class="form-control" required="">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password" class="d-block">New Password</label>
                            <input id="password" type="password" class="form-control" name="newpassword">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="password_confirmation" class="d-block">New Password Confirmation</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" onkeyup="check(this.value)">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary" name="submit" id="button">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php include 'templates/layout-bawah.php'; ?>