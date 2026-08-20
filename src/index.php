<?php
require __DIR__ . '/vendor/autoload.php';


use JointFramework\Http\Uri;
use JointFramework\Http\ServerRequestFactory;
use JointApp\JointSite;
use JointApp\JointAppMiddleware;

session_start();

$uri = new Uri($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI']);

//create server request from server params
$factory = new ServerRequestFactory();
$request = $factory->createServerRequest($_SERVER['REQUEST_METHOD'], $uri, $_SERVER);

//create and process middleware
$middleware = new JointAppMiddleware();

//create server request handler
$handler = new JointSite();

$response = $middleware->process($request, $handler);

$jointSiteRequest = $handler::requestAdapter($middleware->request);
JointSite::handleResponse($jointSiteRequest, $response);