<?php

    require './Config.php';
    
    require './inc/data/ControllerData.php';

    require './inc/components/Head.php';
    require './inc/components/Header.php';

    $getSliderResult = api('slider');

?>

<div id="slider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php foreach ($getSliderResult as $slider_key => $slider_item) { ?>
            <div class="carousel-item<?=($slider_key == 0) ? ' active': '';?>" data-bs-interval="10000">
                <div class="bg-slider"></div>
                <img src="<?=API_URL . '/images/slider/' . $slider_item['image'];?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-flex flex-column">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
        <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Tilbage</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Næste</span>
    </button>
</div>

<?php require './inc/components/Footer.php'; ?>