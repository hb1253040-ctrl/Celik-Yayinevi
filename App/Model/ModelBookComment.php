<?php 

namespace App\Model;

use Core\BaseModel;

class ModelBookComment extends BaseModel 
{
    public function getBookcomments() 
    {
        return $this->db->query("SELECT book_comments.*, books.name as book_name FROM book_comments JOIN books ON books.id = book_comments.book_id", true);
    }

    public function createBookcomment($data)
    {

        extract($data);
        
        $user = $this->db->connect->prepare('INSERT INTO book_comments SET 
                            book_id=:book_id,
                            name=:name,
                            email=:email,
                            comment=:comment
                          ');
        $insert = $user->execute($data);

        if ($insert){
            return true;
        }else{
            return false;
        }
    }

}


?>