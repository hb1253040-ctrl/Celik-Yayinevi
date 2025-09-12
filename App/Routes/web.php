<?php

$cms->router->before('GET|POST', '/admin', 'Middlewares\AuthMiddleware@isLogin');
$cms->router->before('GET|POST', '/author.*', 'Middlewares\AuthMiddleware@isLogin');
$cms->router->before('GET|POST', '/books.*', 'Middlewares\AuthMiddleware@isLogin');
$cms->router->before('GET|POST', '/category.*', 'Middlewares\AuthMiddleware@isLogin');
$cms->router->before('GET|POST', '/comment.*', 'Middlewares\AuthMiddleware@isLogin');
$cms->router->before('GET|POST', '/contact.*', 'Middlewares\AuthMiddleware@isLogin');
$cms->router->before('GET|POST', '/papertype.*', 'Middlewares\AuthMiddleware@isLogin');
$cms->router->before('GET|POST', '/publisher.*', 'Middlewares\AuthMiddleware@isLogin');
$cms->router->before('GET|POST', '/skintype.*', 'Middlewares\AuthMiddleware@isLogin');
$cms->router->before('GET|POST', '/slider.*', 'Middlewares\AuthMiddleware@isLogin');



// ------------------------------------ İNDEX PAGE ------------------------------------ //

// HOME PAGE //
$cms->router->get('/', 'Controllers\Page\Home@Index');

// CONTACT-US PAGE //
$cms->router->get('/communication', 'Controllers\Page\Contact@Index');

// EDITOR NOTES PAGE  //
$cms->router->get('/editor_notes', 'Controllers\Page\EditorNotes@Index');


// AUTHOR PAGE //
$cms->router->mount('/index_author', function() use ($cms) {

    // BOOKS HOME //
    $cms->router->get('/', 'Controllers\Page\Author@Index');

    // BOOKS ABOUT  //
    $cms->router->get('/author_about/([0-9]+)', 'Controllers\Page\AuthorAbout@Index'); 
});

// EDITOR PAGE //

$cms->router->mount('/translator_index', function() use ($cms) {

    // BOOKS HOME //
    $cms->router->get('/', 'Controllers\Page\Translator@Index');

    // BOOKS ABOUT  //
    $cms->router->get('/translator_about/([0-9]+)', 'Controllers\Page\TranslatorAbout@Index'); 
});

// AUTHOR PAGE //
$cms->router->mount('/editor_index', function() use ($cms) {

    // BOOKS HOME //
    $cms->router->get('/', 'Controllers\Page\Editor@Index');

    // BOOKS ABOUT  //
    $cms->router->get('/editor_about/([0-9]+)', 'Controllers\Page\EditorAbout@Index'); 
});


// BOOKS PAGE //
$cms->router->mount('/book_index', function() use ($cms) {

    // BOOKS HOME //
    $cms->router->get('/', 'Controllers\Page\Books@Index');

    // CATEGORY İNDEX // 
    $cms->router->get('/category_index/([a-zA-ZÇŞĞÜÖİçşğüöı\-]+)/([0-9]+)','Controllers\Page\Books@CategoryIndex');

    // BOOKS ABOUT  //
    $cms->router->get('/book_about/([0-9]+)', 'Controllers\Page\BookAbout@Index');
    $cms->router->post('/book_about/([0-9]+)', 'Controllers\Page\BookAbout@CreateBookAbout');
    
});


// ------------------------------------ ADMİN PAGE ------------------------------------ //

// Login Page
$cms->router->get('/login', 'Controllers\Auth@Index');
// Login Post
$cms->router->post('/login', 'Controllers\Auth@Login');
$cms->router->get('/exit', 'Controllers\Auth@Logout');

// ADMİN HOME //
$cms->router->get('/admin', 'Controllers\Home@Index');

// LOGİN PAGE //
$cms->router->get('/login', 'Controllers\Auth@Index');

$cms->router->get('/social_media', 'Controllers\Socialmedia@Index');

// COMMENT PAGE //
$cms->router->get('/comment', 'Controllers\BookComment@BookComment');

// AUTHOR PAGE //
$cms->router->mount('/author', function() use ($cms) {

    // Author Home //
    $cms->router->get('/', 'Controllers\Author@Author');
    
    // Author Add //
    $cms->router->get('/add', 'Controllers\Author@Add');
    $cms->router->post('/add', 'Controllers\Author@CreateAuthor');
    
    // Author Update // 
    $cms->router->get('/update/([0-9]+)', 'Controllers\Author@Update');
    $cms->router->post('/update/([0-9]+)', 'Controllers\Author@UpdateAuthor');

    // Author Remove //
    $cms->router->post('/delete', 'Controllers\Author@RemoveAuthor');
});

