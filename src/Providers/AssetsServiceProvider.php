<?php
namespace App\Providers;

class AssetsServiceProvider
{
    const VERSION = '1.0.0';
    
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'register']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue']);
        add_action('wp_enqueue_scripts', [$this, 'deregister'], 20);
    }
    
    public function register(): void
    {
        wp_register_style(
            'main.css',
            get_stylesheet_directory_uri() . '/dist/styles/app.css',
            [],
            self::VERSION
        );
        
        wp_register_script(
            'mc-app.js',
            get_stylesheet_directory_uri() . '/dist/js/mc-app.vue.js',
            [],
            self::VERSION,
            true
        );
        
        wp_register_script(
            'main.js',
            get_stylesheet_directory_uri() . '/dist/js/main.js',
            [],
            self::VERSION,
            true
        );
    }
    
    public function enqueue(): void
    {
        wp_enqueue_style('main.css');
        wp_enqueue_script('mc-app.js');
        wp_enqueue_script('main.js');
    }
    
    public function deregister()
    {
        wp_deregister_style('badubed-style');
        wp_deregister_style('badubed-main-style');
        wp_deregister_script('main');
        wp_deregister_script('badubed-navigation');
        wp_deregister_script('badubed-skip-link-focus-fix');
    }
}
