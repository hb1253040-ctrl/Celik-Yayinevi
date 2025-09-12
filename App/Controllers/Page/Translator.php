<?php 

namespace App\Controllers\Page;

use Core\BaseController;
use App\Model\ModelSettings;
use App\Model\ModelBook;
use App\Model\ModelAuthor;

class Translator extends BaseController {
    public function Index()
    {
        $ModelSettings = new ModelSettings;
        $ModelBook = new ModelBook;
        $ModelAuthor = new ModelAuthor;

        $book_data = $ModelBook->getBooks();
        $author_data = $ModelAuthor->getAuthors();
        $data = $ModelSettings->getSettings('contact');
        $socialdata = $ModelSettings->getSettings('socialmedia');

        $socialmedia = json_decode($socialdata["description"]);
        $contact = json_decode($data["description"]);
        
        $data['header'] = $this->view->load('page/static/header', compact('data','contact','socialmedia'));
        $data['footer'] = $this->view->load('page/static/footer', compact('data','contact','socialmedia'));

        echo $this->view->load('page/translator_index', compact('data','contact','book_data','author_data'));
    }
}


?>