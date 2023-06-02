<!DOCTYPE html>
<html lang="<?= $_ENV['HTML_LANG'] ?>">

<head>
    <?php include('./src/templates/public.component/head.php') ?>
    <link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/css.public/aboutus.css">
</head>

<body>

    <header>
        <?php include('./src/templates/public.component/header.php') ?>
    </header>

    <main class="animate__animated animate__fadeIn">
        <section class="frontpage">
            <div class="bg-img">
                <img src="<?= $DATA['http_domain'] ?>public/img/frontpage-aboutus.jpg" alt="Imagen de portada de la pagina">
            </div>
            <div class="container">
                <h1>Our brand, our company, our ideaology</h1>
                <a href="#section2">
                    <i class="fas fa-arrow-down"></i>
                </a>
            </div>
        </section>

        <section class="section2" id="section2">
            <div class="container">
                <h2>Mission & Vision</h2>
                <div class="items">
                    <div class="item">
                        <h3>Mission</h3>
                        <p><?= $DATA['info']['info_mision'] ?></p>
                    </div>
                    <div class="item">
                        <h3>Vision</h3>
                        <p><?= $DATA['info']['info_vision'] ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section3">
            <div class="container">
                <h2>Goals with you</h2>
                <div class="items">
                    <?php foreach ($DATA['goals'] as $value) { ?>
                        <div class="item">
                            <div class="icon">
                                <?php include('./public/img/stars.svg'); ?>
                                <?= $value['goal_icon_html'] ?>
                            </div>
                            <h3><?= $value['goal_name'] ?></h3>
                        </div>
                    <?php } ?>
                </div>
                <p>Our commitment is to provide you with the best experience so that you can fulfill your desire to renovate your home.</p>
            </div>
        </section>



        <section class="section4">
            <div class="container">
                <h2>Our team</h2>
                <div class="items">
                    <?php foreach ($DATA['team'] as $value) { ?>
                        <a href="<?= $value['team_link'] ?>" class="item" target="_blank">
                            <div class="img">
                                <img src="<?= $value['team_photo_url'] ?>" alt="Image of <?= $value['team_name'] ?>">
                            </div>
                            <h3><?= $value['team_name'] ?></h3>
                            <span><?= $value['team_position'] ?></span>
                        </a>
                    <?php } ?>
                </div>
                <p>Our commitment is to provide you with the best experience so that you can fulfill your desire to renovate your home.</p>
            </div>
        </section>



        <section class="section5">
            <div class="container">
                <h2>Locate Us</h2>
                <div class="mapa"><?= $DATA['info']['info_location'] ?></div>
            </div>
        </section>
    </main>

    <footer id="section-footer">
        <?php include('./src/templates/public.component/footer.php') ?>
    </footer>
</body>

<foot>
    <?php include('./src/templates/public.component/foot.php') ?>
</foot>

</html>