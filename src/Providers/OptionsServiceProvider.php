<?php
namespace App\Providers;

class OptionsServiceProvider
{
    public function __construct()
    {
        if (!function_exists('acf_add_options_page')) {
            return;
        }
        
        $this->register();
    }
    
    public function register(): void
    {
        $this->addOptions();
        $this->addSubPages();
    }
    
    protected function addOptions(): void
    {
        \acf_add_options_page(
            [
                'page_title'    => 'Theme options',
                'menu_title'    => 'Theme options',
                'menu_slug'     => 'theme-options-main',
                'capability'    => 'edit_posts',
                'redirect'      => false
            ]
        );
    }
    
    protected function addSubPages(): void
    {
        $this->subPagePages();
    }
    
    protected function subPagePages(): void
    {
        \acf_add_options_sub_page(
            [
                'parent_slug'       => 'theme-options-main',
                'page_title'        => 'Mailchimp settings',
                'menu_title'        => 'Mailchimp'
            ]
        );
    }
}
