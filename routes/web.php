<?php

$router->post('/register', 'RegistrationController@onRegister');
$router->post('/login', 'LoginController@onLogin');

$router->post('/token', ['middleware'=>'auth', 'uses'=>'LoginController@onSuccess']);

$router->post('/insert', ['middleware'=>'auth', 'uses'=>'PhoneBookController@onInsert']);
