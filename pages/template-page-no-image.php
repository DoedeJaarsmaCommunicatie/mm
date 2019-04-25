<?php
/**
 * Template name: No header image
 * Description: A template without an image
 */

$context = Timber::get_context();
$post = new \Timber\Post();
$context['post'] = $post;
Timber::render( [
	'templates/formats/page-no-img-' . $post->post_name . '.twig',
	'templates/formats/page-no-img.twig',
], $context );
