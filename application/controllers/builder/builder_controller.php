<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class builder_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('builder/builder_model');
		$this->global['tis'] = $this;
    }
    
    public function index()
    {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'Dashboard';
    
        $this->load("page-login");
     
    }
    function builder_dashboard(){
        $id=$_SESSION['login_id'];
        $this->global['record'] = $this->builder_model->get_records('tbl_builder_register', "status='0' and id='$id'")[0];
        
        $this->loadView("dashboard",$this->global, NULL , NULL); 
    }

    function builder_login(){

        $this->load("page-login");  
    }
    function builder_login_validation()
    {
        if(!empty($this->input->post('contact')))
        {           
            $contact = $this->input->post('contact');
            $password = md5($this->input->post('password'));
            $records = $this->builder_model->get_records('tbl_builder_register', "(email = '" . $contact . "' or mobile = '" . $contact . "') and password = '" . $password . "' ");
            if(sizeof($records) > 0)
            {
                if($records[0]->status == 0)
                {
                    
                        $_SESSION['builder_info_id'] = $records[0]->id;
                        $data['builder_info_id']=$records[0]->id;
                        $_SESSION['is_logged_in'] = TRUE;
                        $_SESSION['login_id'] = $records[0]->id;
                        $_SESSION['header']=1;
                        $data['result'] = 1;
                    
                }
                else
                {
                    $data['result'] = 2;
                }
            }
            else
            {
                $data['result'] = 0;
            }
        }
        else
        {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }
    function builder_property_list(){

        $id=$_SESSION['login_id'];
        $this->global['record'] = $this->builder_model->get_records('tbl_builder_register', "status='0' and id='$id'")[0];
        $this->global['properties'] = $this->builder_model->get_records('tbl_property_details', "status='0' and builders_info_id='$id'");
        $this->loadView("property-list",$this->global, NULL , NULL); 
    }
    function builder_profile(){
        $id=$_SESSION['login_id'];
        $this->global['record'] = $this->builder_model->get_records('tbl_builder_register', "status='0' and id='$id'")[0];
        
        $this->loadView("builder-profile",$this->global, NULL , NULL);   
    }

    function add_property(){

        $this->loadView("add-property",$this->global,NULL,NULL);  
    }
    function slugify($text)
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    
    function update()
    {
        
            $info = array();
            foreach($_POST as $key => $value)
            {
                if($key != 'table_name' && $key != 'row_id' && $key != 'product_1')
                {
                    if($key == 'slug')
                    {
                        if(strlen($value) > 0)
                        {
                            $info[$key] = $this->slugify($value);
                        }
                        else
                        {
                            $info[$key] = $this->slugify($this->input->post('name'));
                        }
                    }
                    else
                    {
                        $info[$key] = htmlentities($value);
                    }
                }
            }
            $table = $this->input->post('table_name');
            $row_id = $this->input->post('id');
            
            if(sizeof($_FILES) > 0)
            {
                if($table == 'tbl_brands')
                {
                    $folder_name = 'brands';
                }
                elseif($table == 'tbl_sections')
                {
                    $folder_name = 'sections';
                }
                elseif($table == 'tbl_category' || $table == 'tbl_sub_category' || $table == 'tbl_child_category')
                {
                    $folder_name = 'category';
                }

                elseif($table == 'mydetails')
                {
                    $folder_name = 'mydetails';
                }
                else
                {
                    $folder_name = "common";
                }
                
                foreach($_FILES as $key => $value)
                {
                    $file_new_name = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES[$key]["name"],PATHINFO_EXTENSION));
                    if($this->image_upload($key, $file_new_name, 'uploads/' . $folder_name . '/') == true)
                    {
                        $info[$key] = $file_new_name;
                    }
                }
                if($this->builder_model->update($table, $info, "id = '" . $row_id . "'"))
                {
                        
                    
                    $data['result'] = 1;
                }
                else
                {
                    $data['result'] = 0;
                }
            }
            else
            {
                if($this->builder_model->update($table, $info, "id = '" . $row_id . "'"))
                {
                        
                    
                    $data['result'] = 1;
                }
                else
                {
                    $data['result'] = 0;
                }
            }
            
        
        echo json_encode($data);
    }
        function image_upload($atr_name, $file_new_name, $target_dir)
    {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($_FILES[$atr_name]["name"],PATHINFO_EXTENSION));
        $target_file = $target_dir . $file_new_name;
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") {
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            return false;
        } else {
            if (move_uploaded_file($_FILES[$atr_name]["tmp_name"], $target_file)) {
                return true;
            } else {
                return false;
            }
        }
    }

}
?>