<div class="container">
    <img src="<?= $DATA['http_domain'] ?>public/img/nubes.png" class="img-clouds" alt="Imagen de nubes para el fondo de las imagenes" />
    <div class="swiper slider">
        <div class="swiper-wrapper">
            <?php foreach ($DATA['slider'] as $key => $value) { ?>
                <div class="swiper-slide">
                    <img src="<?= $DATA['http_domain'] ?>public/img.slider/<?= $value['slider_img'] ?>?last=<?= $value['slider_last'] ?>" alt="Imagen <?= $value['slider_id'] ?> de la Constructora">
                </div>
            <?php } ?>
        </div>
    </div>

    <h2>Quality work in every home</h2>
    <a href="<?= $DATA['http_domain'] ?>portfolio">
        <span>See portfolio...</span>
        <i class="fas fa-arrow-right"></i>
    </a>
</div>