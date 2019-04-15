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
                'taxonomy' => 'opdrachtgever',
                'hide_empty' => false,
            ]
        );
        return $context;
    }
}
