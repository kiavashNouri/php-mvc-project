<?php require_once AppRoot . "/views/admin/header.php"; ?>
    <div class="container-fluid p-0">
        <?php require_once AppRoot . "/views/admin/navbar.php"; ?>
        <div class="container mt-1 bg-dark text-white p-5">
            <div class="row m-0">
                <div class="col-6 offset-3">
                    <h3 class="text-info text-center">create-panel-dashboard</h3>
                </div>
                <div class="col-6 offset-3">
                    <form action="<?php echo urlRoot?>/public/dashboards/update/<?php echo $data['id']?>" method="post" enctype="multipart/form-data">
                        <div class="d-block">
                            <label for="image" class="d-block mb-2">image</label>
                            <input type="file" name="image" id="image"
                                   class="form-control mb-2  <?php echo !empty($data['dashboard']['image_err']) ? 'is-invalid' : ''; ?>"
                            >
                            <img src="<?php echo showImage("dashboard",$data['image']) ?>" width="50" alt="">
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
                            <label for="link"
                                   class="d-block mb-2 ">link</label>
                            <select name="link" id="link" class="form-select dashboard-form-select">
                                <option value="<?php echo urlRoot?>/public/seoes/create">seo</option>
                                <option value="<?php echo urlRoot?>/public/slider/create">slider</option>
                                <option value="<?php echo urlRoot?>/public/category/create">category</option>
                                <option value="<?php echo urlRoot?>/public/products/create">product</option>
                                <option value="<?php echo urlRoot?>/public/abouts/create">about us</option>
                                <option value="<?php echo urlRoot?>/public/contacts/create">contact us</option>
                                <option value="<?php echo urlRoot?>/public/socials/create">social</option>
                            </select>
                            <div class="invalid-feedback"><?php echo $data['link_err'] ?></div>
                        </div>
                        <div>
                            <input type="submit" value="update" class="btn btn-success">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        let selectInput=document.querySelector('select.dashboard-form-select').children;
        let optionText=[];
        for (const item of selectInput){
            optionText.push(item.innerText)
        }
        console.log(optionText)
        let checkItem="<?php echo $data['title']?>"
        for (let i=0;i<=optionText.length;i++){
            if (optionText[i]===checkItem){
                selectInput[i].setAttribute("selected","selected")
            }
        }
    </script>
<?php require_once AppRoot . "/Views/admin/footer.php"; ?>