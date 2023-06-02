<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('./src/templates/panel.component/head.php') ?>
    <style>
        /* Estilos para el dashboard */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 1px 6px 0 rgba(0, 0, 0, 0.5);
        }

        .card-title {
            font-size: 1.5rem;
        }

        .card-footer {
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 0px 0px 10px 10px;
            text-align: center;
            cursor: pointer;
        }

        .card-footer i {
            margin-right: 5px;
        }

        main {
            padding: 20px;
        }
    </style>
</head>

<body>
    <?php include('./src/templates/panel.component/header.php') ?>
    <?php include('./src/templates/panel.component/sidebar.php') ?>
    <main>
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Users</span>
                                <i class="fa-solid fa-users"></i>
                            </h5>
                            <p class="card-text">Total users: <?= count($DATA['users']) ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>panel/users">See users</a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Team</span>
                                <i class="fa-solid fa-user-friends"></i>
                            </h5>
                            <p class="card-text">Total team members: <?= count($DATA['team']) ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>panel/team">See team</a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Slider</span>
                                <i class="fa-solid fa-image"></i>
                            </h5>
                            <p class="card-text">Total slides: <?= count($DATA['slider']) ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>panel/slider">See slides</a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Contacts</span>
                                <i class="fas fa-address-book"></i>
                            </h5>
                            <p class="card-text">Total contacts: <?= count($DATA['contacts']) ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>panel/contacts">See contacts</a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Social Media</span>
                                <i class="fa fa-share-alt"></i>
                            </h5>
                            <p class="card-text">Total social media: <?= count($DATA['socials']) ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>panel/socials">See social media</a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Qualities</span>
                                <i class="fas fa-star"></i>
                            </h5>
                            <p class="card-text">Total qualities: <?= count($DATA['qualities']) ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>panel/qualities">See qualities</a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-light text-dark">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Goals</span>
                                <i class="fas fa-bullseye"></i>
                            </h5>
                            <p class="card-text">Total goals: <?= count($DATA['goals']) ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>panel/goals">See goals</a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Customers</span>
                                <i class="fas fa-handshake"></i>
                            </h5>
                            <p class="card-text">Total customers: <?= count($DATA['customers']) ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>panel/customers">See customers</a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Services</span>
                                <i class="fas fa-tools"></i>
                            </h5>
                            <p class="card-text">Total services: <?= count($DATA['services']) ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>panel/services">See services</a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Projects</span>
                                <i class="fas fa-project-diagram"></i>
                            </h5>
                            <p class="card-text">Total projects: <?= count($DATA['projects']) ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>panel/projects">See projects</a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-light text-dark">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Mailbox</span>
                                <i class="fa fa-envelope"></i>
                            </h5>
                            <p class="card-text">Total mails: <?= count($DATA['mails']) ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>panel/mailbox">See mailbox</a>
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>
<foot>
    <?php include('./src/templates/panel.component/foot.php') ?>
</foot>

</html>