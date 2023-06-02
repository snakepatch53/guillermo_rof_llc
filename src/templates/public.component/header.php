<div class="header">
    <div class="container">
        <a href="<?= $DATA['http_domain'] ?>" class="logo">
            <?= getLogo($DATA['info']['info_logo_url'], "alt='Logo " . $DATA['info']['info_name'] . "'") ?>
            <h1><?= $DATA['info']['info_name'] ?></h1>
        </a>
        <nav>
            <ul>
                <li>
                    <a class="<?= $DATA['name'] == "home" ? "active" : "" ?>" href="<?= $DATA['http_domain'] ?>">HOME</a>
                </li>
                <li>
                    <a class="<?= $DATA['name'] == "services" ? "active" : "" ?>" href="<?= $DATA['http_domain'] ?>services">SERVICES</a>
                </li>
                <li>
                    <a class="<?= $DATA['name'] == "portfolio" ? "active" : "" ?>" href="<?= $DATA['http_domain'] ?>portfolio">PORTFOLIO</a>
                </li>
                <li>
                    <a class="<?= $DATA['name'] == "aboutus" ? "active" : "" ?>" href="<?= $DATA['http_domain'] ?>aboutus">ABOUT US</a>
                </li>
                <li>
                    <button class="btn-darkmode" id="theme-toggle">
                        <i class="dark fas fa-moon"></i>
                        <i class="light fas fa-sun"></i>
                    </button>
                </li>
                <li>
                    <button class="btn" id="contact-component-open-btn">CONTACT US</button>
                </li>
            </ul>
        </nav>
        <button class="burger-toggle" id="burger-toggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</div>


<div class="contact-component-modal" id="contact-component-modal">
    <div class="container">
        <div class="close-btn" id="contact-component-close-btn">
            <i class="fas fa-times"></i>
        </div>
        <?php include('./src/templates/public.component/contact.component.php') ?>
    </div>
</div>