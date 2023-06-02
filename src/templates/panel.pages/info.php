<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('./src/templates/panel.component/head.php') ?>
    <link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/css.panel/info.css">
</head>

<body>
    <?php include('./src/templates/panel.component/header.php') ?>
    <?php include('./src/templates/panel.component/sidebar.php') ?>
    <main>
        <div class="pt-4 px-md-5 px-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= $DATA['http_domain'] ?>panel">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Informacion</li>
                </ol>
            </nav>
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Informacion</b>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Form ini -->
                    <form class="needs-validation p-4" id="element-form" onsubmit="return false" editMode="false" novalidate>
                        <div class="row g-3">

                            <h3>GENERAL</h3>

                            <div class="col-md-4">
                                <label for="validationServer01" class="form-label">Logo</label>
                                <input type="file" class="form-control" id="validationServer01" name="info_logo">
                                <div class="preview_img">
                                    <div class="logo">
                                        <?= getLogo($DATA['info']['info_logo_url'], "class='img-fluid'", 'alt="Preview"') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="validationServer02" class="form-label">Icono</label>
                                <input type="file" class="form-control" id="validationServer02" name="info_icon">
                                <div class="preview_img">
                                    <div class="logo">
                                        <?= getLogo($DATA['info']['info_icon_url'], "class='img-fluid'", 'alt="Preview"') ?>
                                    </div>
                                </div>
                            </div>


                            <div class=" col-md-4">
                                <label for="validationServer50" class="form-label">Theme</label>
                                <select class="form-select form-control" id="validationServer50" name="theme_id" required>
                                    <option value="">Select a theme</option>
                                    <?php foreach ($DATA['themes'] as $theme) { ?>
                                        <option value="<?= $theme['theme_id'] ?>"><?= $theme['theme_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Select a theme!
                                </div>
                            </div>


                            <div class="col-md-4">
                                <label for="validationServer03" class="form-label">Name</label>
                                <input type="text" class="form-control" id="validationServer03" name="info_name" required>
                                <div class="invalid-feedback">
                                    Write a name!
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="validationServer04" class="form-label">Pais</label>
                                <input type="text" class="form-control" id="validationServer04" name="info_country" required>
                                <div class="invalid-feedback">
                                    Write a country!
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="validationServer05" class="form-label">State</label>
                                <input type="text" class="form-control" id="validationServer05" name="info_state" required>
                                <div class="invalid-feedback">
                                    Write a state!
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="validationServer06" class="form-label">City</label>
                                <input type="text" class="form-control" id="validationServer06" name="info_city" required>
                                <div class="invalid-feedback">
                                    Write a city!
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="validationServer07" class="form-label">Whatsapp</label>
                                <input type="text" class="form-control" id="validationServer07" name="info_whatsapp" required>
                                <div class="invalid-feedback">
                                    Write a whatsapp number!
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="validationServer08" class="form-label">Location</label>
                                <input type="text" class="form-control" id="validationServer08" name="info_location" required>
                                <div class="invalid-feedback">
                                    Insert a location map (iframe)!
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationServer5" class="form-label">Mission</label>
                                <textarea class="form-control" id="validationServer5" name="info_mision" required></textarea>
                                <div class="invalid-feedback">
                                    Write a mission!
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationServer6" class="form-label">Vision</label>
                                <textarea class="form-control" id="validationServer6" name="info_vision" required></textarea>
                                <div class="invalid-feedback">
                                    Write a vision!
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationServer7" class="form-label">Descripcion</label>
                                <textarea class="form-control" id="validationServer7" name="info_desc" required></textarea>
                                <div class="invalid-feedback">
                                    Write a description!
                                </div>
                            </div>

                            <h3 class="mt-5">FACEBOOK API</h3>

                            <div class="col-lg-3 col-md-6">
                                <label for="validationServer8" class="form-label">APP ID</label>
                                <input type="text" class="form-control" id="validationServer8" name="info_fb_app_id">
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <label for="validationServer9" class="form-label">APP Ssecret</label>
                                <input type="text" class="form-control" id="validationServer9" name="info_fb_app_secret">
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <label for="validationServer10" class="form-label">Page ID</label>
                                <input type="text" class="form-control" id="validationServer10" name="info_fb_page_id">
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <label for="validationServer11" class="form-label">Access Token</label>
                                <input type="text" class="form-control" id="validationServer11" name="info_fb_access_token">
                            </div>

                            <h3 class="mt-5">HOME</h3>

                            <div class="col-md-4">
                                <label for="validationServer12" class="form-label">Title</label>
                                <input type="text" class="form-control" id="validationServer12" name="info_home_title" required>
                                <div class="invalid-feedback">
                                    Write a title!
                                </div>
                            </div>

                            <div class="col-md-8">
                                <label for="validationServer16" class="form-label">Subtitle</label>
                                <input type="text" class="form-control" id="validationServer16" name="info_home_subtitle" required>
                                <div class="invalid-feedback">
                                    Write a subtitle!
                                </div>
                            </div>

                            <h3 class="mt-5">SERVICES</h3>

                            <div class="col-md-6">
                                <label for="validationServer17" class="form-label">Title</label>
                                <input type="text" class="form-control" id="validationServer17" name="info_services_title" required>
                                <div class="invalid-feedback">
                                    Write a title!
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="validationServer18" class="form-label">Subtitle</label>
                                <input type="text" class="form-control" id="validationServer18" name="info_services_subtitle" required>
                                <div class="invalid-feedback">
                                    Write a subtitle!
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationServer18" class="form-label">Image</label>
                                <input type="file" class="form-control" id="validationServer18" name="info_services_image">
                                <div class="preview_img" style="max-width: 500px; height: auto">
                                    <img src="<?= $DATA['info']['info_services_image_url'] ?>" alt="Preview" class="img-fluid">
                                </div>
                            </div>

                            <h3 class="mt-5">PORTFOLIO</h3>

                            <div class="col-md-6">
                                <label for="validationServer19" class="form-label">Title</label>
                                <input type="text" class="form-control" id="validationServer19" name="info_portfolio_title" required>
                                <div class="invalid-feedback">
                                    Write a title!
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="validationServer20" class="form-label">Subtitle</label>
                                <input type="text" class="form-control" id="validationServer20" name="info_portfolio_subtitle" required>
                                <div class="invalid-feedback">
                                    Write a subtitle!
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationServer21" class="form-label">Image</label>
                                <input type="file" class="form-control" id="validationServer21" name="info_portfolio_image">
                                <div class="preview_img" style="max-width: 500px; height: auto">
                                    <img src="<?= $DATA['info']['info_portfolio_image_url'] ?>" alt="Preview" class="img-fluid">
                                </div>
                            </div>

                            <h3 class="mt-5">ABOUT US</h3>

                            <div class="col-md-6">
                                <label for="validationServer22" class="form-label">Title</label>
                                <input type="text" class="form-control" id="validationServer22" name="info_about_title" required>
                                <div class="invalid-feedback">
                                    Write a title!
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="validationServer23" class="form-label">Subtitle</label>
                                <input type="text" class="form-control" id="validationServer23" name="info_about_subtitle" required>
                                <div class="invalid-feedback">
                                    Write a subtitle!
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationServer23" class="form-label">Image</label>
                                <input type="file" class="form-control" id="validationServer23" name="info_about_image">
                                <div class="preview_img" style="max-width: 500px; height: auto">
                                    <img src="<?= $DATA['info']['info_about_image_url'] ?>" alt="Preview" class="img-fluid">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-5" id="btn-submit">Guardar</button>
                        </div>
                    </form>
                    <!-- Form end -->
                </div>
            </div>
        </div>
    </main>
</body>
<foot>
    <?php include('./src/templates/panel.component/foot.php') ?>
    <script src="<?= $DATA['http_domain'] ?>public/js.panel/info.js"></script>
</foot>

</html>