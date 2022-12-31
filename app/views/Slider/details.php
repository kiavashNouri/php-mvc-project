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
                    <td>publish</td>
                    <td>edit</td>
                    <td>delete</td>
                </tr>
                <?php foreach ($data['slider'] as $item): ?>
                <tr>
                    <td><img src="<?php echo urlRoot ?>/public/images/slider/<?php echo $item->image ?>" alt=""
                             width="50"></td>
                    <td><?php echo $item->alt ?></td>
                    <td>
                        <?php if (intval($item->publish) === 1): ?>
                        <span class="btn btn-success">active</span>
                        <?php else: ?>
                        <span class="btn btn-warning">deActive</span>
                        <?php endif; ?>
                    </td>

                    <td>edit</td>
                    <td>
                        <form action="<?php echo urlRoot?>/public/sliders/delete/<?php echo $item->id ?>">
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