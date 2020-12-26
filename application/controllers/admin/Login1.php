<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Login1 extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/common_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
    }
        public function logout()
    {
        session_destroy();
        $this->load->view("builder/page-login");
    }

    
     function builder_login(){

        $this->load->view("builder/page-login");  
    }

     function builder_dashboard(){
        $id=$_SESSION['login_id'];
        $this->global['record'] = $this->common_model->get_records('tbl_builder_register', "status='0' and id='$id'")[0];
        if($_SESSION['is_logged_in']==TRUE)
        {
        $this->loadView("dashboard",$this->global, NULL , NULL); 
            }
        else{
               $this->load->view("builder/page-login");  
            }
    }


    function builder_login_validation()
    {
        if(!empty($this->input->post('contact')))
        {           
            $contact = $this->input->post('contact');
            $password = md5($this->input->post('password'));
            $records = $this->common_model->get_records('tbl_builder_register', "(email = '" . $contact . "' or mobile = '" . $contact . "') and password = '" . $password . "' ");
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
        $this->global['record'] = $this->common_model->get_records('tbl_builder_register', "status='0' and id='$id'")[0];
        $this->global['properties'] = $this->common_model->get_records('tbl_property_details', "status='0' and builders_info_id='$id'");
            if($_SESSION['is_logged_in']==TRUE)
        {
        $this->loadView("property-list",$this->global, NULL , NULL); 
        }
        else{
               $this->load->view("builder/page-login");  
            }
    }


    function builder_profile(){
        $id=$_SESSION['login_id'];
        $this->global['record'] = $this->common_model->get_records('tbl_builder_register', "status='0' and id='$id'")[0];
        if($_SESSION['is_logged_in']==TRUE)
        {
        $this->loadView("builder-profile",$this->global, NULL , NULL);   
        }
        else{
               $this->load->view("builder/page-login");  
            }
    }



    function add_property(){
            if($_SESSION['is_logged_in']==TRUE)
        {
            $id=$_SESSION['form_id'];
             $this->global['record'] = $this->common_model->get_records('tbl_property_details', "status='0' and id='$id'")[0];
       
         $this->loadView("add-property",$this->global,NULL,NULL);  
        }
        else{
               $this->load->view("builder/page-login");  
            }
    }
      
    
    
    function edit_property($id)
    {
        $this->global['records']=$this->common_model->get_records('tbl_property_details', "status = '0' and id='$id' order by date_time desc");
        if($_SESSION['is_logged_in']==TRUE)
        {
        $this->loadView("edit-product-page",$this->global);
        }
        else{
               $this->load->view("builder/page-login");  
            }
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
            $row_id = $this->input->post('row_id');
            if($this->input->post('video_url[]'))
            {
                 $info['video_url']=implode(",",$this->input->post('video_url[]'));
            }
             if($this->input->post('similar_properties[]'))
            {
                 $info['similar_properties']=implode(",",$this->input->post('similar_properties[]'));
            }
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
                if($this->common_model->update($table, $info, "id = '" . $row_id . "'"))
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
                if($this->common_model->update($table, $info, "id = '" . $row_id . "'"))
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
    function builder_image_update()
{      
    $data= array();

    $row_id=$this->input->post('row_id');
    $this->load->library('upload');
    $dataInfo = array();
    $files = $_FILES;
    $cpt = count($_FILES['userfile']['name']);

if($_FILES['userfile']['name'][0] != '')
        {
    for($i=0; $i<$cpt; $i++)
    {           
        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

        $this->upload->initialize($this->set_upload_options());
        $this->upload->do_upload('userfile');
        $dataInfo[] = $this->upload->data();
    }
    $a=array();

    for($i=0;$i<count($dataInfo);$i++){
    array_push($a,$dataInfo[$i]['file_name']);
    }
 $data['image']=implode(",",$a);

}
$dataInfo2= array();
$cpt = count($_FILES['file']['name']);

if($_FILES['file']['name'][0] != '')
        {
    for($i=0; $i<$cpt; $i++)
    {           
        $_FILES['file']['name']= $files['file']['name'][$i];
        $_FILES['file']['type']= $files['file']['type'][$i];
        $_FILES['file']['tmp_name']= $files['file']['tmp_name'][$i];
        $_FILES['file']['error']= $files['file']['error'][$i];
        $_FILES['file']['size']= $files['file']['size'][$i];    

        $this->upload->initialize($this->set_upload_options());
        $this->upload->do_upload('file');
        $dataInfo2[] = $this->upload->data();
    }
    $b=array();

    for($i=0;$i<count($dataInfo2);$i++){
    array_push($b,$dataInfo2[$i]['file_name']);


    }
            $data['attachment']=implode(",",$b);
}
if($_FILES['profile_image']['name'] != '')
        {
            $store_profile_image = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['profile_image']["name"],PATHINFO_EXTENSION));
            if($this->image_upload('profile_image', $store_profile_image, 'uploads/common/') == true)
            {
                $data['profile_image'] = $store_profile_image;
            }
        }

   
if($_FILES['banner']['name'] != '')
        {
            $store_profile_image = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['banner']["name"],PATHINFO_EXTENSION));
            if($this->image_upload('banner', $store_profile_image, 'uploads/common/') == true)
            {
                $data['banner_image'] = $store_profile_image;
            }
        }


        $insert_id=$this->common_model->update('tbl_property_images', $data,"id='$row_id'");
        if($insert_id)
        {
            $data['result'] = 1;
           
        }
     echo json_encode($data);
}




  function set_upload_options()
{   
    //upload an image options
    $config = array();
    $config['upload_path'] = 'uploads/common/';

    $config ['allowed_types'] = 'gif|jpg|png|jpeg|txt|pdf|xsl|doc';
    $config['max_size']      = '0';
    $config['overwrite']     = FALSE;

    return $config;
}   
    /**
     * This function used to check the user is logged in or not
     */
    
    /**
     * This function used to logged in user
     */
    public function loginMe()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $result = $this->login_model->loginMe($email, $password);
            
            if(count($result) > 0)
            {
                foreach ($result as $res)
                {
                    $sessionArray = array('userId'=>$res->userId,                    
                                            'role'=>$res->roleId,
                                            'roleText'=>$res->role,
                                            'name'=>$res->name,
                                            'email'=> $res->email,
                                            'isLoggedIn' => TRUE
                                    );
                                    
                    $this->session->set_userdata($sessionArray);
                 
                    redirect('admin/property');
                    echo $_SESSION['email'].' ds '.$res->email ;
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');
                
                redirect('admin/login');
            }
        }
    }

    /**
     * This function used to load forgot password view
     */
    public function forgotPassword()
    {
        $this->load->view('admin/forgotPassword');
    }
    
    /**
     * This function used to generate reset password request link
     */
    function resetPasswordUser()
    {
        $status = '';
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('login_email','Email','trim|required|valid_email|xss_clean');
                
        if($this->form_validation->run() == FALSE)
        {
            $this->forgotPassword();
        }
        else 
        {
            $email = $this->input->post('login_email');
            
            if($this->login_model->checkEmailExist($email))
            {
                $encoded_email = urlencode($email);
                
                $this->load->helper('string');
                $data['email'] = $email;
                $data['activation_id'] = random_string('alnum',15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();
                
                $save = $this->login_model->resetPasswordUser($data);                
                
                if($save)
                {
                    $data1['reset_link'] = base_url() . "admin/resetPasswordConfirmUser/" . $data['activation_id'] . "/" . $encoded_email;
                    $userInfo = $this->login_model->getCustomerInfoByEmail($email);

                    if(!empty($userInfo)){
                        $data1["name"] = $userInfo[0]->name;
                        $data1["email"] = $userInfo[0]->email;
                        $data1["message"] = "Reset Your Password";
                    }

                    $sendStatus = resetPasswordEmail($data1);

                    if($sendStatus){
                        $status = "send";
                        setFlashData($status, "Reset password link sent successfully, please check mails.");
                    } else {
                        $status = "notsend";
                        setFlashData($status, "Email has been failed, try again.");
                    }
                }
                else
                {
                    $status = 'unable';
                    setFlashData($status, "It seems an error while sending your details, try again.");
                }
            }
            else
            {
                $status = 'invalid';
                setFlashData($status, "This email is not registered with us.");
            }
            redirect('admin/forgotPassword');
        }
    }

    // This function used to reset the password 
    function resetPasswordConfirmUser($activation_id, $email)
    {
        // Get email and activation code from URL values at index 3-4
        $email = urldecode($email);
        
        // Check activation id in database
        $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);
        
        $data['email'] = $email;
        $data['activation_code'] = $activation_id;
        
        if ($is_correct == 1)
        {
            $this->load->view('admin/newPassword', $data);
        }
        else
        {
            redirect('admin/login');
        }
    }
    
    // This function used to create new password
    function createPasswordUser()
    {
        $status = '';
        $message = '';
        $email = $this->input->post("email");
        $activation_id = $this->input->post("activation_code");
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        }
        else
        {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            
            // Check activation id in database
            $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);
            
            if($is_correct == 1)
            {                
                $this->login_model->createPasswordUser($email, $password);
                
                $status = 'success';
                $message = 'Password changed successfully';
            }
            else
            {
                $status = 'error';
                $message = 'Password changed failed';
            }
            
            setFlashData($status, $message);

            redirect("admin/login");
        }
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
function update_amenities(){
        $id=$this->input->post('id');
        $info['ameneties']=implode(",",$this->input->post('amenities[]'));
        $this->common_model->update('tbl_property_details',$info,"status = '0' and id='$id'");
        $data['result']=1;
        echo json_encode($data);
    }
    function delete()
    {
        $table_name = $this->input->post('table_name');
        $row_id = $this->input->post('row_id');
        $status = $this->input->post('status');

        $data['result'] = 0;
        
        
            if($this->common_model->delete_data_status($table_name,$row_id,$status)){
                $data['result'] = 1;

            }
        
        
        echo json_encode($data);
    }
    function change_password()
        {
            $id=$this->input->post('id');
            $password=md5($this->input->post('old_password'));

            
            if($this->common_model->get_records('tbl_builder_register', "status = '0'  and id='$id' and password='$password'"))
            {
                $info['password']=md5($this->input->post('password'));
                $res=$this->common_model->update("tbl_builder_register",$info, "id='$id'");
                $data['result']=1;
            }
            else{
                $data['result']=0;
            }
            echo json_encode($data);
        }

        public function builder_properties($id){
            $this->global['records']=$this->common_model->get_records('tbl_property_details', "status='0' and builders_info_id='$id'");

            $this->loadView("builder-properties",$this->global,NULL,NULL);
                                           
        }
        public function builder_enquiry_list($id)
   {
          $property_ids=$this->common_model->get_records('tbl_property_details', "status='0' and builders_info_id='$id' and post_status='A'");
                       
                
           $user=array();
           foreach($property_ids as $property_id){
                array_push($user,$property_id->id);
           
                }
           
           $listuser=implode(",",$user);
                          
        if(sizeof($listuser)>0 && $listuser[0]!='' && $listuser[0]!=','){


           $this->global['records'] = $this->common_model->get_custom_query("select * from tbl_enquiry where status = '0' and item_id IN ($listuser)  order by date_time desc");
       }
       
       else{
         $this->global['records'] = array();
       
       }
                          
           
       $this->loadView("enquiry-list", $this->global, NULL , NULL);
   
   }
   public function property_list($id)
   {
       
           $this->global['properties'] = $this->common_model->get_records('tbl_property_details', "status = '0' and id='$id' order by date_time desc");
       
       $this->loadView("property-list", $this->global, NULL , NULL);
   
   }
}

?>