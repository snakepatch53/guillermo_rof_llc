<!DOCTYPE html>
<html lang="<?= $_ENV['HTML_LANG'] ?>">

<head>
    <?php include('./src/templates/public.component/head.php') ?>
    <link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/css.public/services.css">
</head>

<body>

    <header>
        <?php include('./src/templates/public.component/header.php') ?>
    </header>

    <main class="animate__animated animate__fadeIn">
        <section class="frontpage">
            <div class="bg-img">
                <img src="<?= $DATA['http_domain'] ?>public/img/frontpage-services.jpg" alt="Image background of Services">
            </div>
            <div class="container">
                <h1>You are closer, how can we help you?</h1>
                <h2>Find the service you need</h2>
                <a href="#section-2" class="btn">
                    <i class="fas fa-arrow-down"></i>
                </a>
            </div>
        </section>

        <section class="section2" id="section-2">
            <div class="container">
                <h3>Just what you need to renovate your home</h3>
                <div class="items">
                    <?php foreach ($DATA['services'] as $value) { ?>
                        <div class="item">
                            <h4><?= $value['service_title'] ?></h4>
                            <p><?= $value['service_desc'] ?></p>
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= preg_replace('/\s+/', '', $DATA['info']['info_whatsapp']) ?>&text=<?= $value['service_wtsp_msg'] ?>">
                                <span>Ask of this service</span>
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section class="section3">
            <div class="container">
                <h3>Do you need something more specific?</h3>
                <?php include('./src/templates/public.component/contact.component.php') ?>
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