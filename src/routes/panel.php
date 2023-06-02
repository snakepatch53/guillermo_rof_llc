<?php
$_TEMPLATE_PANEL_PATH = './src/templates/panel.pages/';
$radapter = new RAdapter($router, $_TEMPLATE_PANEL_PATH, $_ENV['HTTP_DOMAIN']);

$radapter->getHTML('/panel/login', 'login', fn () => middlewareSessionLogout(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
    ];
});

$radapter->getHTML('/panel', 'home', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
        'users' => (new UserDao($DATA['mysqlAdapter']))->select(),
        'team' => (new TeamDao($DATA['mysqlAdapter']))->select(),
        'slider' => (new SliderDao($DATA['mysqlAdapter']))->select(),
        'contacts' => (new ContactDao($DATA['mysqlAdapter']))->select('contact'),
        'socials' => (new ContactDao($DATA['mysqlAdapter']))->select('social'),
        'qualities' => (new QualityDao($DATA['mysqlAdapter']))->select(),
        'goals' => (new GoalDao($DATA['mysqlAdapter']))->select(),
        'customers' => (new CustomerDao($DATA['mysqlAdapter']))->select(),
        'services' => (new ServiceDao($DATA['mysqlAdapter']))->select(),
        'projects' => (new ProjectDao($DATA['mysqlAdapter']))->select(),
        'mails' => (new MailBoxDao($DATA['mysqlAdapter']))->select(),
    ];
});

$radapter->getHTML('/panel/themes', 'themes', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
        'themes' => (new ThemeDao($DATA['mysqlAdapter']))->select(),
    ];
});

$radapter->getHTML('/panel/info', 'info', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
        'themes' => (new ThemeDao($DATA['mysqlAdapter']))->select(),
    ];
});

$radapter->getHTML('/panel/users', 'users', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
    ];
});

$radapter->getHTML('/panel/team', 'team', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
    ];
});

$radapter->getHTML('/panel/slider', 'slider', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
    ];
});

$radapter->getHTML('/panel/socials', 'socials', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
    ];
});

$radapter->getHTML('/panel/contacts', 'contacts', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
    ];
});

$radapter->getHTML('/panel/mailbox', 'mailbox', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
    ];
});

$radapter->getHTML('/panel/services', 'services', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
    ];
});

$radapter->getHTML('/panel/projects', 'projects', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
        'services' => (new ServiceDao($DATA['mysqlAdapter']))->select(),
    ];
});

$radapter->getHTML('/panel/qualities', 'qualities', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
    ];
});


$radapter->getHTML('/panel/goals', 'goals', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
    ];
});


$radapter->getHTML('/panel/customers', 'customers', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
    ];
});
