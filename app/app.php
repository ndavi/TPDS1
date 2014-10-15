<?php

// Register global error and exception handlers
use Symfony\Component\Debug\ErrorHandler;

ErrorHandler::register();

use Symfony\Component\Debug\ExceptionHandler;

ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../views',
));

$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'secured' => array(
            'pattern' => '/',
            'anonymous' => true,
            'logout' => true,
            'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
            'users' => $app->share(function () use ($app) {
                return new NuitsCroixRousse\DAO\UserDAO($app['db']);
            }),
        ),
    ),
));

// Register services.
$app['dao.genre'] = $app->share(function ($app) {
    return new NuitsCroixRousse\DAO\GenreDAO($app['db']);
});
$app['dao.concert'] = $app->share(function ($app) {
    $concertDAO = new NuitsCroixRousse\DAO\ConcertDAO($app['db']);
    $concertDAO->setGenreDAO($app['dao.genre']);
    return $concertDAO;
});

$app['dao.user'] = $app->share(function ($app) {
    return new NuitsCroixRousse\DAO\UserDAO($app['db']);
});
