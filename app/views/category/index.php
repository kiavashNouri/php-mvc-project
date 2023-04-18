<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo urlRoot ?>/public/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <div class="col-12 bg-dark p-5 text-white">
            <?php if (isset($_SESSION['delete'])): ?>
                <div class="alert alert-warning p-3 mx-auto">
                    <h4 class="text-center"><?php echo $_SESSION['delete'] ?></h4>
                </div>
                <?php unset($_SESSION['delete']); endif; ?>
            <table class="table table-hover text-white">
                <tr>
                    <td>image</td>
                    <td>alt</td>
                    <td>title</td>
                    <td>description</td>
                    <td>delete</td>
                </tr>
                <?php foreach ($data['category'] as $item): ?>
                    <tr>
                        <td><img src="<?php echo urlRoot ?>/public/images/category/<?php echo $item->image ?>" alt=""
                                 width="50"></td>
                        <td><?php echo $item->alt ?></td>
                        <td><?php echo $item->title ?></td>
                        <td><?php echo $item->description ?></td>
                        <td>
                            <form action="<?php echo urlRoot?>/public/categories/delete/<?php echo $item->id ?>">
                                <input type="submit" class="btn btn-danger" value="حذف">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>