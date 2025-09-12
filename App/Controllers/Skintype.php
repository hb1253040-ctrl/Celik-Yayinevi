<?php 

namespace App\Controllers;
use Core\BaseController;

use App\Model\ModelSkintype;

class Skintype extends BaseController {
    public function Skintype()
    {
        $success = -1;
        $msg = "";
        $ModelSkintype = new ModelSkintype;
        $data['skintype'] = $ModelSkintype->getSkintypes();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("skintype/skintype",compact('data'));
    }
    public function Add()
    {
        $success = -1;
        $msg = "";
        $ModelSkintype = new ModelSkintype;
        $data['skintype'] = $ModelSkintype->getSkintypes();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("skintype/add",compact('data','success','msg'));
    }

    public function Update($id)
    {
        $success = -1;
        $msg = "";
        $ModelSkintype = new ModelSkintype;
        $data['skintype'] = $ModelSkintype->getSkintype($id);

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("skintype/update",compact('data','success','msg'));
    }


    public function CreateSkintype()
    {
        $data = $this->request->post();
    
        if (isset($_POST['add_skintype'])) 
        {
            if (empty($data['name']))
            {
                $msg = "Lütfen YayınEvi Adını Boş Bırakmayınız";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');
                
                echo $this->view->load("skintype/add",compact('data','msg','success','msg'));
                exit();
            }

            $ModelSkintype = new ModelSkintype();

            $data['skintype'] = $ModelSkintype->getSkintypes();
            
            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');

            $insert = $ModelSkintype->createSkintype([
                'name' => $data['name'],
            ]);

            if ($insert){
                $success = 1;
            }else{
                $success = 0;
            }
            echo $this->view->load("skintype/add",compact('data','success','success'));
        }
    }

    public function UpdateSkintype($id)
    {
        $data = $this->request->post();

        if (isset($_POST['update_skintype'])) {

            if (!$data['id']){
                $msg = "Cilt Türü Bilgilerine Ulaşamadık";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');
                
                echo $this->view->load("skintype/update",compact('data','msg',"success",'msg'));
                exit();
            }

            $ModelSkintype = new ModelSkintype();
            $data['skintype'] = $ModelSkintype->getSkintype($id);
        
            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');

            $update = $ModelSkintype->updateSkintype([
                'id' => $data['id'],
                'name' => $data['name']
            ]);
    
            if ($update){
                $success=1;
            }else{
                $success=0;
            }

            echo $this->view->load("skintype/update",compact('success','data'));

        }
    }

    public function RemoveSkintype()
    {

        $data = $this->request->post();

        if (!$data['skintype_id']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Yazar bilgisi alınamadı.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $remove = $this->db->remove("DELETE FROM skin_types WHERE skin_types.id = '{$data['skintype_id']}' ");

        if ($remove){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'Cilt Türü Bilgilerini kalıcı olarak silindi..';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'removed' => $data['skintype_id']]);
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