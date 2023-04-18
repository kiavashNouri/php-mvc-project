<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php foreach ($data['slider'] as $item): ?>
            <?php if (intval($item->publish) === 1): ?>
                <div class="swiper-slide"><img style="width: 100%; height:auto;" height="600" src="<?php echo urlImage ?>/slider/<?php echo $item->image ?>" alt=""></div>
            <?php endif; ?>

        <?php endforeach; ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>

</div>
