<?php

$templates = [
	'templates/archive-vacature.twig'
];

$context = Timber::get_context();
$posts = new \Timber\PostQuery();
$context['posts'] = $posts;
$context['regions'] = get_terms([
	'taxonomy'      => 'regio',
	'hide_empty'    => true,
]);

Timber::render($templates, $context);
