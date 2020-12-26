<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Category extends BaseController {

    /**
     * This is default constructor of the class
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/common_model');
        $this->isLoggedIn();
    }

    public function index() {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'Dashboard';

        $this->loadViews("dashboard", $this->global, NULL, NULL);
    }

    public function add_course() {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'add_course';

        $this->loadViews("add_course", $this->global, NULL, NULL);
    }

    public function add_video() {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'add_video';
        $this->global['recs'] = $this->common_model->get_records('tbl_videos', "status = '0' order by date_time desc")[0];
        $this->loadViews("add_video", $this->global, NULL, NULL);
    }

    public function add_text() {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'add_video';
        $this->global['recs'] = $this->common_model->get_records('tbl_videos', "status = '0' order by date_time desc")[0];
        $this->loadViews("add_text", $this->global, NULL, NULL);
    }

    public function course_list() {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'add_course';

        $this->global['records'] = $this->common_model->get_records('tbl_courses', "status = '0' order by date_time desc");

        $this->loadViews("course_list", $this->global, NULL, NULL);
    }

    public function users() {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'add_course';

        $this->global['records'] = $this->common_model->get_records('tbl_users', "isDeleted=0");

        $this->loadViews("admin-users", $this->global, NULL, NULL);
    }

    public function settings() {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'add_course';

        $this->global['records'] = $this->common_model->get_records('tbl_entroll_section', "status=0");

        $this->loadViews("entroll-section", $this->global, NULL, NULL);
    }

    public function edit_video($id) {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'add_course';
        $this->global['records'] = $this->common_model->get_records('tbl_videos', "status = '0' and course_id='$id' order by date_time desc");
        $this->global['id'] = $id;
        $this->loadViews("video_edit", $this->global, NULL, NULL);
    }

    public function edit_text($id) {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'add_course';
        $this->global['course'] = $this->common_model->get_records('tbl_courses', "status = '0'")[0];
        $course_id = $this->global['course'];
        $this->global['id'] = $id;
        $this->global['curriculum'] = $this->common_model->get_records('tbl_videos', "status = '0' and course_id='$id' order by date_time desc")[0];
        $curriculum_id = $this->global['curriculum'];
        $this->global['video_contents'] = $this->common_model->get_records('tbl_video_content', "status = '0' and video_id=$curriculum_id->id");
        $this->loadViews("text_edit", $this->global, NULL, NULL);
    }

    public function edit_video_content($id, $id2) {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'add_course';
        $this->global['course'] = $this->common_model->get_records('tbl_videos', "status = '0' and course_id='$id' and id='$id2' order by date_time desc")[0];
        $course = $this->global['course'];
        $this->global['course_type'] = $this->common_model->get_records('tbl_courses', "status = '0' and id='$course->course_id' order by date_time desc")[0];
        $this->global['video_contents'] = $this->common_model->get_records('tbl_video_content', "status = '0' and video_id='$id2'  order by date_time desc");
        $this->global['id'] = $id;
        $this->loadViews("edit_video_content", $this->global, NULL, NULL);
    }

    public function edit_text_content($id, $id2) {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'add_course';
        $this->global['course'] = $this->common_model->get_records('tbl_videos', "status = '0' and course_id='$id' and id='$id2' order by date_time desc")[0];
        $course = $this->global['course'];
        $this->global['course_type'] = $this->common_model->get_records('tbl_courses', "status = '0' and id='$course->course_id' order by date_time desc")[0];
        $this->global['video_contents'] = $this->common_model->get_records('tbl_video_content', "status = '0' and video_id='$id2'  order by date_time desc");
        $this->global['id'] = $id;
        $this->loadViews("edit_text_content", $this->global, NULL, NULL);
    }

    public function text_content_edit($id) {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'add_course';
        $this->global['records'] = $this->common_model->get_records('tbl_video_content', "status = '0' and id='$id'");
        $this->loadViews("edit-particular-text", $this->global, NULL, NULL);
    }

    public function text_edit_form() {
        $data['result'] = 0;
        $id = $this->input->post('course_id');
        $video_id = $this->input->post('video_id');
        $info['course_id'] = $this->input->post("course_id");
        $info['curriculum'] = $this->input->post("curriculum");
        $info['curriculum_title'] = $this->input->post("curriculum_title");
        if ($video_id == 'new') {
            $video_id = $this->common_model->insert("tbl_videos", $info);
        } else {
            $this->common_model->update("tbl_videos", $info, "status = '0' and course_id = '$id'");
        }

        $sizeofarray = sizeof($this->input->post('row_id'));
        for ($i = 0; $i < $sizeofarray; $i++) {
            $id1 = $_POST['row_id'][$i];
            $info1['title'] = $_POST['title'][$i];
            $info1['description'] = $_POST['description'][$i];
            $info1['url'] = $_POST['url'][$i];
            $info1['video_id'] = $video_id;

            if ($id1 == "new") {
                $this->common_model->insert("tbl_video_content", $info1);
            } else {
                $this->common_model->update("tbl_video_content", $info1, "id = '$id1'");
            }
        }
        $data['result'] = 1;

        echo json_encode($data);
    }

    public function text_edit_form_one() {
        $data['result'] = 0;
        $id = $this->input->post('row_id');
        $info['video_id'] = $this->input->post("video_id");
        $info['title'] = $this->input->post("title");
        $info['description'] = $this->input->post("description");
        $info['url'] = $this->input->post("url");

        $this->common_model->update("tbl_video_content", $info, "id = '$id'");

        $data['result'] = 1;

        echo json_encode($data);
    }

    public function newsletter() {
        $this->global['pageTitle'] = 'partners' . ' - ' . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_records('tbl_newsletter', "status = '0' order by date_time desc");

        $this->loadViews("newsletter", $this->global, NULL, NULL);
    }

    public function success_stories() {
        $this->global['pageTitle'] = 'partners' . ' - ' . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_records('tbl_testimonials_add', "status = '0' order by date_time asc");

        $this->loadViews("success_stories", $this->global, NULL, NULL);
    }

    public function contact_list() {
        $this->global['pageTitle'] = 'partners' . ' - ' . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_records('tbl_contact_form', "status = '0' order by date_time desc");

        $this->loadViews("contact_list", $this->global, NULL, NULL);
    }

    public function grievance() {
        $this->global['pageTitle'] = 'partners' . ' - ' . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_records('tbl_grievance_form', "status = '0' order by date_time desc");

        $this->loadViews("grievance", $this->global, NULL, NULL);
    }

    public function select_course_type() {
        $id = $this->input->post('data');
        $record = $this->common_model->get_records('tbl_courses', "status = '0' and id='$id'")[0];

        $data['result'] = $record->course_type;

        echo json_encode($data);
    }

//     public function list_category_page()
//     {
//         $this->global['pageTitle'] = 'Categories' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_category', "status != '9' order by name desc");
//         $this->loadViews("list_category_page", $this->global, NULL , NULL);
//     }
//     function admin_add_property(){
//         $this->loadViews("admin_add_property.php",$this->global,NULL,NULL);  
//     }
//     public function list_sub_category_page()
//     {
//         $this->global['pageTitle'] = 'Sub Categories' . ' - ' . $this->config->item('app_name');
//         $this->global['categories'] = $this->common_model->get_records('tbl_category', "status = '0' order by name desc");
//         $this->global['records'] = $this->common_model->get_records('mydetails', "status = '0' order by date_time desc");
//         $this->loadViews("list_sub_category_page", $this->global, NULL , NULL);
//     }
//     public function  tags()
//     {
//      $this->global['pageTitle'] = 'tags' . ' - ' . $this->config->item('app_name');
//      $this->global['records'] = $this->common_model->get_records('tbl_tags', "status = '0' order by date_time desc");
//         $this->loadViews("tags", $this->global, NULL , NULL);
//     }
//     public function  feature()
//     {
//      $this->global['pageTitle'] = 'feature' . ' - ' . $this->config->item('app_name');
//      $this->global['records'] = $this->common_model->get_records('tbl_features', "status = '0' order by date_time desc");
//         $this->loadViews("features", $this->global, NULL , NULL);
//     }
//     public function location()
//     {
//         $this->global['pageTitle'] = 'Location' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_locations', "status = '0' order by location_name desc");
//         $this->loadViews("location", $this->global, NULL , NULL);
//     }
//     public function Freeevaluation()
//     {
//         $this->global['pageTitle'] = 'Freeevaluation' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_free_evaluation_section', "status = '0' or status = '1' order by title desc");
//         $this->loadViews("Free_evaluation", $this->global, NULL , NULL);
//     }
//      public function what_are_you_looking_for()
//     {
//         $this->global['pageTitle'] = 'whatareyoulookingfor' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_what_are_you_looking_for', "status = '0' or status = '1' order by title desc");
//         $this->loadViews("whatareyoulookingfor", $this->global, NULL , NULL);
//     }
//      public function Property_section()
//     {
//         $this->global['pageTitle'] = 'Propertysection' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_what_are_you_looking_for_section_add', "status = '0'  order by title desc");
//         $this->loadViews("Propertysection", $this->global, NULL , NULL);
//     }
//     public function Realestate()
//     {
//         $this->global['pageTitle'] = 'Realestate' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_search_smarter_from_anywhere', "status = '0' order by title desc");
//         $this->loadViews("Real_estate", $this->global, NULL , NULL);
//     }
//     public function Testimonialtitle()
//     {
//         $this->global['pageTitle'] = 'Testimonialtitle' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_testimonials', "status = '0' order by title desc");
//         $this->loadViews("Testimonial_title", $this->global, NULL , NULL);
//     }
//     public function Slidersection()
//     {
//         $this->global['pageTitle'] = 'Slidersection' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_testimonials_add', "status = '0' order by date_time desc");
//         $this->loadViews("Slider_section", $this->global, NULL , NULL);
//     }
//     public function builder()
//     {
//         $this->global['pageTitle'] = 'Builder' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_builder', "status = '0' order by date_time desc");
//         $this->loadViews("builder", $this->global, NULL , NULL);
//     }
//     public  function  enquiry_list()
//     {
//         $this->global['pageTitle'] = 'Enquiry_list' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_enquiry', "status = '0' order by date_time desc");
//         $this->loadViews("enquiry_list", $this->global, NULL , NULL);
//     }
//     public function  buildupAr()
//     {
//         $this->global['pageTitle'] = ' build up Area' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_built_up_area', "status = '0' order by date_time desc");
//         $this->loadViews("buildupAr", $this->global, NULL , NULL);
//     }
//     public function  city()
//     {
//         $this->global['pageTitle'] = 'City' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_city', "status = '0' order by date_time desc");
//         $this->loadViews("city", $this->global, NULL , NULL);
//     }
//     public function amenities()
//     {
//         $this->global['pageTitle'] = 'Amenities' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_amenities', "status = '0' order by date_time desc");
//         $this->loadViews("amenities", $this->global, NULL , NULL);
//     }
//     public function yearbuilt()
//     {
//         $this->global['pageTitle'] = ' Year built' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_yearbuilt', "status = '0' order by date_time desc");
//         $this->loadViews("yearbuilt", $this->global, NULL , NULL);
//     }
//     public function bhk()
//     {
//         $this->global['pageTitle'] = 'bhk' . ' - ' . $this->config->item('app_name');
//         $this->global['records'] = $this->common_model->get_records('tbl_bhk', "status = '0' order by date_time desc");
//         $this->loadViews("bhk", $this->global, NULL , NULL);
//     }
//     public function sub_location()
//     {
//         $this->global['pageTitle'] = 'sub location' . ' - ' . $this->config->item('app_name');
//             $this->global['records'] = $this->common_model->get_records('tbl_sub_location', "status = '0' order by date_time desc");
//         $this->loadViews("sublocation", $this->global, NULL , NULL);
//     }
//     public function property_status()
//     {
//         $this->global['pageTitle'] = 'property status' . ' - ' . $this->config->item('app_name');
//             $this->global['records'] = $this->common_model->get_records('tbl_master', "status = '0' order by date_time desc");
//         $this->loadViews("propertystatus", $this->global, NULL , NULL);
//     }
//     public function property_type()
//     {
//         $this->global['pageTitle'] = 'property type' . ' - ' . $this->config->item('app_name');
//             $this->global['records'] = $this->common_model->get_records('tbl_property_type', "status = '0' order by date_time desc");
//         $this->loadViews("propertytype", $this->global, NULL , NULL);
//     }
//     public function transaction_type()
//     {
//         $this->global['pageTitle'] = 'transaction_type' . ' - ' . $this->config->item('app_name');
//             $this->global['records'] = $this->common_model->get_records('tbl_transaction_type', "status = '0' order by date_time desc");
//         $this->loadViews("transactiontype", $this->global, NULL , NULL);
//     }
//     public function possession_status()
//     {
//         $this->global['pageTitle'] = 'possession status' . ' - ' . $this->config->item('app_name');
//             $this->global['records'] = $this->common_model->get_records('tbl_possession_status', "status = '0' order by date_time desc");
//         $this->loadViews("possession_status", $this->global, NULL , NULL);
//     }
//     public function list_child_category_page()
//     {
//         $this->global['pageTitle'] = 'Child Categories' . ' - ' . $this->config->item('app_name');
//         $this->global['categories'] = $this->common_model->get_records('tbl_category', "status = '0' order by name desc");
//         $this->global['sub_categories'] = $this->common_model->get_records('tbl_sub_category', "status = '0' order by name desc");
//         $this->global['records'] = $this->common_model->get_records('tbl_child_category', "status != '9' order by name desc");
//         $this->loadViews("list_child_category_page", $this->global, NULL , NULL);
//     }
//   public function partnertitle()
//     {
//         $this->global['pageTitle'] = 'partner' . ' - ' . $this->config->item('app_name');
//             $this->global['records'] = $this->common_model->get_records('tbl_our_partner_title', "status = '0' ");
//         $this->loadViews("partners", $this->global, NULL , NULL);
//     }


    public function banner() {
        $this->global['pageTitle'] = 'partners' . ' - ' . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_records('tbl_banner', "status = '0' order by date_time desc");

        $this->loadViews("banner", $this->global, NULL, NULL);
    }

//      public function partnersection()
//     {
//         $this->global['pageTitle'] = 'partners' . ' - ' . $this->config->item('app_name');
//             $this->global['records'] = $this->common_model->get_records('tbl_our_partners', "status = '0' order by date_time desc");
//         $this->loadViews("ourpartners", $this->global, NULL , NULL);
//     }
//     public function clientstitle()
//     {
//         $this->global['pageTitle'] = 'clients' . ' - ' . $this->config->item('app_name');
//             $this->global['records'] = $this->common_model->get_records('tbl_our_clientstitle', "status = '0' order by date_time desc");
//         $this->loadViews("clients", $this->global, NULL , NULL);
//     }
      public function clients() {
        $this->global['pageTitle'] = 'clients' . ' - ' . $this->config->item('app_name');
        $this->global['records'] = $this->common_model->get_records('tbl_our_clients', "status = '0' order by date_time desc");
        $this->loadViews("ourclients", $this->global, NULL, NULL);
    }
    
      public function media_coverage() {
        $this->global['pageTitle'] = 'clients' . ' - ' . $this->config->item('app_name');
        $this->global['records'] = $this->common_model->get_records('tbl_media_coverage', "status = '0' order by date_time desc");
        $this->loadViews("media-coverage", $this->global, NULL, NULL);
    }

//     public function category(){
//          $this->global['pageTitle'] = 'category' . ' - ' . $this->config->item('app_name');
//             $this->global['records'] = $this->common_model->get_records('tbl_category', "status = '0' order by date_time desc");
//         $this->loadViews("property-category", $this->global, NULL , NULL);
//     }
//     public function sub_category(){
//          $this->global['pageTitle'] = 'Sub-Category' . ' - ' . $this->config->item('app_name');
//             $this->global['records'] = $this->common_model->get_records('tbl_subcategory', "status = '0' order by date_time desc");
//         $this->loadViews("property-sub-category", $this->global, NULL , NULL);
//     }
//     public function join_venture(){
//         $this->global['pageTitle'] = 'join venture' . ' - ' . $this->config->item('app_name');
//            $this->global['records'] = $this->common_model->get_records('tbl_join_venture', "status = '0' order by date_time desc");
//        $this->loadViews("join_venture", $this->global, NULL , NULL);
//    }
//    public function report()
//    {
//         $this->global['pageTitle'] = 'Report' . ' - ' . $this->config->item('app_name');
//            $this->global['records'] = $this->common_model->get_records('tbl_builder_register', "status = '0' order by date_time desc");
//        $this->loadViews("report", $this->global, NULL , NULL);
//    }
//    public function builder_enquiry_list($id)
//    {
//         $properties=$this->common_model->get_records('tbl_property_details', "status='0' and builders_info_id='$id'");
//         $enquiry=array();
//         foreach($properties as $property)
//         {
//             array_push($enquiry,$property->id);
//         }
//         $enquiry=implode(",",$enquiry);
//         if($enquiry!='')
//         {
//             $this->global['records'] = $this->common_model->get_records('tbl_enquiry', "status = '0' and item_id IN ($enquiry)");
//        }
//        else
//        {
//             $this->global['records'] = array();
//        }
//        $this->loadViews("enquiry_list", $this->global, NULL , NULL);
//    }
//     public function enquiry($id)
//    {
//         //$properties=$this->common_model->get_records('tbl_enquiry', "status='0' and item_id='$id'");
//             $this->global['records'] = $this->common_model->get_records('tbl_enquiry', "status = '0' and item_id='$id'");
//        $this->loadViews("enquiry_list", $this->global, NULL , NULL);
//    }
//   public function user_enquiry($id)
//    {
//         //$properties=$this->common_model->get_records('tbl_enquiry', "status='0' and item_id='$id'");
//             $this->global['records'] = $this->common_model->get_records('tbl_enquiry', "status = '0' and login_id='$id'");
//        $this->loadViews("enquiry_list", $this->global, NULL , NULL);
//    }
//    public function property_list($id)
//    {
//            $this->global['records'] = $this->common_model->get_records('tbl_property_details', "status = '0' and id='$id' and post_status!='OP' order by date_time desc");
//        $this->loadViews("item-product-page", $this->global, NULL , NULL);
//    }
//    public function user_property_list($id,$value)
//    {
//         if($value==1)
//         {
//            $lists = $this->common_model->get_custom_query("select item_id from tbl_user_wishlist where status = '0' and user_id='$id' order by date_time desc");
//            $user=array();
//            foreach($lists as $list){
//                 array_push($user,$list->item_id);
//            }
//        }
//        else if($value==2)
//         {
//            $lists = $this->common_model->get_custom_query("select property_id from tbl_user_reviews where status = '0' and user_id='$id' order by Updated_time desc");
//            $user=array();
//            foreach($lists as $list){
//                 array_push($user,$list->property_id);
//            }
//        }
//        else if($value==3)
//         {
//            $lists = $this->common_model->get_custom_query("select item_id from tbl_recently_viewed where status = '0' and login_id='$id' order by date_time desc");
//            $user=array();
//            foreach($lists as $list){
//                 array_push($user,$list->item_id);
//            }
//        }
//            $listuser=implode(",",$user);
//             if(sizeof($listuser)>0 && $listuser[0]!='' && $listuser[0]!=','){
//            $this->global['records'] = $this->common_model->get_custom_query("select * from tbl_property_details where status = '0' and id IN ($listuser) and post_status='A' order by date_time desc");
//        }
//        else{
//          $this->global['records'] = array();
//        }
//       // print_r($this->global['records']);
//        $this->loadViews("item-product-page", $this->global, NULL , NULL);
//    }
//    function admin_joint_ventures(){
//           $this->global['records'] = $this->common_model->get_records('tbl_ventures', "status = '0' order by datetime desc");
//         $this->loadViews("jointventure.php",$this->global,NULL,NULL);  
//     }
//   function admin_evaluation(){
//           $this->global['records'] = $this->common_model->get_records('tbl_evaluation', "status = '0' order by datetime desc");
//         $this->loadViews("evaluation.php",$this->global,NULL,NULL);  
//     }
//     function admin_residential(){
//           $this->global['records'] = $this->common_model->get_records('tbl_residential', "status = '0' order by datetime desc");
//         $this->loadViews("residential.php",$this->global,NULL,NULL);  
//     }
}

?>