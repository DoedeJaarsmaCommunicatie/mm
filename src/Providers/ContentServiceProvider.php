<?php
namespace App\Providers;

use function get_fields;
use Timber\Timber;

class ContentServiceProvider
{
    public function __construct()
    {
        $this->boot();
    }
    
    public function boot()
    {
        add_filter('timber_context', [$this, 'addOptions']);
    }
    
    public function addOptions($context)
    {
        $context['options'] = get_fields('option');
        $context['employers'] = Timber::get_terms(
            [
                'taxonomy'      => 'opdrachtgever',
                'hide_empty'    => false,
	            'include'       => [ 24, 12, 18, 16, 15, 8]
            ]
        );
        $context['app'] ['request'] = $_REQUEST;
        $context['makelaarsmensen'] = new \Timber\Site(2);
        switch_to_blog($context['makelaarsmensen']->blog_id);
        $context['makelaarslogo'] = new \Timber\Image(wp_get_attachment_url(get_theme_mod('custom_logo')));
        switch_to_blog(1);
        
        return $context;
    }
}