// BOOKS PAGE //
$cms->router->mount('/books', function() use ($cms) {

    // Books Home //
    $cms->router->get('/', 'Controllers\Books@Index');

    // Books Add //
    $cms->router->get('/add', 'Controllers\Books@Add');
    $cms->router->post('/add', 'Controllers\Books@CreateBooks');

    // Books Update //
    $cms->router->get('/update/([0-9]+)', 'Controllers\Books@Update');
    $cms->router->post('/update/([0-9]+)', 'Controllers\Books@UpdateBooks');

    // Books Remove //
    $cms->router->post('/delete', 'Controllers\Books@RemoveBooks');
});

// PUBLISHER PAGE // 
$cms->router->mount('/publisher', function() use ($cms) {

    // Publisher Home //
    $cms->router->get('/', 'Controllers\Publisher@Publisher');

    // Publisher Add //
    $cms->router->get('/add', 'Controllers\Publisher@Add');
    $cms->router->post('/add', 'Controllers\Publisher@CreatePublisher');

    // Publisher Update //
    $cms->router->get('/update/([0-9]+)', 'Controllers\Publisher@Update');
    $cms->router->post('/update/([0-9]+)', 'Controllers\Publisher@UpdatePublisher');
    
    // Publisher Remove //
    $cms->router->post('/delete', 'Controllers\Publisher@RemovePublisher');
});

// CONTACT PAGE //
$cms->router->mount('/contact', function() use ($cms) {
    $cms->router->get('/', 'Controllers\Contact@Contact');
    $cms->router->post('/', 'Controllers\Contact@Contact');
});

// SOCIAL MEDIA PAGE //
$cms->router->mount('/socialmedia', function() use ($cms) {
    $cms->router->get('/', 'Controllers\Socialmedia@Socialmedia');
    $cms->router->post('/', 'Controllers\Socialmedia@Socialmedia');
});

// PAPER TYPE PAGE //
$cms->router->mount('/papertype', function() use ($cms) {

    // Paper Type Home //
    $cms->router->get('/', 'Controllers\Papertype@Papertype');

    // Paper Type Add //
    $cms->router->get('/add', 'Controllers\Papertype@Add');
    $cms->router->post('/add', 'Controllers\Papertype@CreatePapertype');

    // Paper Type Update //
    $cms->router->get('/update/([0-9]+)', 'Controllers\Papertype@Update');
    $cms->router->post('/update/([0-9]+)', 'Controllers\Papertype@UpdatePapertype');

    // Paper Type  Remove //
    $cms->router->post('/delete', 'Controllers\Papertype@RemovePapertype');
});

// SKİN TYPE PAGE //
$cms->router->mount('/skintype', function() use ($cms) {
    
    // Skin Type Home //
    $cms->router->get('/', 'Controllers\Skintype@Skintype');

    // Skin Type Add//
    $cms->router->get('/add', 'Controllers\Skintype@Add');
    $cms->router->post('/add', 'Controllers\Skintype@CreateSkintype');

    // Skin Type Update //
    $cms->router->get('/update/([0-9]+)', 'Controllers\Skintype@Update');
    $cms->router->post('/update/([0-9]+)', 'Controllers\Skintype@UpdateSkintype');

    // Skin Type  Remove //
    $cms->router->post('/delete', 'Controllers\Skintype@RemoveSkintype');
});

// CATEGORY PAGE //
$cms->router->mount('/category', function() use ($cms) {

    // Category Home //
    $cms->router->get('/', 'Controllers\Category@Category');

    // Category Add //
    $cms->router->get('/add', 'Controllers\Category@Add');
    $cms->router->post('/add', 'Controllers\Category@CreateCategory');

     // Category Update //
     $cms->router->get('/update/([0-9]+)', 'Controllers\Category@Update');
     $cms->router->post('/update/([0-9]+)', 'Controllers\Category@UpdateCategory');
     
     // Category Remove //
     $cms->router->post('/delete', 'Controllers\Category@RemoveCategory');
});

// SLİDER PAGE //
$cms->router->mount('/slider', function() use ($cms) {

    // Slider Home //
    $cms->router->get('/', 'Controllers\Slider@Index');

    // Slider Add //
    $cms->router->get('/add', 'Controllers\Slider@Add');
    $cms->router->post('/add', 'Controllers\Slider@CreateSlider');

    // Slider Update //
    $cms->router->get('/update/([0-9]+)', 'Controllers\Slider@Update');
    $cms->router->post('/update/([0-9]+)', 'Controllers\Slider@UpdateSlider');
    
    // Slider Remove //
    $cms->router->post('delete', 'Controllers\Slider@RemoveSlider');

});

?>