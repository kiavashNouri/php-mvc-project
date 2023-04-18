<div class="container p-5">
    <?php foreach ($data['category'] as $item): ?>
    <div class="row m-0 justify-content-center">
        <div class="card w-25 mx-1 my-1">
            <img class="card-img-top h-50" src="<?php echo urlImage?>/category/<?php echo $item->image ?>" alt="<?php echo $item->alt ?>">
            <div class="card-body">
                <h4 class="card-title"><?php echo $item->title ?></h4>
                <p class="card-text"><?php echo $item->description ?></p>
                <a href="#" class="btn btn-primary">See Profile</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
