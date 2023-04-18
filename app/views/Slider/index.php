<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo urlRoot ?>/public/css/main.css">
    <link rel="stylesheet" href="<?php echo urlRoot ?>/public/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="<?php echo urlRoot ?>/public/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php foreach ($data['slider'] as $item): ?>
            <?php if (intval($item->publish) === 1): ?>
                <div class="swiper-slide"><img style="width: 100%; height:auto; background-size: contain"
                                               src="<?php echo urlRoot ?>/public/images/slider/<?php echo $item->image ?>"
                                               alt=""></div>
            <?php endif; ?>

        <?php endforeach; ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>

</div>
<a href="<?php echo urlRoot ?>/public/sliders/create" class="btn btn-success m-5 text-white">create slider</a>
<script src="<?php echo urlRoot ?>/public/js/main.js"></script>

<script src="<?php echo urlRoot ?>/public/swiper/swiper-bundle.min.js"></script>
</body>
</html>