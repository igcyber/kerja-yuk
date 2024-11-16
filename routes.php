<?php
$router->get('/', 'HomeController@index');
$router->get('/listings', 'ListingController@index');
$router->get('/listing/create', 'ListingController@create');
$router->get('/listing/{id}', 'ListingController@show');
$router->post('/listings', 'ListingController@store');
$router->delete('/listing/{id}', 'ListingController@destroy');
