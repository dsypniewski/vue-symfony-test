<?php

$routes = new \Symfony\Component\Routing\RouteCollection();
$routes->add('api_data_blocks', new \Symfony\Component\Routing\Route('/api/v1/notifications/draft/blocks/notification/{notificationId}', [
	'class' => \Panel\Data\Blocks::class,
], ['notificationId' => '[0-9]+']));
$routes->add('api_data_notifications', new \Symfony\Component\Routing\Route('/api/v1/notifications/draft/notifications', [
	'class' => \Panel\Data\Notifications::class,
]));
$routes->add('api_preview_notification', new \Symfony\Component\Routing\Route('/api/v1/notifications/draft/preview/notification/{notificationId}', [
	'class' => \Panel\Preview\Notification::class,
]));
$routes->add('api_form_footer', new \Symfony\Component\Routing\Route('/api/v1/notifications/panel/form/footer', [
	'class' => \Panel\Form\Footer::class,
]));
$routes->add('api_form_header', new \Symfony\Component\Routing\Route('/api/v1/notifications/panel/form/header', [
	'class' => \Panel\Form\Header::class,
]));
$routes->add('api_form_generic', new \Symfony\Component\Routing\Route('/api/v1/notifications/panel/form/{formType}', [
	'class' => \Panel\Form\Footer::class,
]));
$routes->add('api_dump', new \Symfony\Component\Routing\Route('/api/v1/dump', [
	'class' => \Panel\Dump::class,
]));

return $routes; 
