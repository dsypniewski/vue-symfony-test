<?php

$loader = require_once 'vendor/autoload.php';

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

$context = new \Symfony\Component\Routing\RequestContext();
$context->fromRequest($request);

$routes = require 'routes.php';
$matcher = new \Symfony\Component\Routing\Matcher\UrlMatcher($routes, $context);
$match = $matcher->matchRequest($request);

/** @var \Panel\ApiInterface $controller */
$controller = new $match['class'];

$result = $controller->handle($match);
if (is_array($result)) {
	header('Content-Type: application/json', true);
	echo json_encode($result);
} else {
	echo $result;
}


