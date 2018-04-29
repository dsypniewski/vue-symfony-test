<?php

$loader = require_once 'vendor/autoload.php';

$routes = new \Symfony\Component\Routing\RouteCollection();
$routes->add('api_data_blocks', new \Symfony\Component\Routing\Route('/api/data/blocks/{notificationId}', [
	'class' => \Panel\Data\Blocks::class,
], ['notificationId' => '[0-9]+']));
$routes->add('api_data_notifications', new \Symfony\Component\Routing\Route('/api/data/notifications', [
	'class' => \Panel\Data\Notifications::class,
]));
$routes->add('api_preview_notification', new \Symfony\Component\Routing\Route('/api/preview/notification/{notificationId}', [
	'class' => \Panel\Preview\Notification::class,
]));
$routes->add('api_form_footer', new \Symfony\Component\Routing\Route('/api/form/footer', [
	'class' => \Panel\Form\Footer::class,
]));

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

$context = new \Symfony\Component\Routing\RequestContext();
$context->fromRequest($request);

$matcher = new \Symfony\Component\Routing\Matcher\UrlMatcher($routes, $context);
$match = $matcher->matchRequest($request);

/** @var \Panel\ApiInterface $controller */
$controller = new $match['class'];

$result = $controller->handle($match);
//header('Access-Control-Allow-Origin: *');
if (is_array($result)) {
	header('Content-Type: application/json', true);
	echo json_encode($result);
} else {
	echo $result;
}


