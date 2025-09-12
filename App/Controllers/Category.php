<?php 

namespace App\Controllers;

use Core\BaseController;
use App\Model\ModelCategory;

class Category extends BaseController 
{
    public function Category() 
    {

        $ModelCategory = new ModelCategory();
        $data['category'] = $ModelCategory->getCategories();
        
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("category/category",compact('data'));
    }

    public function Add() 
    {
        $msg="";
        $success=-1;
            
        $ModelCategory = new ModelCategory();
        $data['category'] = $ModelCategory->getParentCategories();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("category/add",compact('data','success','msg'));
    }
    
    public function Update($id) 
    {
        $msg="";
        $success=-1;
            
        $ModelCategory = new ModelCategory();
        $data['category'] = $ModelCategory->getCategory($id);
        $data['parentcategory'] = $ModelCategory->getParentCategories();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("category/update",compact('data','success','msg'));
    }

    public function CreateCategory() 
    {
        $data = $this->request->post();
    
        if (isset($_POST['add_category'])) 
        {

            if (empty($data['name']))
            {
                $msg = "Lütfen YayınEvi Adını Boş Bırakmayınız";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');
                
                echo $this->view->load("category/add",compact('data','msg','success','msg'));
                exit();
            }

            else if (empty($data['slug']))
            {
                $msg = "Lütfen YayınEvi Slug Kısmını Boş Bırakmayınız";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');

                echo $this->view->load("category/add",compact('data','msg',"success",'msg'));
                exit();
            }

            $ModelCategory = new ModelCategory();

            $data['category'] = $ModelCategory->getParentCategories();
            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');

            $insert = $ModelCategory->createCategory([
                'name' => $data['name'],
                'slug' => permalink($data['slug']),
                'parent_id' => $data['parent_id']
            ]);

            if ($insert){
                $success = 1;
            }else{
                $success = 0;
            }
            echo $this->view->load("category/add",compact('data','success'));
        }
    }

    public function UpdateCategory($id)
    {
        $data = $this->request->post();

        if (isset($_POST['update_category'])) {

            if (!$data['id']){
                $msg = "Publisher Bilgilerine Ulaşamadık";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');
                
                echo $this->view->load("category/update",compact('data','msg',"success",'msg'));
                exit();
            }

            $ModelCategory = new ModelCategory();
    
            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');

            $update = $ModelCategory->updateCategory([
                'id' => $data['id'],
                'parent_id' => $data['parent_id'],
                'name' => $data['name'],
                'slug' => permalink($data['slug'])
            ]);
            $data['category'] = $ModelCategory->getCategory($id);
    
            if ($update){
                $success=1;
            }else{
                $success=0;
            }

            echo $this->view->load("category/update",compact('success','data'));

        }
    
    }

    public function RemoveCategory()
    {

        $data = $this->request->post();

        if (!$data['category_id']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Yayınevi bilgisi alınamadı.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $remove = $this->db->remove("DELETE FROM category WHERE category.id = '{$data['category_id']}' ");

        if ($remove){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'Kategori Bilgileri kalıcı olarak silindi..';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'removed' => $data['category_id']]);
            exit();
        }else{
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Beklenmedik bir hata meydana geldi. Lüfen sayfanızı yenileyerek tekrar deneyin.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }
    
}

?>