<?php require_once AppRoot . "/views/admin/header.php"; ?>
    <div class="container-fluid p-0">
        <?php require_once AppRoot . "/views/admin/navbar.php"; ?>
        <div class="container mt-1 bg-dark text-white p-5">
            <div class="row m-0">
                <div class="col-6 offset-3">
                    <h3 class="text-info text-center">create-seo-dashboard</h3>
                </div>
                <div class="col-6 offset-3">
                    <form action="<?php echo urlRoot?>/public/seoes/store" method="post" enctype="multipart/form-data">
                        <div class="d-block">
                            <label for="title" class="d-block mb-2">title</label>
                            <input type="text" name="title" id="title"
                                   class="form-control mb-2  <?php echo !empty($data['title_err']) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['title'] ?>">
                            <div class="invalid-feedback"><?php echo $data['title_err'] ?></div>
                        </div>
                        <div class="d-block">
                            <label for="author"
                                   class="d-block mb-2">author</label>
                            <input type="text" name="author" id="author" class="form-control mb-2 <?php echo !empty($data['author_err']) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['author'] ?>">
                            <div class="invalid-feedback"><?php echo $data['author_err'] ?></div>

                        </div>
                        <div class="d-block">
                            <label for="description"
                                   class="d-block mb-2">description</label>
                            <textarea type="text" name="description" id="description" class="form-control mb-2 <?php echo !empty($data['description_err']) ? 'is-invalid' : ''; ?>"><?php echo $data['description'] ?></textarea>
                            <div class="invalid-feedback"><?php echo $data['description_err'] ?></div>

                        </div>
                        <div class="d-block">
                            <label for="keywords"
                                   class="d-block mb-2">keywords</label>
                            <textarea type="text" name="keywords" id="keywords" class="form-control mb-2 <?php echo !empty($data['keywords_err']) ? 'is-invalid' : ''; ?>"><?php echo $data['keywords'] ?></textarea>
                            <div class="invalid-feedback"><?php echo $data['keywords_err'] ?></div>

                        </div>

                        <div>
                            <input type="submit" value="create" class="btn btn-success">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
<?php require_once AppRoot . "/Views/admin/footer.php"; ?>