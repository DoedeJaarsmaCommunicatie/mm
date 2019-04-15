<?php
namespace App\Controllers\Http\Vacatures;

class VacatureController
{
    private $args;
    
    public function index()
    {
    }
    
    public function newThree()
    {
        $this->args = [
            'post_type'     => 'vacature',
            'posts_per_page'=> 3,
            'orderby'       => 'date',
            'order'         => 'DESC'
        ];
        
        return $this->fetchData();
    }
    
    
    private function fetchData()
    {
        return \Timber\Timber::get_posts($this->getArgs());
    }
    
    /**
     * @return mixed
     */
    public function getArgs()
    {
        return $this->args;
    }
    
    /**
     * @param mixed $args
     */
    public function setArgs($args) : void
    {
        $this->args = $args;
    }
}
