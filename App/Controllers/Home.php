<?php 

namespace App\Controllers;

use Core\BaseController;

class Home extends BaseController {
    public function Index()
    { 
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

    
        echo $this->view->load('home/index', compact('data'));
        
    }
}


?>