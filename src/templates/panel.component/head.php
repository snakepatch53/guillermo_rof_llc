<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/library.general/fontawesome/css/all.min.css">
<link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/library.general/bootstrap.min.css">
<link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/css.general/config.css">
<!-- <link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/css.general/theme1.css"> -->
<?php include('./src/functions/loader_theme.php') ?>
<link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/css.panel/adapter-theme.css">
<link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/css.panel/general.css">
<link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/css.panel/sidebar.css">
<link rel="shortcut icon" href="<?= $DATA['info']['info_icon_url2'] ?>" type="image/x-icon">
<meta property="og:image" content="<?= $DATA['info']['info_logo_url2'] ?>">
<link rel="image_src" href="<?= $DATA['info']['info_logo_url2'] ?>" />
<title><?= $DATA['info']['info_name'] ?> ⚙️ Panel <?= $DATA['title'] ?></title>
<script>
    const http_domain = '<?= $DATA['http_domain'] ?>';
    const SESSION = JSON.parse('<?= json_encode($_SESSION) ?>');
</script>