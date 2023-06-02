<!DOCTYPE html>
<html lang="<?= $_ENV['HTML_LANG'] ?>">

<head>
    <?php include('./src/templates/public.component/head.php') ?>
    <link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/css.public/home.css">
    <link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/css.public/frontpage.css">
</head>

<body>

    <header>
        <?php include('./src/templates/public.component/header.php') ?>
    </header>

    <main class="animate__animated animate__fadeIn">
        <section class="frontpage">
            <?php include('./src/templates/public.component/frontpage.php') ?>
        </section>

        <section class="section-1">
            <div class="subsection">
                <div class="container">
                    <h2>An easier way to build</h2>
                </div>
            </div>
            <div class="container banner">
                <img class="bg-img" src="<?= $DATA['http_domain'] ?>public/img/home-section-1.jpg" alt="Image of car in the road">
                <div class="items">
                    <div class="item"></div>
                    <div class="item">
                        <p><?= $DATA['info']['info_desc'] ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-2">
            <div class="container">
                <h2>Qualities of our brand</h2>
                <div class="items">
                    <?php foreach ($DATA['qualities'] as $value) { ?>
                        <div class="item">
                            <div class="card">
                                <div class="back">
                                    <img src="<?= $value['quality_img_url'] ?>" alt="Image of <?= $value['quality_title'] ?> quality">
                                </div>
                                <div class="icon">
                                    <?php include('./public/img/stars.svg'); ?>
                                </div>
                                <h3><?= $value['quality_title'] ?></h3>
                                <p><?= $value['quality_desc'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section class="section-3">
            <div class="container">
                <div class="items">
                    <div class="item title">
                        <h2>What are you looking for yourself?</h2>
                    </div>
                    <?php foreach ($DATA['services'] as $value) { ?>
                        <div class="item">
                            <div class="img">
                                <img src="<?= $value['service_img_url'] ?>" alt="Image of <?= $value['service_title'] ?> service">
                            </div>
                            <h3><?= $value['service_title'] ?></h3>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>

    <footer id="section-footer">
        <?php include('./src/templates/public.component/footer.php') ?>
    </footer>
</body>

<foot>
    <?php include('./src/templates/public.component/foot.php') ?>
    <script src="<?= $DATA['http_domain'] ?>public/js.public/frontpage.component.js"></script>
</foot>

</html>