<?php require_once AppRoot . "/Views/admin/header.php" ?>
<?php
checkLogin();
?>
    <div class="container-fluid p-0">
<?php require_once AppRoot . "/Views/admin/navbar.php" ?>

    <div class="container bg-dark p-3 mt-5">
<?php if (isset($_SESSION['create'])): ?>
    <div class="alert alert-success p-3 m-3 mx-auto">
        <h4 class="text-center"><?php echo $_SESSION['create'] ?></h4>
    </div>
    <?php unset($_SESSION['create']); endif; ?>
    <a href="<?php echo urlRoot ?>/public/dashboards/store" class="btn bg-white text-black m-2">create-panel</a>

        <a href="<?php echo urlRoot ?>/public/dashboards/details" class="btn bg-black text-white m-2">details</a>

    <h3 class="bg-white text-center p-2 m-4 rounded">welcome to your profile <?php echo $_SESSION['fullName'] ?></h3>
    <p class="text-white p-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur corporis cum
        laudantium reiciendis, veniam vitae voluptates. Alias animi assumenda, consequatur esse, in ipsum natus non,
        quos repellendus sit suscipit ullam?
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet cupiditate, earum eligendi enim iste
        labore, laborum maxime natus obcaecat i possimus praesentium quaerat reiciendis, saepe unde veniam veritatis
        voluptas voluptatibus?
    </p>
    <div class="row m-0">
<?php foreach ($data['dashboard'] as $item): ?>
    <div class="col-md-4 col-6 mb-3">
        <div class="card">
            <img height="200" src="<?php echo urlRoot?>/public/images/dashboard/<?php echo $item->image ?>" class="card-img-top" alt="">
            <div class="card-body">
                <h4 class="card-title"><?php echo $item->title ?></h4>
                <a href="<?php echo $item->link ?>" class="btn btn-info m-2"><?php echo $item->title ?></a>
            </div>
        </div>
    </div>

    <?php endforeach; ?>
    </div>

    </div>
    </div>
    <?php require_once AppRoot . "/Views/admin/footer.php" ?>