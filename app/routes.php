<?php

use Symfony\Component\HttpFoundation\Request;

// Home page
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig');
})->bind('acceuil');

// Details for a drug
$app->get('/concert/{id}', function($id) use ($app) {
    $concert = $app['dao.concert']->find($id);
    return $app['twig']->render('concert.html.twig', array('concert' => $concert));
})->bind('concert');

// List of all concerts
$app->get('/concerts/', function() use ($app) {
    $concerts = $app['dao.concert']->findAll();
    return $app['twig']->render('concerts.html.twig', array('concerts' => $concerts));
})->bind('concerts');

// Search form for drugs
$app->get('/concerts/search/', function() use ($app) {
    $genres = $app['dao.genre']->findAll();
    return $app['twig']->render('concerts_search.html.twig', array('genres' => $genres));
})->bind('concertSearch');

// Results page for drugs
$app->post('/concerts/results/', function(Request $request) use ($app) {
    $genreId = $request->request->get('genre');
    $concerts = $app['dao.concert']->findAllByGenre($genreId);
    return $app['twig']->render('concerts_results.html.twig', array('concerts' => $concerts));
})->bind('concertResult');
$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
                'error' => $app['security.last_error']($request),
                'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('login');  // named route so that path('login') works in Twig templates
