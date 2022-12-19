<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create slider</title>
    <link rel="stylesheet" href="<?php echo urlRoot?>/public/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 p-5 bg-dark text-white">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="image" class="d-block">image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div>
                    <label for="alt" class="d-block">alt</label>
                    <input type="text" class="form-control" name="image" id="image">
                </div>
                <label for="publish">publish</label>
                <select name="publish" id="publish" class="form-select">
                    <option value="1">active</option>
                    <option value="0">deActive</option>
                </select>
                <div>
                    <input type="submit" class="btn btn-success mt-3" value="ذخیره">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>