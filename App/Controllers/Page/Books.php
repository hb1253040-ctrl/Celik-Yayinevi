<?php 

namespace App\Controllers\Page;

use Core\BaseController;
use App\Model\ModelSettings;
use App\Model\ModelBook;
use App\Model\ModelCategory;

class Books extends BaseController {
    public function Index()
    {
        $ModelSettings = new ModelSettings;
        $ModelBook = new ModelBook;
        $ModelCategory = new ModelCategory;

        $book_data = $ModelBook->getBooks();
        $books_row = $ModelBook->getBooksRow();
        $category_data = $ModelCategory->getCategories();
        $data = $ModelSettings->getSettings('contact');
        $socialdata = $ModelSettings->getSettings('socialmedia');

        $socialmedia = json_decode($socialdata["description"]);
        $contact = json_decode($data["description"]);
        
        $data['header'] = $this->view->load('page/static/header', compact('data','contact','socialmedia'));
        $data['footer'] = $this->view->load('page/static/footer', compact('data','contact','socialmedia'));

        echo $this->view->load('page/book_index', compact('data','contact','book_data','category_data','books_row'));
    }

    public function CategoryIndex($slug)
    {

        $pagination_limit = 9;

        $ModelSettings = new ModelSettings;
        $ModelBook = new ModelBook;
        $ModelCategory = new ModelCategory;

        $book_data = $ModelBook->getBooks();
        $total_pages = $ModelBook->getBooksRow();
        $category_data = $ModelCategory->getCategories();
        $category_slug = $ModelCategory->getCategorySlug($slug);
        $data = $ModelSettings->getSettings('contact');
        $socialdata = $ModelSettings->getSettings('socialmedia');

        $socialmedia = json_decode($socialdata["description"]);
        $contact = json_decode($data["description"]);
        
        $data['header'] = $this->view->load('page/static/header', compact('data','contact','socialmedia'));
        $data['footer'] = $this->view->load('page/static/footer', compact('data','contact','socialmedia'));


        $pagination = ceil($total_pages / $pagination_limit);

        $page = isset($_GET['pagination']) ? (int) $_GET['pagination'] : 1 ;

        if ($page < 1) $page = 1;

        if($page > $pagination) $page = $pagination; 

        $limit = ($page - 1) * 9 ;

        $book_pagination = $this->db->connect->prepare('SELECT books.*,category.name as category_name, category.slug as category_slug, publishers.name as publisher_name, paper_types.name as paper_type_name,skin_types.name as skin_type_name FROM books
                                                                JOIN category ON category.id = books.category_id 
                                                                JOIN publishers ON publishers.id = books.publisher_id 
                                                                JOIN paper_types ON paper_types.id = books.paper_type_id 
                                                                JOIN skin_types ON skin_types.id = books.skin_type_id WHERE category.slug = :slug LIMIT '.$limit.','.$pagination_limit.'');

        $book_pagination->execute(['slug' => $slug]);

        echo $this->view->load('page/category_index', compact('data','contact','book_data','category_data','category_slug','total_pages','pagination','page','book_pagination'));
    }
}


?>