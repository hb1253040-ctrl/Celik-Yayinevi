<?php 

namespace App\Model;

use Core\BaseModel;

class ModelBook extends BaseModel 
{

    public function getAuthorbooks()
    {
        return $this->db->query("SELECT author_books.*,author.type as author_type,books.image as book_image,books.name as book_name,author.name as author_name, author.description as author_description FROM author_books 
                                    JOIN books ON books.id = author_books.book_id
                                    JOIN author ON author.id = author_books.author_id",true);
    }

    public function createAuthorbook($data) 
    {
        extract($data);
        
        $user = $this->db->connect->prepare('INSERT INTO author_books SET 
                            author_id=:author_id,
                            book_id=:book_id');
        
        $author_book_insert = $user->execute($data);

        if ($author_book_insert){
            return true;
        }else{
            return false;
        }
    }

    public function updateAuthorbook($data) 
    {
        extract($data);
        
        $user = $this->db->connect->prepare('UPDATE author_books SET 
                            author_id=:author_id
                            WHERE book_id=:book_id');
        
        $author_book_update = $user->execute($data);

        if ($author_book_update){
            return true;
        }else{
            return false;
        }
    }

    public function getBooks() 
    {
        return $this->db->query('SELECT books.*,category.name as category_name, category.slug as category_slug, publishers.name as publisher_name, paper_types.name as paper_type_name,skin_types.name as skin_type_name FROM books
                                        JOIN category ON category.id = books.category_id 
                                        JOIN publishers ON publishers.id = books.publisher_id 
                                        JOIN paper_types ON paper_types.id = books.paper_type_id 
                                        JOIN skin_types ON skin_types.id = books.skin_type_id',true);
    }

    public function getBooksRow() 
    {
        $user = $this->db->connect->prepare('SELECT * FROM books');

        $user->execute();

        $num_rows = $user->rowCount();

        if ($num_rows){
            return $num_rows;
        }else{
            return false;
        }

    }

    public function getBook($id) 
    {
        return $this->db->query("SELECT * FROM books WHERE id = '$id' " , false);
    }

    public function createBooks($data)
    {
        extract($data);

        $user = $this->db->connect->prepare("INSERT INTO books SET 
                        name=:name,
                        category_id =:category_id,
                        skin_type_id =:skin_type_id,
                        paper_type_id =:paper_type_id,
                        publisher_id =:publisher_id,
                        size=:size,
                        image=:image,
                        paper_number=:paper_number,
                        isbn=:isbn,
                        barkod=:barkod,
                        price=:price,
                        description=:description
                        ");
                        
        
        $insert = $user->execute($data);
        $insert_book_id = $this->db->connect->lastInsertId();

        if ($insert){
            return $insert_book_id;
        }else{
            return false;
        }

    }

    public function updateBooks($data)
    {
        extract($data);

        $user = $this->db->connect->prepare("UPDATE books SET 
                            name=:name,
                            category_id =:category_id,
                            skin_type_id =:skin_type_id,
                            paper_type_id =:paper_type_id,
                            publisher_id =:publisher_id,
                            size=:size,
                            image=:image,
                            paper_number=:paper_number,
                            isbn=:isbn,
                            barkod=:barkod,
                            price=:price,
                            description=:description WHERE id=:id
                        ");

        $update = $user->execute($data);

        if ($update){
            return true;
        }else{
            return false;
        }
    }

}


?>