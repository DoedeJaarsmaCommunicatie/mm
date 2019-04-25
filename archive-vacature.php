<?php
global $wp_query;

$templates = [
    'templates/archive-vacature.twig'
];

$context = Timber::get_context();

if (isset($_REQUEST['search'])) {
    $posts = new \Timber\PostQuery(['s' => $_REQUEST['search']]);
} else {
    $posts = new \Timber\PostQuery();
}

$context['posts'] = $posts;
$context['regions'] = get_terms([
    'taxonomy'      => 'regio',
    'orderby'       => 'name',
    'hide_empty'    => true,
]);
$context['branches'] = get_terms([
    'taxonomy'      => 'branche',
    'orderby'       => 'name',
    'hide_empty'    => true,
]);

$context['query'] = $wp_query;
Timber::render($templates, $context);
