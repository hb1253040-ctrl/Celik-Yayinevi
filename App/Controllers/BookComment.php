<?php 

namespace App\Controllers;

use Core\BaseController;
use App\Model\ModelBookComment;

class BookComment extends BaseController {
    public function BookComment() {

        $ModelBookComment = new ModelBookComment;

        $data['book_comment'] = $ModelBookComment->getBookcomments();
        
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("comment/comment",compact('data'));
    }
    
}

?>