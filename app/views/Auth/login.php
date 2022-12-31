<?php require_once AppRoot . "/views/layouts/header.php"; ?>
    <div class="container-fluid p-0">

        <?php require_once AppRoot . "/views/layouts/navbar.php"; ?>
        <div class="container mt-1 bg-dark text-white p-5">
            <?php if (isset($_SESSION['register'])): ?>
                <div class="alert alert-success p-3 mx-auto">
                    <h4 class="text-center"><?php echo $_SESSION['register'] ?></h4>
                </div>
                <?php unset($_SESSION['register']); endif; ?>
            <div class="row m-0">
                <div class="col-6 offset-3">
                    <form action="<?php echo urlRoot ?>/public/auths/login" method="post">

                        <div class="d-block">
                            <label for="email"
                                   class="d-block mb-2">email</label>
                            <input type="text" name="email" id="email" class="form-control mb-2 <?php echo !empty($data['email_err']) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['email'] ?>">
                            <div class="invalid-feedback"><?php echo $data['email_err'] ?></div>

                        </div>
                        <div class="d-block">
                            <label for="password"
                                   class="d-block mb-2 ">password</label>
                            <input type="password" name="password" id="password" class="form-control mb-2 <?php echo !empty($data['password_err']) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['password'] ?>">
                            <div class="invalid-feedback"><?php echo $data['password_err'] ?></div>
                        </div>
                        <div>
                            <input type="submit" value="Login" class="btn btn-success">
                        </div>

                        <a href="<?php echo urlRoot ?>/public/auths/register" ">عضو نیستید؟خب ثبت نام کنید!</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
<?php require_once AppRoot . "/Views/layouts/footer.php"; ?>