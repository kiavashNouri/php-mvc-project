<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo urlRoot?>/public/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo urlRoot?>/public/css/main.css">
    <link rel="stylesheet" href="<?php echo urlRoot?>/public/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">Slide 1</div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
        <div class="swiper-slide">Slide 4</div>
        <div class="swiper-slide">Slide 5</div>
        <div class="swiper-slide">Slide 6</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <div class="swiper-slide">Slide 9</div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>

</div>
<a href="<?php echo urlRoot ?>/public/sliders/create" class="btn btn-success m-5 text-white">create slider</a>
<script src="<?php echo urlRoot ?>/public/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo urlRoot ?>/public/js/main.js"></script>
</body>
</html>