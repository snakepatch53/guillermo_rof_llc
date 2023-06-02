<?php
$_TEMPLATE_PUBLIC_PATH = './src/templates/public.pages/';
$radapter = new RAdapter($router, $_TEMPLATE_PUBLIC_PATH, $_ENV['HTTP_DOMAIN']);


/**
 * ? El error a quedado solucionado
 */

//  TEST
$radapter->getHTML('/test', 'test',);

// HOME
$radapter->getHTML('/', 'home', function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
        'slider' => (new SliderDao($DATA['mysqlAdapter']))->select(),
        'contacts' => (new ContactDao($DATA['mysqlAdapter']))->select('contact'),
        'socials' => (new ContactDao($DATA['mysqlAdapter']))->select('social'),
        'qualities' => (new QualityDao($DATA['mysqlAdapter']))->select(3), // limit 3
        'services' => (new ServiceDao($DATA['mysqlAdapter']))->select(6), // limit 6
    ];
});

$radapter->getHTML('/index.php', 'home', function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
        'slider' => (new SliderDao($DATA['mysqlAdapter']))->select(),
        'contacts' => (new ContactDao($DATA['mysqlAdapter']))->select('contact'),
        'socials' => (new ContactDao($DATA['mysqlAdapter']))->select('social'),
        'qualities' => (new QualityDao($DATA['mysqlAdapter']))->select(3), // limit 3
        'services' => (new ServiceDao($DATA['mysqlAdapter']))->select(6), // limit 6
    ];
});

$radapter->getHTML('/services', 'services', function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
        'contacts' => (new ContactDao($DATA['mysqlAdapter']))->select('contact'),
        'socials' => (new ContactDao($DATA['mysqlAdapter']))->select('social'),
        'services' => (new ServiceDao($DATA['mysqlAdapter']))->select(),
    ];
});

$radapter->getHTML('/portfolio', 'portfolio', function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
        'contacts' => (new ContactDao($DATA['mysqlAdapter']))->select('contact'),
        'socials' => (new ContactDao($DATA['mysqlAdapter']))->select('social'),
        'customers' => (new CustomerDao($DATA['mysqlAdapter']))->select(),
        'services' => (new ServiceDao($DATA['mysqlAdapter']))->select_join_projects(),
    ];
});

$radapter->getHTML('/aboutus', 'aboutus', function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
        'contacts' => (new ContactDao($DATA['mysqlAdapter']))->select('contact'),
        'socials' => (new ContactDao($DATA['mysqlAdapter']))->select('social'),
        'goals' => (new GoalDao($DATA['mysqlAdapter']))->select(3),
        'team' => (new TeamDao($DATA['mysqlAdapter']))->select(4),
    ];
});

$radapter->set404('404', function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
        'contacts' => (new ContactDao($DATA['mysqlAdapter']))->select('contact'),
        'socials' => (new ContactDao($DATA['mysqlAdapter']))->select('social'),
    ];
});
