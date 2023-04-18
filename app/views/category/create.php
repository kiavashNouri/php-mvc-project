<?php require_once AppRoot . "/views/admin/header.php"; ?>
    <div class="container-fluid p-0">
        <?php require_once AppRoot . "/views/admin/navbar.php"; ?>
        <div class="container mt-1 bg-dark text-white p-5">
            <?php if (isset($_SESSION['create'])): ?>
                <div class="alert alert-success p-3 m-3 mx-auto">
                    <h4 class="text-center"><?php echo $_SESSION['create'] ?></h4>
                </div>
                <?php unset($_SESSION['create']); endif; ?>
            <div class="row m-0">
                <div class="col-6 offset-3">
                    <h3 class="text-info text-center">create-category-dashboard</h3>
                </div>
                <!--                --><?php //var_dump($data); ?>
                <div class="col-6 offset-3">
                    <form action="<?php echo urlRoot?>/public/categories/store" method="post" enctype="multipart/form-data">
                        <div class="d-block">
                            <label for="image" class="d-block mb-2">image</label>
                            <input type="file" name="image" id="image"
                                   class="form-control mb-2  <?php echo !empty($data['image_err']) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['image'] ?>">
                            <div class="invalid-feedback"><?php echo $data['image_err'] ?></div>
                        </div>
                        <div class="d-block">
                            <label for="title"
                                   class="d-block mb-2">title</label>
                            <input type="text" name="title" id="title" class="form-control mb-2 <?php echo !empty($data['title_err']) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['title'] ?>">
                            <div class="invalid-feedback"><?php echo $data['title_err'] ?></div>

                        </div>
                        <div class="d-block">
                            <label for="alt"
                                   class="d-block mb-2 ">alt</label>
                            <input type="text" name="alt" id="alt" value="<?php echo $data['alt'] ?>" class="form-control <?php echo !empty($data['alt_err']) ? 'is-invalid' : ''; ?>">

                            <div class="invalid-feedback"><?php echo $data['alt_err'] ?></div>
                        </div>
                        <div class="d-block">
                            <label for="description"
                                   class="d-block mb-2">description</label>
                            <textarea type="text" name="description" id="description" class="form-control mb-2 <?php echo !empty($data['description_err']) ? 'is-invalid' : ''; ?>"
                            ><?php echo $data['description'] ?></textarea>
                            <div class="invalid-feedback"><?php echo $data['description_err'] ?></div>

                        </div>
                        <div>
                            <input type="submit" value="Register" class="btn btn-success">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
<?php require_once AppRoot . "/Views/admin/footer.php"; ?>