<?php 

namespace App\Controllers\Page;

use Core\BaseController;
use App\Model\ModelSettings;
use App\Model\ModelBook;

class EditorNotes extends BaseController {
    public function Index()
    {
        $ModelSettings = new ModelSettings;
        $ModelBook = new ModelBook;

        $book_data = $ModelBook->getBooks();
        $data = $ModelSettings->getSettings('contact');
        $socialdata = $ModelSettings->getSettings('socialmedia');

        $socialmedia = json_decode($socialdata["description"]);
        $contact = json_decode($data["description"]);
        
        $data['header'] = $this->view->load('page/static/header', compact('data','contact','socialmedia'));
        $data['footer'] = $this->view->load('page/static/footer', compact('data','contact','socialmedia'));

        echo $this->view->load('page/editor_notes', compact('data','contact','book_data'));
    }
}


?>