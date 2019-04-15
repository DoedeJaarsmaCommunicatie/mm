<?php
namespace App\Providers;

class PostServiceProvider
{
    protected $post_types = [
        ];
    
    public function __construct()
    {
    	$this->register();
    }
    
    public function register()
    {
        foreach ($this->post_types as $type) {
        	new $type();
        }
    }
}
