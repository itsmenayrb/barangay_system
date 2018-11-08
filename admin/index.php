<!-- this page is for login only --
-- after the user logged in --
-- he/she will be redirect to dashboard page -->
<?php include 'header.php'; ?>
    <?php if(!isset($_SESSION['Username'])) : ?>
        <nav class="navbar navbar-expand-md navbar-light bg-info">
            <a class="navbar-brand" href='index.php'><img src="../img/logo.circle.brand.png"/>Barangay Salitran II</a>
        </nav>
        <div class="container-fluid" id="login-container">
            <div class="card text-center border-primary">
                <div class="card-header">
                    <p class="form-text h3">Administrator Login</p>
                </div>
                <div class="card-body">
                    <?php include 'errors.php';?>
                    <form action="index.php" method="post" id="login-form">
                        <label for="username" class="form-text">Username or Email</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text fas fa-user"></span>
                            </div>
                            <input type="text" class="form-control" name="admin-username" id="username" required/>
                        </div>
                        <label for="password" class="form-text">Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text fas fa-lock"></span>
                            </div>
                            <input type="password" class="form-control" name="admin-password" id="password" required/>
                        </div><div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" name="admin-login" id="login" value="Login"/>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <small class="float-left form-text text-muted">Add user? <a href="admin-register.php" role="button">Click here.</a></small>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <small class="form-text text-muted float-right"><a href="admin-fpwd.php" role="button">Forgot Password?</a></small>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    &nbsp
                </div>
            </div>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['Position'])) : ?>
        <script type="text/javascript">window.location='dashboard.php';</script>
    <?php endif ?>