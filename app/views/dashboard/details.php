<?php require_once AppRoot . "/views/admin/header.php"; ?>
    <div class="container-fluid p-0">
        <?php require_once AppRoot . "/views/admin/navbar.php"; ?>
        <div class="container mt-1 bg-dark text-white p-5">
            <?php if (isset($_SESSION['delete'])): ?>
                <div class="alert alert-success p-3 m-3 mx-auto">
                    <h4 class="text-center"><?php echo $_SESSION['delete'] ?></h4>
                </div>
                <?php unset($_SESSION['delete']); endif; ?>
            <div class="row m-0">
                <div class="col-6 offset-3">
                    <h3 class="text-info text-center">create-panel-dashboard</h3>
                </div>
                <div class="col-6 offset-3">
                    <table class="table table-hover text-white table-responsive">
                        <thead class="thead-inverse">
                        <tr>
                            <th>image</th>
                            <th>title</th>
                            <th>update</th>
                            <th>delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['dashboard'] as $item): ?>
                            <tr>
                                <td><img src="<?php echo urlRoot."/public/images/dashboard/". $item->image ?>" width="50" height="50" alt=""></td>
                                <td><?php echo $item->title?></td>
                                <td>
                                    <form action="<?php echo urlRoot?>/public/dashboards/edit/<?php echo $item->id?>" method="post">
                                        <input type="submit" class="btn btn-warning" value="edit">
                                    </form>
                                </td>
                                <td>
                                    <form action="<?php echo urlRoot?>/public/dashboards/delete/<?php echo $item->id?>" method="post">
                                        <input type="submit" class="btn btn-danger" value="delete">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="<?php echo urlRoot?>/public/dashboards/index" class="bg-info btn text-black text-decoration-none">tools</a>
                </div>
            </div>
        </div>
    </div>
<?php require_once AppRoot . "/Views/admin/footer.php"; ?>