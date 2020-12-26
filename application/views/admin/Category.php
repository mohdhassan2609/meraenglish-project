<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Category extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/common_model');
        $this->isLoggedIn();   
    }
    
    public function index()
    {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    public function list_category_page()
    {
        $this->global['pageTitle'] = 'Categories' . ' - ' . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_category', "status != '9' order by name asc");
        
        $this->loadViews("list_category_page", $this->global, NULL , NULL);
    }
    


    public function list_sub_category_page()
    {
        $this->global['pageTitle'] = 'Sub Categories' . ' - ' . $this->config->item('app_name');
        
		$this->global['categories'] = $this->common_model->get_records('tbl_category', "status = '0' order by name asc");
		
		$this->global['records'] = $this->common_model->get_records('mydetails', "status = '0' order by name asc");
        
        $this->loadViews("list_sub_category_page", $this->global, NULL , NULL);
    }



    public function location()
    {
        $this->global['pageTitle'] = 'Location' . ' - ' . $this->config->item('app_name');
        
	
		$this->global['records'] = $this->common_model->get_records('tbl_locations', "status = '0' order by location_name asc");
        
        $this->loadViews("location", $this->global, NULL , NULL);
    }
    public function Freeevaluation()
    {
        $this->global['pageTitle'] = 'Freeevaluation' . ' - ' . $this->config->item('app_name');
        
    
        $this->global['records'] = $this->common_model->get_records('tbl_free_evaluation_section', "status = '0' order by title asc");
        
        $this->loadViews("Free_evaluation", $this->global, NULL , NULL);
    }
     public function what_are_you_looking_for()
    {
        $this->global['pageTitle'] = 'whatareyoulookingfor' . ' - ' . $this->config->item('app_name');
        
    
        $this->global['records'] = $this->common_model->get_records('tbl_what_are_you_looking_for', "status = '0' order by title asc");
        
        $this->loadViews("whatareyoulookingfor", $this->global, NULL , NULL);
    }
     public function Property_section()
    {
        $this->global['pageTitle'] = 'Propertysection' . ' - ' . $this->config->item('app_name');
        
    
        $this->global['records'] = $this->common_model->get_records('tbl_what_are_you_looking_for_section_add', "status = '0' order by title asc");
        
        $this->loadViews("Propertysection", $this->global, NULL , NULL);
    }
    public function Realestate()
    {
        $this->global['pageTitle'] = 'Realestate' . ' - ' . $this->config->item('app_name');
        
    
        $this->global['records'] = $this->common_model->get_records('tbl_search_smarter_from_anywhere', "status = '0' order by title asc");
        
        $this->loadViews("Real_estate", $this->global, NULL , NULL);
    }

    public function Testimonialtitle()
    {
        $this->global['pageTitle'] = 'Testimonialtitle' . ' - ' . $this->config->item('app_name');
        
    
        $this->global['records'] = $this->common_model->get_records('tbl_testimonials', "status = '0' order by title asc");
        
        $this->loadViews("Testimonial_title", $this->global, NULL , NULL);
    }
    public function Slidersection()
    {
        $this->global['pageTitle'] = 'Slidersection' . ' - ' . $this->config->item('app_name');
        
    
        $this->global['records'] = $this->common_model->get_records('tbl_testimonials_add', "status = '0' order by name asc");
        
        $this->loadViews("Slider_section", $this->global, NULL , NULL);
    }
     
    public function builder()
    {
        $this->global['pageTitle'] = 'Builder' . ' - ' . $this->config->item('app_name');
        
		
		$this->global['records'] = $this->common_model->get_records('tbl_builder', "status = '0' order by builder_name asc");
        
        $this->loadViews("builder", $this->global, NULL , NULL);
    }

   

    public function  buildupAr()
    {
        $this->global['pageTitle'] = ' build up Area' . ' - ' . $this->config->item('app_name');
       	
		$this->global['records'] = $this->common_model->get_records('tbl_built_up_area', "status = '0' order by built_up_area asc");
        
        $this->loadViews("buildupAr", $this->global, NULL , NULL);
    }
    public function  city()
    {
        $this->global['pageTitle'] = 'City' . ' - ' . $this->config->item('app_name');
        
		$this->global['records'] = $this->common_model->get_records('tbl_city', "status = '0' order by city_name asc");
        
        $this->loadViews("city", $this->global, NULL , NULL);
    }
    public function amenities()
    {
        $this->global['pageTitle'] = 'Amenities' . ' - ' . $this->config->item('app_name');
        
		
		$this->global['records'] = $this->common_model->get_records('tbl_amenities', "status = '0' order by name asc");
        
        $this->loadViews("amenities", $this->global, NULL , NULL);
    }
    public function yearbuilt()
    {
        $this->global['pageTitle'] = ' Year built' . ' - ' . $this->config->item('app_name');
        
		
		$this->global['records'] = $this->common_model->get_records('tbl_yearbuilt', "status = '0' order by yearbuilt asc");
        
        $this->loadViews("yearbuilt", $this->global, NULL , NULL);
    }
    public function bhk()
    {
        $this->global['pageTitle'] = 'bhk' . ' - ' . $this->config->item('app_name');
		
		$this->global['records'] = $this->common_model->get_records('tbl_bhk', "status = '0' order by bhk_no asc");
        
        $this->loadViews("bhk", $this->global, NULL , NULL);
    }
    public function sub_location()
    {
        $this->global['pageTitle'] = 'sub location' . ' - ' . $this->config->item('app_name');
        
			$this->global['records'] = $this->common_model->get_records('tbl_sub_location', "status = '0' order by sub_location_name asc");
        
        $this->loadViews("sublocation", $this->global, NULL , NULL);
    }

    


    public function property_status()
    {
        $this->global['pageTitle'] = 'property status' . ' - ' . $this->config->item('app_name');
        
			$this->global['records'] = $this->common_model->get_records('tbl_property_status', "status = '0' order by property_name asc");
        
        $this->loadViews("propertystatus", $this->global, NULL , NULL);
    }

    public function property_type()
    {
        $this->global['pageTitle'] = 'property type' . ' - ' . $this->config->item('app_name');
        
			$this->global['records'] = $this->common_model->get_records('tbl_property_type', "status = '0' order by property_type_name asc");
        
        $this->loadViews("propertytype", $this->global, NULL , NULL);
    }
    public function transaction_type()
    {
        $this->global['pageTitle'] = 'transaction_type' . ' - ' . $this->config->item('app_name');
        
			$this->global['records'] = $this->common_model->get_records('tbl_transaction_type', "status = '0' order by transaction_type asc");
        
        $this->loadViews("transactiontype", $this->global, NULL , NULL);
    }
    public function possession_status()
    {
        $this->global['pageTitle'] = 'possession status' . ' - ' . $this->config->item('app_name');
        
			$this->global['records'] = $this->common_model->get_records('tbl_possession_status', "status = '0' order by possession_name asc");
        
        $this->loadViews("possession_status", $this->global, NULL , NULL);
    }

    
    
    public function list_child_category_page()
    {
        $this->global['pageTitle'] = 'Child Categories' . ' - ' . $this->config->item('app_name');
        
		$this->global['categories'] = $this->common_model->get_records('tbl_category', "status = '0' order by name asc");
		
		$this->global['sub_categories'] = $this->common_model->get_records('tbl_sub_category', "status = '0' order by name asc");
		
		$this->global['records'] = $this->common_model->get_records('tbl_child_category', "status != '9' order by name asc");
        
        $this->loadViews("list_child_category_page", $this->global, NULL , NULL);
    }
    
}

?>