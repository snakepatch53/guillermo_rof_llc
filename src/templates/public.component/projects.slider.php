<div class="splide slider" id="projects-slider">
    <div class="splide__track">
        <ul class="splide__list">
            <?php foreach ($DATA['projects'] as $value) { ?>
                <li class="splide__slide">
                    <a href="<?= $DATA['http_domain'] ?>portfolio" class="item">
                        <img src="<?= $value['project_img_url'] ?>" alt="Image of <?= $value['project_img'] ?>">
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>