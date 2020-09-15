<?php

$router->post('/register', 'RegistrationController@onRegister');
$router->post('/login', 'LoginController@onLogin');

$router->post('/token', ['middleware'=>'auth', 'uses'=>'LoginController@onSuccess']);

$router->post('/insert', ['middleware'=>'auth', 'uses'=>'PhoneBookController@onInsert']);
$router->post('/select', ['middleware'=>'auth', 'uses'=>'PhoneBookController@onSelect']);
$router->post('/delete', ['middleware'=>'auth', 'uses'=>'PhoneBookController@onDelete']);
