<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Frontend extends BaseController {

    public function __construct() {
        parent::__construct();

        $this->load->model('frontend_model');
        $this->load->model('email_model');

        $this->global['pageTitle'] = "Property Today";

        $this->global['header_bottom'] = 1;

        $this->global['scripts'] = '';

        $this->global['tis'] = $this;

        $this->global['top_menu_logo'] = $this->frontend_model->get_records('tbl_general_settings', "option_name = 'top-header-logo'")[0];
        $this->global['top_menu_all_categories'] = $this->frontend_model->get_records('tbl_category', "status = '0' order by date_time desc");

        $this->global['bottom_footer_col1'] = $this->frontend_model->get_records('tbl_bottom_footer', "column_name = 'column1'")[0];
        $this->global['bottom_footer_col2'] = $this->frontend_model->get_records('tbl_bottom_footer', "column_name = 'column2'")[0];
        $this->global['bottom_footer_col3'] = $this->frontend_model->get_records('tbl_bottom_footer', "column_name = 'column3'")[0];

        $this->global['recent_courses'] = $this->frontend_model->get_records('tbl_courses', "status = '0' and post_status = '1' order by date_time desc");
        $this->global['entroll_content'] = $this->frontend_model->get_records('tbl_entroll_section', "status=0")[0];
        if (isset($_SESSION['login_id'])) {
            $this->global['user_details'] = $this->frontend_model->get_records('tbl_general_users', "id = '" . $_SESSION['login_id'] . "'")[0];
        }
        $_SESSION['header'] = 0;
        $_SESSION['count'] = 0;
        $this->load->library("pagination");
    }

    public function index() {
        $this->global['pageTitle'] = "Proptoday";

        $this->global['page_sections'] = $this->frontend_model->get_records('tbl_page_sections', "status = '0' and page_id = '1' order by section_order + 0 asc");
        $_SESSION['sort'] = "order by property_name";
        $this->loadPage("index", $this->global);
    }

    public function post_requirements() {
        $this->global['pageTitle'] = "Post Requirements";

        // $this->global['page_sections'] = $this->frontend_model->get_records('tbl_page_sections', "status = '0' and page_id = '1' order by section_order + 0 asc");
        // $_SESSION['sort']="order by property_name";
        $this->loadPage("post_requirements", $this->global);
    }

    public function how_it_works() {
        $this->global['pageTitle'] = "How It Works - Mimaa's Marketplace in India";

        $this->loadPage("how_it_works", $this->global);
    }

    public function stores() {
        $this->global['pageTitle'] = "Stores - Mimaa's Marketplace in India";

        $this->global['stores'] = $this->frontend_model->get_records('tbl_stores', "status = '0' and is_verified = '1' and active_status = '1' order by rand()");

        $this->loadPage("stores", $this->global);
    }

    public function store_detail($store_id) {
        $store_detail = $this->frontend_model->get_records('tbl_stores', "status = '0' and is_verified = '1' and active_status = '1' and store_id='$store_id'");
        if (sizeof($store_detail) > 0) {
            $this->global['store'] = $store_detail[0];
            $this->global['products'] = $this->frontend_model->get_records('tbl_product', "status = '0' and product_status = 'approved' and store_id='$store_id'");

            $this->global['pageTitle'] = $this->global['store']->name . " - Mimaa's Marketplace in India";

            $this->loadPage("store-detail", $this->global);
        } else {
            redirect('page-not-found');
        }
    }

    public function store_info($store_id) {
        $this->global['store'] = $this->frontend_model->get_records('tbl_stores', "status = '0' and is_verified = '1' and active_status = '1' and store_id='$store_id'")[0];


        $this->loadPage("store-info", $this->global);
    }

    public function pricing() {

        $this->loadPage("pricing", $this->global);
    }

    public function contact() {

        $this->loadPage("contact", $this->global);
    }

    public function clients() {
        $this->global['records'] = $this->frontend_model->get_records("tbl_our_clients", "status='0'"); 
        $this->loadPage("clients", $this->global);
    }
    public function corporates() {
        $this->global['records'] = $this->frontend_model->get_records("tbl_our_corporates", "status='0'"); 
        $this->loadPage("corporates", $this->global);
    }

    public function contact_form_post() {
        $data['result'] = 0;
        $info['name'] = $this->input->post("name");
        $info['email'] = $this->input->post("email");
        $info['phone_number'] = $this->input->post("phone_number");
        $info['subject'] = $this->input->post("subject");
        $info['message'] = $this->input->post("message");

        if ($insert_id = $this->frontend_model->insert("tbl_contact_form", $info)) {
            $this->email_model->contact_us($insert_id);
            $this->email_model->send_sms($info['phone_number'], "Thanks for contacting us. Our representative will get in touch with you shortly!");
            $data['result'] = 1;
        }
        echo json_encode($data);
    }

    public function contact_admin() {
        $data['result'] = 0;
        $info['name'] = $this->input->post("name");
        $info['email'] = $this->input->post("email");
        $info['subject'] = $this->input->post("subject");
        $info['message'] = $this->input->post("message");

        if ($insert_id = $this->frontend_model->insert("tbl_contact_form", $info)) {
            $data['result'] = 1;
        }
        echo json_encode($data);
    }

    public function grievance_form() {
        $data['result'] = 0;
        $info['name'] = $this->input->post("name");
        $info['email'] = $this->input->post("email");
        $info['subject'] = $this->input->post("subject");
        $info['message'] = $this->input->post("message");

        if ($insert_id = $this->frontend_model->insert("tbl_grievance_form", $info)) {
            $data['result'] = 1;
        }
        echo json_encode($data);
    }

    public function seller_payment_settings_post() {
        $data['result'] = 0;
        $store_id = $_SESSION['seller_store_id'];
        $info['store_id'] = $_SESSION['seller_store_id'];
        $info['account_number'] = $this->input->post('seller-bank-number');
        $info['holder_name'] = $this->input->post('seller-bank-account-name');
        $info['ifsc'] = $this->input->post('seller-bank-ifsc');
        $info['is_approved'] = 0;

        if (sizeof($this->frontend_model->get_records("tbl_store_payout_account", "status = '0' and store_id = '$store_id'")) > 0) {
            $iid = $this->frontend_model->get_record("tbl_store_payout_account", "status = '0' and store_id = '$store_id'", "id");
            if ($this->frontend_model->update('tbl_store_payout_account', $info, "id = '$iid'")) {
                $data['result'] = 1;
            }
        } else {
            if ($this->frontend_model->insert('tbl_store_payout_account', $info)) {
                $data['result'] = 1;
            }
        }
        echo json_encode($data);
    }

    public function seller_tax_settings_post() {
        $data['result'] = 0;
        $store_id = $_SESSION['seller_store_id'];
        $info['store_id'] = $_SESSION['seller_store_id'];
        $info['pan'] = $this->input->post('seller-pan');
        $info['pan_name'] = $this->input->post('seller-pan-name');
        $info['business_address'] = $this->input->post('seller-business-address');
        $info['pincode'] = $this->input->post('seller-pincode');
        $info['gstin'] = $this->input->post('seller-gstin');
        $info['is_approved'] = 0;

        if (sizeof($this->frontend_model->get_records("tbl_store_tax", "status = '0' and store_id = '$store_id'")) > 0) {
            $iid = $this->frontend_model->get_record("tbl_store_tax", "status = '0' and store_id = '$store_id'", "id");
            if ($this->frontend_model->update('tbl_store_tax', $info, "id = '$iid'")) {
                $info2['gst'] = $this->input->post('seller-gstin');
                $this->frontend_model->update('tbl_stores', $info2, "store_id = '$store_id'");
                $data['result'] = 1;
            }
        } else {
            if ($this->frontend_model->insert('tbl_store_tax', $info)) {
                $data['result'] = 1;
            }
        }
        echo json_encode($data);
    }

    public function update_store_profile_form_post() {
        $data['result'] = 0;
        $store_id = $this->input->post('store_id');
        $info['name'] = $this->input->post('name');
        $info['short_description'] = $this->input->post('short_description');
        $info['description'] = $this->input->post('description');
        $info['address'] = $this->input->post('address');
        $info['pincode'] = $this->input->post('pincode');
        if ($_FILES['store_logo']['name'] != '') {
            $store_profile_image = "mimaas-store-" . $store_id . "-profile" . "." . strtolower(pathinfo($_FILES['store_logo']["name"], PATHINFO_EXTENSION));
            if ($this->image_upload('store_logo', $store_profile_image, 'uploads/common/') == true) {
                $info['store_logo'] = $store_profile_image;
            }
        }

        if ($_FILES['banner']['name'] != '') {
            $store_profile_image = "mimaas-store-" . $store_id . "-banner" . "." . strtolower(pathinfo($_FILES['banner']["name"], PATHINFO_EXTENSION));
            if ($this->image_upload('banner', $store_profile_image, 'uploads/common/') == true) {
                $info['banner'] = $store_profile_image;
            }
        }

        if ($this->frontend_model->update('tbl_stores', $info, "store_id='$store_id'")) {
            $data['result'] = 1;
        }
        echo json_encode($data);
    }

    public function become_a_seller() {
        $this->global['pageTitle'] = "Become a Seller - Mimaa's Marketplace in India";

        $this->loadPage("become-a-seller", $this->global);
    }

    public function login() {
        redirect('/');
    }

    public function register_seller() {
        if (!isset($_SESSION['seller_login_id'])) {
            $this->global['pageTitle'] = "Seller Registration - Mimaa's Marketplace in India";

            $this->global['msg'] = "";
            if ($this->session->flashdata('msg')) {
                $this->global['msg'] = $this->session->flashdata('msg');
            }

            $this->loadPage("register-seller", $this->global);
        } else {
            if ($this->frontend_model->get_record("tbl_stores", "created_by='$_SESSION[seller_login_id]' and status = '0' order by id asc", "name") != "" && $this->frontend_model->get_record("tbl_stores", "created_by='$_SESSION[seller_login_id]' and status = '0' order by id asc", "plan_id") != "1") {
                redirect('my-seller-account');
            } else {
                $this->global['pageTitle'] = "Seller Registration - Mimaa's Marketplace in India";

                $this->global['msg'] = "";
                if ($this->session->flashdata('msg')) {
                    $this->global['msg'] = $this->session->flashdata('msg');
                }

                $this->global['packages_payment_script'] = true;

                $this->loadPage("register-seller", $this->global);
            }
        }
    }

    public function seller_login() {
        if ($this->is_seller_login()) {
            redirect("seller");
        } else {
            $this->global['pageTitle'] = "Seller Login - Mimaa's Marketplace in India";

            $this->global['msg'] = "";
            if ($this->session->flashdata('msg')) {
                $this->global['msg'] = $this->session->flashdata('msg');
            }

            $this->loadPage("seller-login", $this->global);
        }
    }

    public function sell_product() {
        if ($this->is_seller_login()) {
            $this->global['pageTitle'] = "Sell Product - Mimaa's Marketplace in India";

            $this->global['msg'] = "";
            if ($this->session->flashdata('msg')) {
                $this->global['msg'] = $this->session->flashdata('msg');
            }

            $this->loadPage("sell-product", $this->global);
        } else {
            redirect("seller");
        }
    }

    public function seller_payment_settings() {
        if ($this->is_seller_login()) {
            $this->global['pageTitle'] = "Seller Payment Settings - Mimaa's Marketplace in India";

            $this->global['store_info'] = $this->frontend_model->get_records('tbl_stores', "status = '0' and store_id = '$_SESSION[seller_store_id]'")[0];

            $this->loadPage("seller-payment-settings", $this->global);
        } else {
            redirect("seller");
        }
    }

    public function seller_payments() {
        if ($this->is_seller_login()) {
            $this->global['pageTitle'] = "Seller Payments - Mimaa's Marketplace in India";

            $this->global['msg'] = "";
            if ($this->session->flashdata('msg')) {
                $this->global['msg'] = $this->session->flashdata('msg');
            }

            $this->global['seller_payments'] = $this->frontend_model->get_records("tbl_orders", "status = '0' and is_paid = '1'");

            $this->loadPage("seller-payments", $this->global);
        } else {
            redirect("seller");
        }
    }

    public function seller_products() {
        if ($this->is_seller_login()) {
            $this->global['pageTitle'] = "Seller Products - Mimaa's Marketplace in India";

            $this->global['msg'] = "";
            if ($this->session->flashdata('msg')) {
                $this->global['msg'] = $this->session->flashdata('msg');
            }

            $this->global['seller_products'] = $this->frontend_model->get_records('tbl_product', "store_id = '$_SESSION[seller_store_id]' and status = '0'");

            $this->loadPage("seller-products", $this->global);
        } else {
            redirect("seller");
        }
    }

    public function seller_edit_product($product_slug) {
        if ($this->is_seller_login()) {
            $this->global['product'] = $this->frontend_model->get_records('tbl_product', "store_id = '$_SESSION[seller_store_id]' and status = '0' and slug = '$product_slug'");

            if (sizeof($this->global['product']) > 0) {
                $this->global['product'] = $this->global['product'][0];
                $this->global['pageTitle'] = $this->global['product']->name . " - Mimaa's Marketplace in India";

                $this->loadPage("seller-edit-product", $this->global);
            } else {
                redirect("404");
            }
        } else {
            redirect("seller");
        }
    }

    public function seller_enquiries() {
        if ($this->is_seller_login()) {
            $this->global['pageTitle'] = "Seller Enquiries - Mimaa's Marketplace in India";

            $this->global['msg'] = "";
            if ($this->session->flashdata('msg')) {
                $this->global['msg'] = $this->session->flashdata('msg');
            }

            $this->global['seller_enquiries'] = $this->frontend_model->get_custom_query("select a.* from tbl_product_enquiry as a, tbl_product as b where a.status = '0' and a.product_id = b.id and b.store_id = '$_SESSION[seller_store_id]' order by id desc");

            $this->loadPage("seller-enquiries", $this->global);
        } else {
            redirect("seller");
        }
    }

    public function get_sub_categories() {
        if (isset($_POST['main-category'])) {
            $main_category = base64_decode($_POST['main-category']);
            $subs = $this->frontend_model->get_records("tbl_sub_category", "category_id = '$main_category' and status = '0' order by name asc");
            $i = 0;
            foreach ($subs as $sub) {
                $data['subs'][$i] = $sub;
                $data['subs'][$i]->value = base64_encode($sub->id);
                $data['subs'][$i]->name = ucfirst($sub->name);
                $i++;
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function get_child_categories() {
        if (isset($_POST['sub-category'])) {
            $sub_category = base64_decode($_POST['sub-category']);
            $childs = $this->frontend_model->get_records("tbl_child_category", "sub_category_id = '$sub_category' and status = '0' order by name asc");
            $i = 0;
            foreach ($childs as $child) {
                $data['child'][$i] = $child;
                $data['child'][$i]->value = base64_encode($child->id);
                $data['child'][$i]->name = ucfirst($child->name);
                $i++;
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function logout() {
        session_destroy();
        redirect(base_url());
    }

    public function forget_password() {
        $this->loadPage("forget-password", $this->global);
    }

    public function form_forget_password_post() {
        $data['result'] = 0;
        $email_address = $this->input->post('email');
        print_r($email_address);
        $subject = "Reset Your Password";
        $otp = rand(111111, 999999);
        $records = $this->frontend_model->get_records('bl_general_users', "email = '" . $email_address . "'")[0];
        if (sizeof($records) > 0) {
            $info['otp'] = $otp;
            $this->frontend_model->update("tbl_general_users", $info, "id='" . $records->id . "'");
            //$_SESSION['forget_password_email'] = $email;
            //$this->email_model->send_mail($email, $subject, $otp . " is your OTP to reset your password for Meraenglish.in account.");
            $data['result'] = 1;
        } else {
            $data['result'] = 2;
        }
        echo json_encode($data);
    }

    public function form_forget_password_otp() {
        $data['result'] = 0;
        if (!empty($this->input->post('otp'))) {
            if (isset($_SESSION['forget_password_phone_number'])) {
                $otp = $this->input->post('otp');
                $records = $this->frontend_model->get_records('tbl_general_users', "otp = '" . $otp . "' and phone_number = '" . $_SESSION['forget_password_phone_number'] . "'");
                if (sizeof($records) > 0) {
                    $_SESSION['forget_password_otp_verified'] = true;
                    $data['result'] = 1;
                } else {
                    $data['result'] = 2;
                }
            }
        }
        echo json_encode($data);
    }

    public function form_set_forget_password() {
        $data['result'] = 0;
        if (!empty($this->input->post('password'))) {
            if (isset($_SESSION['forget_password_phone_number']) && $_SESSION['forget_password_otp_verified'] == true) {
                $phone_number = $_SESSION['forget_password_phone_number'];
                $password = $this->input->post('password');
                $confirm_password = $this->input->post('confirm_password');
                if ($password == $confirm_password) {
                    $info['otp'] = "";
                    $info['is_verified'] = "1";
                    $info['password'] = md5($password);
                    $this->frontend_model->update("tbl_general_users", $info, "phone_number='" . $phone_number . "'");
                    unset($_SESSION['forget_password_phone_number']);
                    unset($_SESSION['forget_password_otp_verified']);
                    $data['result'] = 1;
                } else {
                    $data['result'] = 2;
                }
            }
        }
        echo json_encode($data);
    }

    function subscribe() {


        $info['email'] = $this->input->post('email');
        $email = $info['email'];

        $result = $this->frontend_model->get_custom_query("SELECT id FROM tbl_newsletter WHERE email= '$email'");






        if (!$result) {



            $insert = $this->frontend_model->insert("tbl_newsletter", $info);
            if ($insert) {
                $data['result'] = 1;
            } else {
                $data['result'] = 0;
            }
        } else {
            $data['result'] = 2;
        }
        echo json_encode($data);
    }

    public function loginPost() {
        if (!empty($this->input->post('contact'))) {
            $contact = $this->input->post('contact');
            $password = md5($this->input->post('password'));
            $records = $this->frontend_model->get_records('tbl_general_users', "(email = '" . $contact . "' or phone_number = '" . $contact . "') and password = '" . $password . "' and is_verified = '1'");
            if (sizeof($records) > 0) {
                if ($records[0]->status == 0) {
                    $records1 = $this->frontend_model->get_records('tbl_sellers', "user_id = '" . $records[0]->id . "' and status = '0'");
                    if (sizeof($records1) > 0) {
                        $_SESSION['is_seller_login'] = true;
                        $_SESSION['seller_login_id'] = $records1[0]->id;
                        $_SESSION['seller_store_id'] = $records1[0]->store_id;
                        $_SESSION['primary_seller_login'] = true;
                        $_SESSION['isloggedin'] = true;
                        $_SESSION['loginid'] = $records[0]->id;
                        $_SESSION['username'] = $records[0]->first_name . " " . $records[0]->last_name;
                        $data['result'] = 1;
                        $data['result'] = 1;
                    } else {
                        $_SESSION['isloggedin'] = true;
                        $_SESSION['loginid'] = $records[0]->id;
                        $_SESSION['username'] = $records[0]->first_name . " " . $records[0]->last_name;
                        $data['result'] = 1;
                    }
                } else {
                    $data['result'] = 2;
                }
            } else {
                $data['result'] = 0;
            }
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function registerPost() {
        $data['result'] = 0;
        $info['first_name'] = $this->input->post('first_name');
        $info['last_name'] = $this->input->post('last_name');
        $info['email'] = $this->input->post('email');
        $info['phone_number'] = $this->input->post('phone');
        $info['username'] = $this->input->post('username');
        $info['password'] = md5($this->input->post('password'));
        $info['user_type'] = $this->input->post('userType');
        $info['is_verified'] = "1";
        //$info['otp'] = rand(111111, 999999);;
        if (sizeof($this->frontend_model->get_records('tbl_general_users', "email = '" . $this->input->post('email') . "'")) > 0) {
            $data['result'] = 2;
        } else if (sizeof($this->frontend_model->get_records('tbl_general_users', "phone_number = '" . $this->input->post('phone') . "'")) > 0) {
            $data['result'] = 3;
        } else {
            if ($insert_id = $this->frontend_model->insert('tbl_general_users', $info)) {
                // $this->email_model->send_sms($info['phone_number'], $info['otp'] . " is your OTP to verify your mimaas.in account.");
                // $_SESSION['register_post_phone_number'] = $info['phone_number'];
                $_SESSION['isloggedin'] = true;
                $_SESSION['loginid'] = $insert_id;
                $_SESSION['username'] = $this->input->post('first_name') . " " . $this->input->post('last_name');
                $data['result'] = 1;
            }
        }
        echo json_encode($data);
    }

    public function registerPostOTP() {
        $data['result'] = 0;
        if (!empty($this->input->post('otp'))) {
            if (isset($_SESSION['register_post_phone_number'])) {
                $otp = $this->input->post('otp');
                $record = $this->frontend_model->get_records('tbl_general_users', "phone_number = '" . $_SESSION['register_post_phone_number'] . "' and otp = '$otp'");
                if (sizeof($record) > 0) {
                    $info1['is_verified'] = "1";
                    $info1['otp'] = "";
                    $this->frontend_model->update("tbl_general_users", $info1, "phone_number='" . $_SESSION['register_post_phone_number'] . "'");
                    $_SESSION['is_login'] = true;
                    $_SESSION['login_id'] = $record[0]->id;
                    $_SESSION['username'] = $records[0]->first_name . " " . $records[0]->last_name;
                    unset($_SESSION['register_post_phone_number']);
                    $data['result'] = 1;
                } else {
                    $data['result'] = 2;
                }
            }
        }
        echo json_encode($data);
    }

    public function sellerregistrationPost() {
        if (!isset($_SESSION['seller_login_id'])) {
            if (!empty($this->input->post('phone_number'))) {
                if ($this->input->post('password') == $this->input->post('confirm_password')) {
                    $info2['seller_id'] = date('Ymd') . time();
                    $info['first_name'] = $this->input->post('first_name');
                    $info['last_name'] = $this->input->post('last_name');
                    $info['phone_number'] = $this->input->post('phone_number');
                    $info['email'] = $this->input->post('email');
                    $info['password'] = md5($this->input->post('password'));
                    $store_id = time();
                    $info2['store_id'] = $store_id;
                    $info['otp'] = rand(100000, 999999);
                    $info1['is_basic'] = 0;
                    if (sizeof($this->frontend_model->get_records('tbl_general_users', "phone_number = '" . $this->input->post('phone_number') . "'")) > 0) {
                        $data['result'] = 2;
                    } else {
                        if ($insert_id = $this->frontend_model->insert('tbl_general_users', $info)) {
                            $info2['user_id'] = $insert_id;
                            $info1['store_id'] = $store_id;

                            $insert_id1 = $this->frontend_model->insert('tbl_sellers', $info2);

                            $this->email_model->new_seller_register($info2['seller_id']);

                            $info1['created_by'] = $insert_id1;
                            $info1['primary_users'] = $insert_id1 . ",";
                            $this->frontend_model->insert('tbl_stores', $info1);

                            $data['store_id'] = $store_id;
                            // $_SESSION['is_seller_login'] = true;
                            // $_SESSION['seller_login_id'] = $insert_id1;
                            // $_SESSION['seller_store_id'] = $store_id;
                            // $_SESSION['primary_seller_login'] = true;
                            // $_SESSION['is_login'] = true;
                            $_SESSION['login_id'] = $insert_id;
                            $data['result'] = 1;

                            $this->email_model->send_sms($info['phone_number'], "Your OTP is " . $info['otp'] . ". Mimaas.in");
                        } else {
                            $data['result'] = 0;
                        }
                    }
                } else {
                    $data['result'] = 0;
                }
            } else {
                $data['result'] = 0;
            }
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function sellerregistrationverify() {
        $data['result'] = 0;
        if (!isset($_SESSION['seller_login_id'])) {
            if (!empty($this->input->post('otp'))) {
                $otp = $this->input->post('otp');
                if (sizeof($this->frontend_model->get_records('tbl_general_users', "id = '" . $_SESSION['login_id'] . "' and otp = '$otp'")) > 0) {
                    $info['otp'] = "";
                    $info['is_verified'] = "1";
                    $this->frontend_model->update('tbl_general_users', $info, "id = '" . $_SESSION['login_id'] . "'");
                    $record = $this->frontend_model->get_records('tbl_general_users', "id = '" . $_SESSION['login_id'] . "' and otp = '$otp'")[0];
                    $_SESSION['is_seller_login'] = true;
                    $_SESSION['seller_login_id'] = $this->frontend_model->get_record('tbl_sellers', "user_id = '" . $_SESSION['login_id'] . "'", "id");
                    $_SESSION['seller_store_id'] = $this->frontend_model->get_record('tbl_sellers', "user_id = '" . $_SESSION['login_id'] . "'", "store_id");
                    $_SESSION['primary_seller_login'] = true;
                    $_SESSION['is_login'] = true;
                    $_SESSION['login_id'] = $record->id;
                    $data['store_id'] = $this->frontend_model->get_record('tbl_sellers', "user_id = '" . $_SESSION['login_id'] . "'", "store_id");
                    $data['result'] = 1;
                }
            }
        }
        echo json_encode($data);
    }

    public function sellerNewProductPost() {
        $info['name'] = $this->input->post('product-name');
        $info['meta_title'] = ucfirst($this->input->post('product-name'));
        $info['short_description'] = htmlentities($this->input->post('product-short-description'));
        $info['meta_description'] = htmlentities($this->input->post('product-short-description'));
        $info['description'] = htmlentities($this->input->post('product-description'));
        if ($this->input->post('product-in-stock') == 0) {
            $info['in_stock'] = "-1";
        } else {
            $info['in_stock'] = $this->input->post('product-in-stock');
        }
        $info['shipping_cost'] = $this->input->post('product-shipping-cost');
        $info['moq'] = $this->input->post('product-moq');
        $info['price'] = $this->input->post('product-mrp-price');
        $info['selling_price'] = $this->input->post('product-selling-price');
        $info['offer_price'] = $this->input->post('product-offer-price');
        $info['product_gst'] = $this->input->post('product-gst');
        if ($this->input->post('product-quantity-unit') == "other") {
            $info['quantity_unit'] = $this->input->post('product-specify-unit');
        } else {
            $info['quantity_unit'] = $this->input->post('product-quantity-unit');
        }
        if ($this->input->post('product-brand') == 0) {
            $info['brand_id'] = 0;
        } else {
            $info['brand_id'] = base64_decode($this->input->post('product-brand'));
        }
        $info['category'] = base64_decode($this->input->post('main_category'));
        $info['sub_category'] = base64_decode($this->input->post('sub_category'));
        $info['child_category'] = base64_decode($this->input->post('child_category'));
        $info['tags'] = $this->input->post('product-tags');
        $info['meta_keywords'] = $this->input->post('product-tags');

        $info['slug'] = $this->slugify($this->input->post('product-name'));
        $info['sku_id'] = uniqid();
        $info['store_id'] = $_SESSION['seller_store_id'];
        $info['created_by'] = $_SESSION['seller_login_id'];

        if ($insert_id = $this->frontend_model->insert("tbl_product", $info)) {
            if (array_key_exists('slug', $info)) {
                $info['slug'] = $this->checkSlugExists($info['slug'], "tbl_product", $insert_id);
                $info2['slug'] = $info['slug'];
                $this->frontend_model->update("tbl_product", $info2, "id=" . $insert_id);
                $this->insert_slug($info, "tbl_product", $insert_id);
            }

            $incc = 0;
            while ($incc < sizeof($_FILES['photos']['name'])) {
                if ($incc === 0) {
                    if ($_FILES['photos']['error'][$incc] != 4) {
                        $file_new_name = "mimaas-product-" . date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['photos']["name"][$incc], PATHINFO_EXTENSION));
                        if ($this->product_images_upload('photos', $file_new_name, 'uploads/products/', $incc) == true) {
                            $info1['product_image'] = $file_new_name;
                            if ($this->frontend_model->update('tbl_product', $info1, "id = '$insert_id'")) {
                                $data['result'] = 1;
                            } else {
                                $data['result'] = 0;
                            }
                        }
                    }
                } else {
                    if ($_FILES['photos']['error'][$incc] != 4) {
                        $file_new_name = "mimaas-product-" . date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['photos']["name"][$incc], PATHINFO_EXTENSION));
                        if ($this->product_images_upload('photos', $file_new_name, 'uploads/products/', $incc) == true) {
                            $info3['product_id'] = $insert_id;
                            $info3['file_name'] = $file_new_name;
                            $this->frontend_model->insert('tbl_product_images', $info3);
                        }
                    }
                }
                $incc++;
            }

            $this->email_model->new_product($insert_id);

            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }

        echo json_encode($data);
    }

    public function seller_update_product_form() {
        $product_id = base64_decode($this->input->post('product-id'));
        $info['name'] = $this->input->post('product-name');
        $info['meta_title'] = ucfirst($this->input->post('product-name'));
        $info['short_description'] = htmlentities($this->input->post('product-short-description'));
        $info['meta_description'] = htmlentities($this->input->post('product-short-description'));
        $info['description'] = htmlentities($this->input->post('product-description'));
        if ($this->input->post('product-in-stock') == 0) {
            $info['in_stock'] = "-1";
        } else {
            $info['in_stock'] = $this->input->post('product-in-stock');
        }
        $info['moq'] = $this->input->post('product-moq');
        $info['shipping_cost'] = $this->input->post('product-shipping-cost');
        $info['price'] = $this->input->post('product-mrp-price');
        $info['selling_price'] = $this->input->post('product-selling-price');
        $info['offer_price'] = $this->input->post('product-offer-price');
        if ($this->input->post('product-quantity-unit') == "other") {
            $info['quantity_unit'] = $this->input->post('product-specify-unit');
        } else {
            $info['quantity_unit'] = $this->input->post('product-quantity-unit');
        }
        if ($this->input->post('product-brand') == 0) {
            $info['brand_id'] = 0;
        } else {
            $info['brand_id'] = base64_decode($this->input->post('product-brand'));
        }
        $info['category'] = base64_decode($this->input->post('main_category'));
        $info['sub_category'] = base64_decode($this->input->post('sub_category'));
        $info['child_category'] = base64_decode($this->input->post('child_category'));
        $info['tags'] = $this->input->post('product-tags');
        $info['meta_keywords'] = $this->input->post('product-tags');

        $info['slug'] = $this->slugify($this->input->post('product-name'));

        if ($this->frontend_model->update("tbl_product", $info, "id = '$product_id'")) {
            if (array_key_exists('slug', $info)) {
                $info['slug'] = $this->checkSlugExists($info['slug'], "tbl_product", $product_id);
                $info2['slug'] = $info['slug'];
                $this->frontend_model->update("tbl_product", $info2, "id=" . $product_id);
                $this->frontend_model->update("tbl_slug", $info2, "product_id=" . $product_id);
            }

            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }

        echo json_encode($data);
    }

    public function update_security_settings_form_post() {
        if (isset($_SESSION['login_id'])) {
            if ($this->input->post('new_password') == $this->input->post('confirm_new_password')) {
                $password = md5($this->input->post('password'));
                $info['password'] = md5($this->input->post('new_password'));
                if (sizeof($this->frontend_model->get_records('tbl_general_users', "id = '" . $_SESSION['login_id'] . "' and password='$password'")) > 0) {
                    if ($this->frontend_model->update('tbl_general_users', $info, "id = '" . $_SESSION['login_id'] . "'")) {
                        $data['result'] = 1;
                    } else {
                        $data['result'] = 0;
                    }
                } else {
                    $data['result'] = 2;
                }
            } else {
                $data['result'] = 0;
            }
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function update_profile_form_post() {
        if (isset($_SESSION['login_id'])) {
            $info['first_name'] = $this->input->post('first_name');
            $info['last_name'] = $this->input->post('last_name');

            if ($this->frontend_model->update('tbl_general_users', $info, "id='$_SESSION[login_id]'")) {
                $data['result'] = 1;
            } else {
                $data['result'] = 0;
            }
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function sellerregistrationStoreDetailsPost() {
        if (isset($_SESSION['seller_login_id'])) {
            $store_id = $this->input->post('store_id');

            $info['name'] = $this->input->post('organization_name');
            $info['address'] = $this->input->post('address');
            $info['pincode'] = $this->input->post('pincode');
            $info['gst'] = $this->input->post('gst_number');
            $info['is_basic'] = 1;

            if ($this->frontend_model->update('tbl_stores', $info, "store_id='$store_id' and created_by='" . $_SESSION['seller_login_id'] . "'")) {
                $data['result'] = 1;
            } else {
                $data['result'] = 0;
            }
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function my_seller_account() {
        if ($this->is_seller_login()) {
            $seller_id = $_SESSION['seller_login_id'];
            $this->global['pageTitle'] = "Dashboard - Mimaa's Marketplace in India";

            $this->global['seller_info'] = $this->frontend_model->get_records('tbl_sellers', "status = '0' and id = '$seller_id'")[0];

            $this->global['recent_orders'] = $this->frontend_model->get_custom_query("select a.*, b.name, b.slug from tbl_order_item a, tbl_product b where a.status = '0' and '$_SESSION[seller_store_id]' = b.store_id and b.id = a.product_id group by a.order_id order by a.id desc limit 5");

            $this->loadPage("my-seller-account", $this->global);
        } else {
            redirect("seller");
        }
    }

    public function my_store_profile() {
        if ($this->is_seller_login()) {
            $seller_store_id = $_SESSION['seller_store_id'];
            $this->global['pageTitle'] = "My Seller Profile - Mimaa's Marketplace in India";

            $this->global['store_info'] = $this->frontend_model->get_records('tbl_stores', "status = '0' and store_id = '$seller_store_id'")[0];

            $this->loadPage("my-store-profile", $this->global);
        } else {
            redirect("seller");
        }
    }

    public function my_profile() {
        $this->global['pageTitle'] = "My Profile - Mimaa's Marketplace in India";

        $this->global['page_sections'] = $this->frontend_model->get_records('tbl_page_sections', "status = '0' and page_id = '1' order by section_order + 0 asc");

        $this->loadPage("my-profile", $this->global);
    }

    public function security_settings() {
        $this->global['pageTitle'] = "Security Settings - Mimaa's Marketplace in India";

        $this->global['page_sections'] = $this->frontend_model->get_records('tbl_page_sections', "status = '0' and page_id = '1' order by section_order + 0 asc");

        $this->loadPage("security-settings", $this->global);
    }

    public function my_requests() {
        $this->global['pageTitle'] = "My Enquiries - Mimaa's Marketplace in India";

        $this->global['my_enquiries'] = $this->frontend_model->get_custom_query("select a.*, b.name as product_name, b.slug, b.product_image from tbl_product_enquiry as a, tbl_product as b where a.status = '0' and a.product_id = b.id and a.user_id = '$_SESSION[login_id]' order by id desc");

        $this->loadPage("my-requests", $this->global);
    }

    public function my_orders() {
        if (isset($_SESSION['is_login'])) {
            $user_id = $_SESSION['login_id'];
            $this->global['ongoing_orders'] = $this->frontend_model->get_custom_query("select a.* from tbl_orders a, tbl_order_process b where a.status = '0' and a.user_id = '$user_id' and a.is_paid = '1' and b.order_id = a.order_id and b.process != 'completed' and b.process != 'cancelled' order by id desc");
            $this->global['completed_orders'] = $this->frontend_model->get_custom_query("select a.* from tbl_orders a, tbl_order_process b where a.status = '0' and a.user_id = '$user_id' and a.is_paid = '1' and b.order_id = a.order_id and b.process = 'completed' order by id desc");
            $this->global['cancelled_orders'] = $this->frontend_model->get_custom_query("select a.* from tbl_orders a, tbl_order_process b where a.status = '0' and a.user_id = '$user_id' and a.is_paid = '1' and b.order_id = a.order_id and b.process = 'cancelled' order by id desc");

            $this->global['pageTitle'] = "My Orders - Mimaa's Marketplace in India";

            $this->loadPage("my-orders", $this->global);
        } else {
            redirect(base_url() . "login");
        }
    }

    public function seller_orders() {
        if ($this->is_seller_login()) {
            $seller_id = $_SESSION['is_seller_login'];
            $store_id = $_SESSION['seller_store_id'];
            $this->global['ongoing_orders'] = $this->frontend_model->get_custom_query("select a.* from tbl_orders a, tbl_order_process b where a.status = '0' and a.is_paid = '1' and b.order_id = a.order_id and b.process != 'completed' and b.process != 'cancelled' order by id desc");
            $this->global['completed_orders'] = $this->frontend_model->get_custom_query("select a.* from tbl_orders a, tbl_order_process b where a.status = '0' and a.is_paid = '1' and b.order_id = a.order_id and b.process = 'completed' order by id desc");
            $this->global['cancelled_orders'] = $this->frontend_model->get_custom_query("select a.* from tbl_orders a, tbl_order_process b where a.status = '0' and a.is_paid = '1' and b.order_id = a.order_id and b.process = 'cancelled' order by id desc");

            $this->global['pageTitle'] = "Review Orders - Mimaa's Marketplace in India";

            $this->loadPage("seller-orders", $this->global);
        } else {
            redirect("seller");
        }
    }

    public function update_order_status() {
        if ($this->is_seller_login()) {
            $info = array(
                'process' => $this->input->post('process'),
                'est_delivery_date' => $this->input->post('est_delivery_date'),
                'courier_name' => $this->input->post('courier_name'),
                'courier_id' => $this->input->post('courier_id')
            );
            $order_id = $this->input->post('order-id');

            $this->frontend_model->update("tbl_order_process", $info, "order_id = '$order_id'");

            $incc = 0;
            while ($incc < sizeof($_FILES['photos']['name'])) {
                if ($_FILES['photos']['error'][$incc] != 4) {
                    $file_new_name = "mimaas-package-" . date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['photos']["name"][$incc], PATHINFO_EXTENSION));
                    if ($this->product_images_upload('photos', $file_new_name, 'uploads/common/', $incc) == true) {
                        $info3['order_id'] = $order_id;
                        $info3['file_name'] = $file_new_name;
                        $this->frontend_model->insert('tbl_order_process_images', $info3);
                    }
                }
                $incc++;
            }

            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function order($order_id) {
        if ($this->frontend_model->get_record('tbl_orders', "status = '0' and order_id = '$order_id'", 'id')) {
            if ($this->frontend_model->get_record('tbl_orders', "status = '0' and order_id = '$order_id'", 'user_id') != 0) {
                if ($this->frontend_model->get_record('tbl_orders', "status = '0' and order_id = '$order_id'", 'user_id') == $_SESSION['login_id']) {
                    $this->global['pageTitle'] = "Order - Mimaa's Marketplace in India";

                    $this->global['order'] = $this->frontend_model->get_records('tbl_orders', "status = '0' and order_id = '$order_id'")[0];
                    $this->global['order_items'] = $this->frontend_model->get_records('tbl_order_item', "status = '0' and order_id = '$order_id'");
                    $this->global['order_addresses'] = $this->frontend_model->get_records('tbl_order_address', "status = '0' and order_id = '$order_id'");

                    $this->loadPage("order-detail", $this->global);
                } else {
                    redirect(base_url());
                }
            } else {
                $this->global['pageTitle'] = "Order - Mimaa's Marketplace in India";

                $this->global['order'] = $this->frontend_model->get_records('tbl_orders', "status = '0' and order_id = '$order_id'")[0];
                $this->global['order_items'] = $this->frontend_model->get_records('tbl_order_item', "status = '0' and order_id = '$order_id'");
                $this->global['order_addresses'] = $this->frontend_model->get_records('tbl_order_address', "status = '0' and order_id = '$order_id'");

                $this->loadPage("order-detail", $this->global);
            }
        } else {
            redirect(base_url());
        }
    }

    public function order_success($order_id) {
        if ($this->frontend_model->get_record('tbl_orders', "status = '0' and order_id = '$order_id'", 'id')) {
            if ($this->frontend_model->get_record('tbl_orders', "status = '0' and order_id = '$order_id'", 'user_id') != 0) {
                if ($this->frontend_model->get_record('tbl_orders', "status = '0' and order_id = '$order_id'", 'user_id') == $_SESSION['login_id']) {
                    $this->global['pageTitle'] = "Order Success - Mimaa's Marketplace in India";

                    unset($_SESSION['cart_items']);

                    $this->loadPage("order-success", $this->global);
                } else {
                    redirect(base_url());
                }
            } else {
                $this->global['pageTitle'] = "Order Success - Mimaa's Marketplace in India";

                unset($_SESSION['cart_items']);

                $this->loadPage("order-success", $this->global);
            }
        } else {
            redirect(base_url());
        }
    }

    public function cart() {
        if (!isset($_SESSION['cart_items'])) {
// 			redirect(base_url());
        } else {
            if (sizeof($_SESSION['cart_items']) < 1) {
                // redirect(base_url());
                $this->loadPage("cart", $this->global);
            } else {
                $this->global['pageTitle'] = "Cart - Mera English";

                $this->global['carts'] = $_SESSION['cart_items'];

                $this->loadPage("cart", $this->global);
            }
        }
    }

    public function update_cart_icon() {
        $this->load->view("public/includes/cart");
    }

    public function get_cart_count() {
        $this->load->view("public/includes/cart_count");
    }

    public function add_review() {
        if (isset($_SESSION['username']))
            $user = $_SESSION['username'];
        else
            $user = "Anonymous User";
        $data = array(
            'property_id' => $this->input->post('item_id'),
            'Username' => $user,
            'review_title' => $this->input->post('review_title'),
            'review' => $this->input->post('review'),
            'ratings' => $this->input->post('rating')
        );
        if (isset($_SESSION['loginid']) && $_SESSION['isloggedin'] == TRUE) {
            $data['user_id'] = $_SESSION['loginid'];
        }
        $response['id'] = $this->frontend_model->insert('tbl_user_reviews', $data);
        $response['result'] = 1;
        echo json_encode($response);
    }

    // function search()
    // {
    // 	if(isset($_GET['keyword']))
    // 	{
    // 		$searchtext = $_GET['keyword'];
    // 		$this->global['title_name'] = "Search: " . $searchtext;
    // 		$this->global['slider_images'] = array();
    // 		if(isset($_GET['category']))
    // 		{	
    // 			if($_GET['category'] != '0')
    // 			{
    // 				$cat_id = $_GET['category'];
    // 				$this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where find_in_set('$cat_id', a.category) > 0 and a.name like '%$searchtext%' and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' order by id desc");
    // 			}
    // 			else
    // 			{
    // 				$this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where a.name like '%$searchtext%' and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' order by id desc");
    // 			}
    // 		}
    // 		else
    // 		{
    // 			$this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where a.name like '%$searchtext%' and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' order by id desc");
    // 		}
    // 		$this->global['pageTitle'] = "Search: " . $searchtext;
    // 		$this->loadPage("search-result", $this->global);
    // 	}
    // 	else
    // 	{
    // 		$this->pageNotFound();
    // 	}
    // }



    function shop_tags($searchtext) {
        $searchtext = urldecode($searchtext);
        $this->global['title_name'] = "Tag: " . $searchtext;
        $this->global['slider_images'] = array();

        $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where a.tags like '%$searchtext%' and a.brand_id = '$id' and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' order by id desc");

        $this->global['pageTitle'] = "Tag: " . $searchtext;
        $this->loadPage("shop_tags", $this->global);
    }

    public function control_function($slug, $items) {
        $items = 20;
        $tbl_slug = $this->frontend_model->get_records('tbl_slug', "status = '0' and slug = '$slug'");

        if (sizeof($tbl_slug) > 0) {
            $tbl_slug = $tbl_slug[0];
            if ($tbl_slug->category_id != '0') {
                $this->show_category_page($tbl_slug->category_id, $items);
            } elseif ($tbl_slug->sub_category_id != '0') {
                $this->show_sub_category_page($tbl_slug->sub_category_id, $items);
            } elseif ($tbl_slug->child_category_id != '0') {
                $this->show_child_category_page($tbl_slug->child_category_id, $items);
            } elseif ($tbl_slug->brand_id != '0') {
                $this->show_brand_page($tbl_slug->brand_id, $items);
            } elseif ($tbl_slug->product_id != '0') {
                $this->show_product_page($tbl_slug->product_id, $items);
            } elseif ($tbl_slug->page_id != '0') {
                $this->show_page($tbl_slug->page_id, $items);
            } else {
                $this->pageNotFound();
            }
        } else {
            $this->pageNotFound();
        }
    }

    function favourites() {
        if (isset($_SESSION['login_id'])) {
            $this->global['pageTitle'] = "Favourites";

            $this->loadPage("favourites", $this->global);
        } else {
            $this->pageNotFound();
        }
    }

    function show_brand_page($id, $items) {
        $brands = $this->frontend_model->get_records('tbl_brands', "status = '0' and id = '$id'");
        if (sizeof($brands) == 1) {
            $brand = $brands[0];
            $this->global['brand_det'] = $brand;
            $this->global['title_name'] = $brand->name;
            $this->global['slider_images'] = $this->frontend_model->get_records('tbl_category_images', "status = '0' and brand_id = '$id'");

            $order_by = "order by a.date_time desc, a.highlight asc";
            if (isset($_GET['sort-by'])) {
                if ($_GET['sort-by'] == "low_to_high") {
                    $order_by = "order by a.price asc";
                } elseif ($_GET['sort-by'] == "high_to_low") {
                    $order_by = "order by a.price desc";
                }
            }

            $this->global['total_products'] = sizeof($this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where a.brand_id = '$id' and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' $order_by"));

            if (isset($_GET['page'])) {
                $offset = $_GET['page'] . "0";
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where a.brand_id = '$id' and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' $order_by limit $offset, 20");
            } else {
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where a.brand_id = '$id' and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' $order_by limit 20");
            }

            $explode_val = array();
            foreach ($this->global['products'] as $product) {
                foreach (explode(',', $product->category) as $cat_iid) {
                    array_push($explode_val, $cat_iid);
                }
            }
            $explode_val = array_unique($explode_val);
            $this->global['categories_under_brand'] = $this->frontend_model->get_custom_query("select * from tbl_category where id IN ('" . implode("','", array_map('intval', $explode_val)) . "') and status = '0' order by name asc");

            $this->global['current_url'] = base_url() . $brand->slug;
            $this->global['items'] = $items;
            $this->global['pageTitle'] = $brand->meta_title;
            $this->global['category_under_brand_active'] = '0';

            $this->loadPage("brand_page", $this->global);
        } else {
            $this->pageNotFound();
        }
    }

    function show_page($id, $items) {
        $pages = $this->frontend_model->get_records('tbl_pages', "status = '0' and id = '$id'");
        if (sizeof($pages) == 1) {
            $this->global['pageTitle'] = $pages[0]->meta_title;
            $page = $pages[0];
            $this->global['page'] = $page;
            $this->global['page_sections'] = $this->frontend_model->get_records('tbl_page_sections', "status = '0' and page_id = '" . $page->id . "' order by section_order + 0 asc");
            $this->loadPage("page", $this->global);
        } else {
            $this->pageNotFound();
        }
    }

    function show_category_page($id, $items) {
        $category = $this->frontend_model->get_records('tbl_category', "status = '0' and id = '$id'");
        if (sizeof($category) == 1) {
            $category = $category[0];
            $this->global['title_name'] = $category->name;

            $order_by = "order by a.date_time desc, a.highlight asc";
            if (isset($_GET['sort-by'])) {
                if ($_GET['sort-by'] == "low_to_high") {
                    $order_by = "order by a.price asc";
                } elseif ($_GET['sort-by'] == "high_to_low") {
                    $order_by = "order by a.price desc";
                }
            }

            $this->global['total_products'] = sizeof($this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where find_in_set('$id', a.category) > 0 and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' $order_by"));

            if (isset($_GET['page'])) {
                $offset = $_GET['page'] . "0";
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where find_in_set('$id', a.category) > 0 and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' $order_by limit $offset, 20");
            } else {
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where find_in_set('$id', a.category) > 0 and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' $order_by limit 20");
            }

            $this->global['current_url'] = base_url() . $category->slug;
            $this->global['pageTitle'] = $category->meta_title;
            $this->loadPage("shop", $this->global);
        } else {
            $this->pageNotFound();
        }
    }

    function show_sub_category_page($id, $items) {
        $sub_category = $this->frontend_model->get_records('tbl_sub_category', "status = '0' and id = '$id'");
        if (sizeof($sub_category) == 1) {
            $sub_category = $sub_category[0];
            $this->global['title_name'] = $sub_category->name;
            $cat_id = $sub_category->category_id;
            $this->global['slider_images'] = $this->frontend_model->get_records('tbl_category_images', "status = '0' and sub_category_id = '$id'");

            $order_by = "order by a.date_time desc, a.highlight asc";
            if (isset($_GET['sort-by'])) {
                if ($_GET['sort-by'] == "low_to_high") {
                    $order_by = "order by a.price asc";
                } elseif ($_GET['sort-by'] == "high_to_low") {
                    $order_by = "order by a.price desc";
                }
            }

            $this->global['total_products'] = sizeof($this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where find_in_set('$id', a.sub_category) > 0 and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' $order_by"));

            if (isset($_GET['page'])) {
                $offset = $_GET['page'] . "0";
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where find_in_set('$id', a.sub_category) > 0 and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' $order_by limit $offset, 20");
            } else {
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where find_in_set('$id', a.sub_category) > 0 and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' $order_by limit 20");
            }

            //side_bar
            $this->global['side_bar_categories'] = $this->frontend_model->get_records('tbl_category', "status = '0' and id='$cat_id'");
            $this->global['side_bar_sub_categories'] = $this->frontend_model->get_records('tbl_sub_category', "status = '0' and id='$id'");
            $this->global['side_bar_child_categories'] = $this->frontend_model->get_records('tbl_child_category', "status = '0' and sub_category_id='$id'");
            $this->global['side_bar_cat_id'] = $cat_id;
            $this->global['side_bar_sub_cat_id'] = $id;
            $this->global['side_bar_child_cat_id'] = 0;

            $this->global['current_url'] = base_url() . $sub_category->slug;
            $this->global['items'] = $items;
            $this->global['pageTitle'] = $sub_category->meta_title;
            $this->loadPage("shop", $this->global);
        } else {
            $this->pageNotFound();
        }
    }

    function show_child_category_page($id, $items) {
        $child_category = $this->frontend_model->get_records('tbl_child_category', "status = '0' and id = '$id'");
        if (sizeof($child_category) == 1) {
            $child_category = $child_category[0];
            $this->global['title_name'] = $child_category->name;
            $sub_category_id = $child_category->sub_category_id;
            $cat_id = $child_category->category_id;
            $this->global['slider_images'] = $this->frontend_model->get_records('tbl_category_images', "status = '0' and child_category_id = '$id'");

            $order_by = "order by a.date_time desc, a.highlight asc";
            if (isset($_GET['sort-by'])) {
                if ($_GET['sort-by'] == "low_to_high") {
                    $order_by = "order by a.price asc";
                } elseif ($_GET['sort-by'] == "high_to_low") {
                    $order_by = "order by a.price desc";
                }
            }

            $this->global['total_products'] = sizeof($this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where find_in_set('$id', a.child_category) > 0 and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' $order_by"));

            if (isset($_GET['page'])) {
                $offset = $_GET['page'] . "0";
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where find_in_set('$id', a.child_category) > 0 and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' $order_by limit $offset, 20");
            } else {
                $this->global['products'] = $this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where find_in_set('$id', a.child_category) > 0 and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' $order_by limit 20");
            }

            //side_bar
            $this->global['side_bar_categories'] = $this->frontend_model->get_records('tbl_category', "status = '0' and id='$cat_id'");
            $this->global['side_bar_sub_categories'] = $this->frontend_model->get_records('tbl_sub_category', "status = '0' and id='$sub_category_id'");
            $this->global['side_bar_child_categories'] = $this->frontend_model->get_records('tbl_child_category', "status = '0' and sub_category_id='$sub_category_id'");
            $this->global['side_bar_cat_id'] = $cat_id;
            $this->global['side_bar_sub_cat_id'] = $sub_category_id;
            $this->global['side_bar_child_cat_id'] = $id;

            $this->global['current_url'] = base_url() . $child_category->slug;
            $this->global['items'] = $items;
            $this->global['pageTitle'] = $child_category->meta_title;
            $this->loadPage("shop", $this->global);
        } else {
            $this->pageNotFound();
        }
    }

    function show_product_page($id, $items = '') {
        $product = $this->frontend_model->get_custom_query("select a.* from tbl_product a, tbl_stores b where a.id = '$id' and a.product_status = 'approved' and a.status = '0' and b.status = '0' and b.store_id = a.store_id and b.active_status = '1' and b.is_verified = '1' order by a.date_time desc");
        ;
        if (sizeof($product) == 1) {
            $product = $product[0];
            $this->global['product'] = $product;
            $this->global['product_images'] = $this->frontend_model->get_records('tbl_product_images', "status = '0' and product_id = '$id'");
            $this->global['tis'] = $this;
            $this->global['pageTitle'] = $product->meta_title;
            $this->loadPage("product-detail", $this->global);
        } else {
            $this->pageNotFound();
        }
    }

    public function product_wishlist() {
        if ($this->input->post('data-product') != "") {
            $product_id = $this->input->post("data-product");
            if (sizeof($this->frontend_model->get_records("tbl_wishlist", "status = '0' and user_id = '$_SESSION[login_id]' and product_id = '" . $product_id . "'")) > 0) {
                $this->frontend_model->delete_data("tbl_wishlist", "status = '0' and user_id = '$_SESSION[login_id]' and product_id = '" . $product_id . "'");
            } else {
                $info['product_id'] = $product_id;
                $info['user_id'] = $_SESSION['login_id'];
                $this->frontend_model->insert("tbl_wishlist", $info);
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function add_to_cart() {
        if ($this->input->post('product_id') != "") {
            if (isset($_SESSION['cart_items'])) {
                $cart = $_SESSION['cart_items'];
                $new_cart = array();
                $cc = 0;
                foreach ($cart as $item) {
                    if ($this->input->post('product_id') == $item->product_id) {
                        $item->product_quantity = $item->product_quantity + $this->input->post('product_quantity');
                    } else {
                        $cc++;
                    }
                    array_push($new_cart, $item);
                }
                if (sizeof($_SESSION['cart_items']) != $cc) {
                    $_SESSION['cart_items'] = $new_cart;
                } else {
                    $item = new stdClass();
                    $item->cart_item_id = time() . uniqid() . date('Ymd');
                    $item->product_id = $this->input->post('product_id');
                    $item->product_quantity = $this->input->post('product_quantity');

                    array_push($new_cart, $item);
                    $_SESSION['cart_items'] = $new_cart;
                }
            } else {
                $cart = array();

                $item = new stdClass();
                $item->cart_item_id = time() . uniqid() . date('Ymd');
                $item->product_id = $this->input->post('product_id');
                $item->product_quantity = $this->input->post('product_quantity');

                array_push($cart, $item);
                $_SESSION['cart_items'] = $cart;
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function update_cart() {
        if ($this->input->post('product_id') != "") {
            if (isset($_SESSION['cart_items'])) {
                $cart = $_SESSION['cart_items'];
                $new_cart = array();
                $cc = 0;
                foreach ($cart as $item) {
                    if ($this->input->post('update_cart_product_quantity') != 0) {
                        if ($this->input->post('product_id') == $item->product_id) {
                            $item->product_quantity = $this->input->post('update_cart_product_quantity');
                        }
                        array_push($new_cart, $item);
                    }
                }
            } else {
                $cart = array();

                $_SESSION['cart_items'] = $cart;
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function remove_cart_item() {
        if ($this->input->post('product_id') != "") {
            if (isset($_SESSION['cart_items'])) {
                $cart = $_SESSION['cart_items'];
                $new_cart = array();
                foreach ($cart as $item) {
                    if ($this->input->post('product_id') != $item->product_id) {
                        array_push($new_cart, $item);
                    }
                }
                $_SESSION['cart_items'] = $new_cart;
            } else {
                $cart = array();

                $_SESSION['cart_items'] = $cart;
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function checkoutPost() {
        $data['redirect_link'] = "";
        if ($this->input->post('billing_first_name') && $this->input->post('billing_phone') && $this->input->post('billing_first_name')) {
            if (isset($_SESSION['cart_items'])) {
                if (isset($_SESSION['loginid'])) {
                    $cart = $_SESSION['cart_items'];
                    $ttotal = 0;
                    $order_ids = "";
                    foreach ($cart as $item) {
                        $pr_id = $item->product_id;
                        $item_det = $this->frontend_model->get_records('tbl_courses', "status = '0' and post_status = '1' and id = '$pr_id'")[0];

                        $user_id = $_SESSION['loginid'];
                        $order_id = "MM" . date('Ymd') . uniqid();

                        $order_ids .= $order_id . ",";

                        $sub_total = ($item_det->cost * $item->product_quantity);
                        $shipping_cost = $this->frontend_model->get_record('tbl_courses', "status = '0' and post_status = '1' and id = '$pr_id'", "shipping_cost");
                        $gst = (($sub_total / 100) * $this->frontend_model->get_record('tbl_courses', "status = '0' and post_status = '1' and id=" . $pr_id, 'product_gst'));
                        $total = $sub_total + $shipping_cost + $gst;
                        $ttotal = $ttotal + $total;

                        $order['order_id'] = $order_id;
                        $order['user_id'] = $user_id;
                        $order['sub_total'] = $sub_total;
                        $order['shipping'] = $shipping_cost;
                        $order['gst'] = $gst;
                        $order['total'] = $total;
                        $order['is_paid'] = 0;
                        $order['date'] = date('Y-m-d');
                        $order['is_payout'] = 0;
                        $order['payout_id'] = '';

                        $store_id = $this->frontend_model->get_record("tbl_product", "id='$pr_id'", "store_id");
                        $plan_id = $this->frontend_model->get_record("tbl_stores", "store_id='$store_id'", "plan_id");
                        $payout_commission_fee = $this->frontend_model->get_record("tbl_plans", "id='$plan_id'", "payout_commission_fee");

                        $order['payout_commission_fee'] = $payout_commission_fee;
                        $order['store_id'] = $store_id;

                        $payout_day = $this->frontend_model->get_record("tbl_plans", "id='$plan_id'", "payout_day");

                        $order['payout_date'] = date('Y-m-d', strtotime(' +' . $payout_day . ' day'));

                        $order['is_own_gst'] = $this->frontend_model->get_record("tbl_stores", "store_id='$store_id'", "is_own_gst");

                        $insert_id = $this->frontend_model->insert('tbl_orders', $order);

                        $info['order_id'] = $order_id;
                        $info['user_id'] = $user_id;
                        $info['option_name'] = 'billing';
                        $info['first_name'] = $this->input->post('billing_first_name');
                        $info['last_name'] = $this->input->post('billing_last_name');
                        $info['company_name'] = $this->input->post('billing_company');
                        $info['email'] = $this->input->post('billing_email');
                        $info['phone_number'] = $this->input->post('billing_phone');
                        $info['address1'] = $this->input->post('billing_address_1');
                        $info['address2'] = $this->input->post('billing_address_2');
                        $info['city'] = $this->input->post('billing_city');
                        $info['state'] = $this->input->post('billing_state');
                        $info['pincode'] = $this->input->post('billing_postcode');

                        if ($this->input->post('ship_to_different_address') == 1) {
                            $info1['order_id'] = $order_id;
                            $info1['user_id'] = $user_id;
                            $info1['option_name'] = 'shipping';
                            $info1['first_name'] = $this->input->post('shipping_first_name');
                            $info1['last_name'] = $this->input->post('shipping_last_name');
                            $info1['company_name'] = $this->input->post('shipping_company');
                            $info1['email'] = $this->input->post('shipping_email');
                            $info1['phone_number'] = $this->input->post('shipping_phone');
                            $info1['address1'] = $this->input->post('shipping_address_1');
                            $info1['address2'] = $this->input->post('shipping_address_2');
                            $info1['city'] = $this->input->post('shipping_city');
                            $info1['state'] = $this->input->post('shipping_state');
                            $info1['pincode'] = $this->input->post('shipping_postcode');
                        } else {
                            $info1['order_id'] = $order_id;
                            $info1['user_id'] = $user_id;
                            $info1['option_name'] = 'shipping';
                            $info1['first_name'] = $this->input->post('billing_first_name');
                            $info1['last_name'] = $this->input->post('billing_last_name');
                            $info1['company_name'] = $this->input->post('billing_company');
                            $info1['email'] = $this->input->post('billing_email');
                            $info1['phone_number'] = $this->input->post('billing_phone');
                            $info1['address1'] = $this->input->post('billing_address_1');
                            $info1['address2'] = $this->input->post('billing_address_2');
                            $info1['city'] = $this->input->post('billing_city');
                            $info1['state'] = $this->input->post('billing_state');
                            $info1['pincode'] = $this->input->post('billing_postcode');
                        }


                        $order_item['order_id'] = $order_id;
                        $order_item['user_id'] = $user_id;
                        $order_item['product_id'] = $item->product_id;
                        $order_item['store_id'] = $store_id;
                        $order_item['price'] = $item_det->cost;
                        $order_item['quantity'] = $item->product_quantity;
                        $this->frontend_model->insert('tbl_order_item', $order_item);


                        $info2['order_id'] = $order_id;
                        $info2['est_delivery_date'] = date('Y-m-d', strtotime($this->frontend_model->get_record('tbl_general_settings', "status = '0' and option_name = 'estimated_delivery_in_days'", 'value') . ' day'));
                        $info2['process'] = "pending";

                        $this->frontend_model->insert('tbl_order_address', $info);
                        $this->frontend_model->insert('tbl_order_address', $info1);
                        $this->frontend_model->insert('tbl_order_process', $info2);
                    }

                    $orderer_id = "order" . uniqid();

                    $info10 = array(
                        "user_id" => $_SESSION['login_id'],
                        "order_id" => $orderer_id,
                        "payment_id" => '',
                        "amount" => round($ttotal) . "00",
                        "description" => '',
                        "email" => '',
                        "contact" => '',
                        "notes" => "Payment for product orders " . $order_ids,
                        "order_ids" => $order_ids,
                        "payment_status" => 'initiated'
                    );

                    $this->frontend_model->insert('tbl_transactions', $info10);
                    $data['redirect_link'] = "payment/" . $orderer_id;
                    $data['result'] = 1;
                }
            } else {
                $data['result'] = 0;
            }
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function checkoutPostFree() {
        $data['redirect_link'] = "";
        if ($this->input->post('billing_first_name') && $this->input->post('billing_phone') && $this->input->post('billing_first_name')) {
            if (isset($_SESSION['cart_items'])) {
                if (isset($_SESSION['loginid'])) {
                    $cart = $_SESSION['cart_items'];
                    $ttotal = 0;
                    $order_ids = "";
                    foreach ($cart as $item) {
                        $pr_id = $item->product_id;
                        $item_det = $this->frontend_model->get_records('tbl_courses', "status = '0' and post_status = '1' and id = '$pr_id'")[0];

                        $user_id = $_SESSION['loginid'];
                        $order_id = "MM" . date('Ymd') . uniqid();

                        $order_ids .= $order_id . ",";

                        $sub_total = ($item_det->cost * $item->product_quantity);
                        $shipping_cost = $this->frontend_model->get_record('tbl_courses', "status = '0' and post_status = '1' and id = '$pr_id'", "shipping_cost");
                        $gst = (($sub_total / 100) * $this->frontend_model->get_record('tbl_courses', "status = '0' and post_status = '1' and id=" . $pr_id, 'product_gst'));
                        $total = $sub_total + $shipping_cost + $gst;
                        $ttotal = $ttotal + $total;

                        $order['order_id'] = $order_id;
                        $order['user_id'] = $user_id;
                        $order['sub_total'] = $sub_total;
                        $order['shipping'] = $shipping_cost;
                        $order['gst'] = $gst;
                        $order['total'] = $total;
                        $order['is_paid'] = 1;
                        $order['date'] = date('Y-m-d');
                        $order['is_payout'] = 0;
                        $order['payout_id'] = '';

                        $store_id = $this->frontend_model->get_record("tbl_product", "id='$pr_id'", "store_id");
                        $plan_id = $this->frontend_model->get_record("tbl_stores", "store_id='$store_id'", "plan_id");
                        $payout_commission_fee = $this->frontend_model->get_record("tbl_plans", "id='$plan_id'", "payout_commission_fee");

                        $order['payout_commission_fee'] = $payout_commission_fee;
                        $order['store_id'] = $store_id;

                        $payout_day = $this->frontend_model->get_record("tbl_plans", "id='$plan_id'", "payout_day");

                        $order['payout_date'] = date('Y-m-d', strtotime(' +' . $payout_day . ' day'));

                        $order['is_own_gst'] = $this->frontend_model->get_record("tbl_stores", "store_id='$store_id'", "is_own_gst");

                        $insert_id = $this->frontend_model->insert('tbl_orders', $order);

                        $info['order_id'] = $order_id;
                        $info['user_id'] = $user_id;
                        $info['option_name'] = 'billing';
                        $info['first_name'] = $this->input->post('billing_first_name');
                        $info['last_name'] = $this->input->post('billing_last_name');
                        $info['company_name'] = $this->input->post('billing_company');
                        $info['email'] = $this->input->post('billing_email');
                        $info['phone_number'] = $this->input->post('billing_phone');
                        $info['address1'] = $this->input->post('billing_address_1');
                        $info['address2'] = $this->input->post('billing_address_2');
                        $info['city'] = $this->input->post('billing_city');
                        $info['state'] = $this->input->post('billing_state');
                        $info['pincode'] = $this->input->post('billing_postcode');

                        if ($this->input->post('ship_to_different_address') == 1) {
                            $info1['order_id'] = $order_id;
                            $info1['user_id'] = $user_id;
                            $info1['option_name'] = 'shipping';
                            $info1['first_name'] = $this->input->post('shipping_first_name');
                            $info1['last_name'] = $this->input->post('shipping_last_name');
                            $info1['company_name'] = $this->input->post('shipping_company');
                            $info1['email'] = $this->input->post('shipping_email');
                            $info1['phone_number'] = $this->input->post('shipping_phone');
                            $info1['address1'] = $this->input->post('shipping_address_1');
                            $info1['address2'] = $this->input->post('shipping_address_2');
                            $info1['city'] = $this->input->post('shipping_city');
                            $info1['state'] = $this->input->post('shipping_state');
                            $info1['pincode'] = $this->input->post('shipping_postcode');
                        } else {
                            $info1['order_id'] = $order_id;
                            $info1['user_id'] = $user_id;
                            $info1['option_name'] = 'shipping';
                            $info1['first_name'] = $this->input->post('billing_first_name');
                            $info1['last_name'] = $this->input->post('billing_last_name');
                            $info1['company_name'] = $this->input->post('billing_company');
                            $info1['email'] = $this->input->post('billing_email');
                            $info1['phone_number'] = $this->input->post('billing_phone');
                            $info1['address1'] = $this->input->post('billing_address_1');
                            $info1['address2'] = $this->input->post('billing_address_2');
                            $info1['city'] = $this->input->post('billing_city');
                            $info1['state'] = $this->input->post('billing_state');
                            $info1['pincode'] = $this->input->post('billing_postcode');
                        }


                        $order_item['order_id'] = $order_id;
                        $order_item['user_id'] = $user_id;
                        $order_item['product_id'] = $item->product_id;
                        $order_item['store_id'] = $store_id;
                        $order_item['price'] = $item_det->cost;
                        $order_item['quantity'] = $item->product_quantity;
                        $this->frontend_model->insert('tbl_order_item', $order_item);


                        $info2['order_id'] = $order_id;
                        $info2['est_delivery_date'] = date('Y-m-d', strtotime($this->frontend_model->get_record('tbl_general_settings', "status = '0' and option_name = 'estimated_delivery_in_days'", 'value') . ' day'));
                        $info2['process'] = "pending";

                        $this->frontend_model->insert('tbl_order_address', $info);
                        $this->frontend_model->insert('tbl_order_address', $info1);
                        $this->frontend_model->insert('tbl_order_process', $info2);
                    }

                    $orderer_id = "order" . uniqid();

                    $info10 = array(
                        "user_id" => $_SESSION['login_id'],
                        "order_id" => $orderer_id,
                        "payment_id" => '',
                        "amount" => round($ttotal) . "00",
                        "description" => '',
                        "email" => '',
                        "contact" => '',
                        "notes" => "Payment for product orders " . $order_ids,
                        "order_ids" => $order_ids,
                        "payment_status" => 'initiated',
                        "is_paid" => 1
                    );

                    $this->frontend_model->insert('tbl_transactions', $info10);
                    $data['result'] = 1;
                }
            } else {
                $data['result'] = 0;
            }
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    public function checkout() {
        if (!isset($_SESSION['cart_items'])) {
            redirect(base_url());
        } else {
            if (sizeof($_SESSION['cart_items']) > 0) {
                $id = $_SESSION['loginid'];
                $this->global['pageTitle'] = "Checkout - Meraenglish";

                $this->global['page_sections'] = $this->frontend_model->get_records('tbl_page_sections', "status = '0' and page_id = '1' order by section_order + 0 asc");

                $this->global['scripts'] = '<script type="text/javascript" src="' . base_url() . 'assets/front/js/checkout.js "></script>';
                $this->global['user_details'] = $this->frontend_model->get_records('tbl_general_users', "id = '$id' and status='0'")[0];
                $this->global['carts'] = $_SESSION['cart_items'];

                if ($this->frontend_model->get_record('tbl_general_settings', "status = '0' and option_name = 'guest_checkout'", 'value') == 0) {
                    if (isset($_SESSION['loginid'])) {
                        $this->loadPage("checkout", $this->global);
                    } else {
                        $this->session->set_flashdata('msg', '<center class="flash-msg-error">Please login before checkout!</center>');
                        redirect(base_url() . "login");
                    }
                } else {
                    $this->loadPage("checkout", $this->global);
                }
            } else {
                redirect(base_url());
            }
        }
    }

    function checkoutpayment($order_id) {
        $this->global['pageTitle'] = "Payment for " . $order_id . " - Mimaa's Marketplace in India";

        $this->global['order_id'] = $order_id;

        $this->global['order_details'] = $this->frontend_model->get_records('tbl_transactions', "order_id = '$order_id'")[0];

        if ($this->global['order_details']->is_paid == 0) {
            $this->loadPage("payment", $this->global);
        } else {
            redirect("404");
        }
    }

    function pageNotFound() {
        $this->global['pageTitle'] = "404 - Page Not Found - Mimaa's Marketplace in India";

        $this->loadPage("404", $this->global);
    }

    function product_order_update_payment_details() {
        $data['result'] = 0;
        if ($this->input->post('payment-id')) {
            $payment_id = $this->input->post('payment-id');
            $order_id = $this->input->post('order-id');
            $ord_det = $this->frontend_model->get_records("tbl_transactions", "order_id='$order_id'");
            if (sizeof($ord_det) > 0) {
                $ord_det = $ord_det[0];
                // GET PAYMENT DETAILS
                $url = 'https://api.razorpay.com/v1/payments/' . $payment_id;
                $key_id = $this->frontend_model->get_record("tbl_general_settings", "option_name='razorpay_key'", "value");
                $key_secret = $this->frontend_model->get_record("tbl_general_settings", "option_name='razorpay_secret_key'", "value");
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                $result = json_decode($result, true);

                //$this->capture_payment($payment_id, $result['amount']);

                if (isset($result['status']) && $result['status'] != 'failed') {
                    $info = Array(
                        "payment_id" => $result['id'],
                        "description" => $result['description'],
                        "email" => $result['email'],
                        "contact" => $result['contact'],
                        "notes" => "Payment for order ID " . $order_id,
                        "payment_status" => $result['status'],
                        "is_paid" => 1
                    );
                    if ($this->frontend_model->update('tbl_transactions', $info, "order_id='$order_id'") == TRUE) {
                        $exps = explode(",", $ord_det->order_ids);
                        for ($ir = 0; $ir < sizeof($exps); $ir++) {
                            $info56 = array(
                                "is_paid" => 1
                            );
                            $this->frontend_model->update('tbl_orders', $info56, "order_id='$exps[$ir]'");
                        }

                        $this->email_model->send_sms($result['contact'], "Your order (" . $order_id . ") has been received. Our Meraenglish team will get in touch with you shortly. Track your order at Meraenglish.com");

                        $this->email_model->send_sms($result['contact'], "Your payment ₹" . number_format(substr($result['amount'], 0, -2), 2) . " has been processed. - meraenglish.com");

                        $data['result'] = 1;
                        $data['order_id'] = $order_id;
                        $_SESSION['cart_items'] = array();
                    }
                } else {
                    $this->email_model->send_sms($result['contact'], "Your payment ₹" . number_format(substr($result['amount'], 0, -2), 2) . " has been failed. - Meraenglish.com");
                }
            }
        }
        echo json_encode($data);
    }

    function slugify($text) {
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

    function checkSlugExists($slug, $table, $id) {
        $slugs = $this->frontend_model->get_records($table, "slug = '$slug'");
        if (sizeof($slugs) > 1) {
            return $slug . '-' . uniqid();
        }
        if (sizeof($slugs) == 1) {
            if ($slugs[0]->id == $id) {
                return $slug;
            } else {
                return $slug . '-' . uniqid();
            }
        }
        return $slug;
    }

    function insert_slug($info = '', $table = '', $insert_id = '') {
        if (array_key_exists("slug", $info)) {
            $info1['slug'] = $info['slug'];

            if ($table == 'tbl_category') {
                $info1['category_id'] = $insert_id;
            }
            if ($table == 'tbl_sub_category') {
                $info1['sub_category_id'] = $insert_id;
            }
            if ($table == 'tbl_child_category') {
                $info1['child_category_id'] = $insert_id;
            }
            if ($table == 'tbl_pages') {
                $info1['page_id'] = $insert_id;
            }
            if ($table == 'tbl_product') {
                $info1['product_id'] = $insert_id;
            }
            if ($table == 'tbl_brands') {
                $info1['brand_id'] = $insert_id;
            }

            $this->frontend_model->insert('tbl_slug', $info1);
        }
    }

    function image_upload($atr_name, $file_new_name, $target_dir) {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($_FILES[$atr_name]["name"], PATHINFO_EXTENSION));
        $target_file = $target_dir . $file_new_name;
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") {
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

    function product_images_upload($atr_name, $file_new_name, $target_dir, $incc) {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($_FILES[$atr_name]["name"][$incc], PATHINFO_EXTENSION));
        $target_file = $target_dir . $file_new_name;
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") {
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            return false;
        } else {
            if (move_uploaded_file($_FILES[$atr_name]["tmp_name"][$incc], $target_file)) {
                return true;
            } else {
                return false;
            }
        }
    }

    function is_seller_login() {
        if (isset($_SESSION['is_seller_login'])) {
            if ($this->frontend_model->get_record("tbl_stores", "created_by='$_SESSION[seller_login_id]'", "name") != "") {
                return true;
            } else {
                redirect("seller");
            }
        } else {
            redirect("seller");
        }
    }

    function seller_packages_update_payment_details() {
        $data['result'] = 0;
        if ($this->input->post('payment-id')) {
            $payment_id = $this->input->post('payment-id');
            $plan_id = $this->input->post('plan-id');
            if (sizeof($this->frontend_model->get_records("tbl_transactions", "payment_id='$payment_id'")) < 1) {
                // GET PAYMENT DETAILS
                $url = 'https://api.razorpay.com/v1/payments/' . $payment_id;
                $key_id = $this->frontend_model->get_record("tbl_general_settings", "option_name='razorpay_key'", "value");
                $key_secret = $this->frontend_model->get_record("tbl_general_settings", "option_name='razorpay_secret_key'", "value");
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                $result = json_decode($result, true);

                if (isset($result['status']) && $result['status'] != 'failed') {
                    $order_id = "order" . uniqid();
                    $info = Array(
                        "user_id" => $_SESSION['login_id'],
                        "order_id" => $order_id,
                        "payment_id" => $result['id'],
                        "amount" => $result['amount'],
                        "description" => $result['description'],
                        "email" => $result['email'],
                        "contact" => $result['contact'],
                        "notes" => "Payment for store ID " . $_SESSION['seller_store_id'],
                        "payment_status" => $result['status'],
                        "is_paid" => 1
                    );
                    if ($this->frontend_model->insert('tbl_transactions', $info) == TRUE) {
                        $this->email_model->send_sms($result['contact'], "Your payment ₹" . number_format(substr($result['amount'], 0, -2), 2) . " has been processed. - mimaas.in");
                        if ($plan_id == $this->frontend_model->get_record("tbl_plans", "price='$result[amount]'", "id")) {
                            $plan = $plan_id;
                            $info1 = Array(
                                "plan_id" => $plan,
                                "plan_activate_date_time" => date('Y-m-d H:i:sa'),
                                "active_status" => 1
                            );
                            $this->frontend_model->update('tbl_stores', $info1, "store_id='$_SESSION[seller_store_id]'");

                            $this->email_model->send_sms($result['contact'], "Congrats! Your store (" . $_SESSION['seller_store_id'] . ") has been upgraded to " . $this->frontend_model->get_record("tbl_plans", "id='$plan_id'", "plan_name") . ". - mimaas.in");
                        }

                        $data['result'] = 1;
                        $data['order_id'] = $order_id;
                    } else {
                        $this->email_model->send_sms($result['contact'], "Your payment ₹" . number_format(substr($result['amount'], 0, -2), 2) . " has been failed. - mimaas.in");
                    }
                }
            }
        }
        echo json_encode($data);
    }

    function payment_success($order_id) {
        $this->global['pageTitle'] = "Payment Status for " . $order_id . " - Meraenglish";

        $this->global['order_details'] = $this->frontend_model->get_records('tbl_transactions', "order_id = '$order_id'")[0];

        $this->loadPage("payment-success", $this->global);
    }

    function payment_failure() {
        $this->global['pageTitle'] = "Payment Status - Mimaa's Marketplace in India";

        $this->loadPage("payment-failure", $this->global);
    }

    function get_a_quote_product_details_page() {
        $data['result'] = 0;
        if ($this->input->post('phone_number')) {
            if (isset($_SESSION['login_id'])) {
                $info = array(
                    'name' => $this->input->post('name'),
                    'phone_number' => $this->input->post('phone_number'),
                    'product_id' => $this->input->post('product-id'),
                    'user_id' => $_SESSION['login_id'],
                    'notes' => "Need a special quote for this product.",
                    'quantity' => $this->input->post('quantity')
                );
                $this->frontend_model->insert("tbl_product_enquiry", $info);

                $this->email_model->new_quote_request($info);

                $data['result'] = 1;
            } else {
                $info['first_name'] = $this->input->post('name');
                $info['phone_number'] = $this->input->post('phone_number');
                $info['password'] = md5(uniqid());
                $info['otp'] = time();
                if (sizeof($this->frontend_model->get_records('tbl_general_users', "phone_number = '" . $this->input->post('phone_number') . "'")) > 0) {
                    $info2['otp'] = rand(100000, 999999);
                    $this->frontend_model->update('tbl_general_users', $info2, "phone_number='" . $this->input->post('phone_number') . "'");

                    $info1 = array(
                        'name' => $this->input->post('name'),
                        'phone_number' => $this->input->post('phone_number'),
                        'product_id' => $this->input->post('product-id'),
                        'user_id' => $this->frontend_model->get_record('tbl_general_users', "phone_number = '" . $this->input->post('phone_number') . "'", "id"),
                        'notes' => "Need a special quote for this product.",
                        'quantity' => $this->input->post('quantity')
                    );
                    $this->frontend_model->insert("tbl_product_enquiry", $info1);
                    $data['phone_number'] = $this->input->post('phone_number');
                    $data['result'] = 2;
                } else {
                    if ($insert_id = $this->frontend_model->insert('tbl_general_users', $info)) {
                        $info1 = array(
                            'name' => $this->input->post('name'),
                            'phone_number' => $this->input->post('phone_number'),
                            'product_id' => $this->input->post('product-id'),
                            'user_id' => $insert_id,
                            'notes' => "Need a special quote for this product.",
                            'quantity' => $this->input->post('quantity')
                        );
                        $this->frontend_model->insert("tbl_product_enquiry", $info1);
                        $data['phone_number'] = $this->input->post('phone_number');
                        $data['result'] = 2;
                    }
                }
            }
        }
        echo json_encode($data);
    }

    function from_contact_order_help() {
        $data['result'] = 0;
        if ($this->input->post('order_id')) {
            $info = array(
                'order_id' => $this->input->post('order_id'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message')
            );
            $this->frontend_model->insert("tbl_order_enquiry", $info);

            $mobile = $this->frontend_model->get_record('tbl_general_users', "id = '" . $_SESSION['login_id'] . "'", "phone_number");

            $this->email_model->send_sms($mobile, "Your request has been received. Order ID: " . $this->input->post('order_id') . ". Our representative will get in touch with you shortly.");

            $data['result'] = 1;
        }
        echo json_encode($data);
    }

    function get_a_quote_product_details_page_otp_form() {
        $data['result'] = 0;
        if ($this->input->post('phone_number')) {
            if (sizeof($this->frontend_model->get_records('tbl_general_users', "phone_number = '" . $this->input->post('phone_number') . "' and otp = '" . $this->input->post('otp') . "'")) > 0) {
                $info2['otp'] = "";
                $info2['is_verified'] = "1";
                $this->frontend_model->update('tbl_general_users', $info2, "phone_number='" . $this->input->post('phone_number') . "'");
                $data['result'] = 1;

                $rr = $this->frontend_model->get_records('tbl_general_users', "phone_number = '" . $this->input->post('phone_number') . "'");

                $_SESSION['is_login'] = true;
                $_SESSION['login_id'] = $rr[0]->id;
                $data['result'] = 1;
            }
        }
        echo json_encode($data);
    }

    function apply_coupon() {
        $data['result'] = 0;
        if ($this->input->post('coupon')) {
            $cp = $this->frontend_model->get_records('tbl_coupons', "coupon_code = '" . $this->input->post('coupon') . "' and status = '0' and coupon_status = '0'");
            if (sizeof($cp) > 0) {
                if (isset($_SESSION['cart_items'])) {
                    if (sizeof($_SESSION['cart_items']) > 0) {
                        foreach ($_SESSION['cart_items'] as $item) {
                            $pr_id = $item->product_id;
                            $item_det = $this->frontend_model->get_record('tbl_product', "status = '0' and id = '$pr_id'", "child_category")[0];
                        }
                    }
                }



                $sub_total = $this->input->post('sub_total');
                $cp = $cp[0];

                if ($cp->flat_percentage == 0) {
                    $data['sub_total'] = $sub_total - $cp->value;
                } else {
                    $data['sub_total'] = $sub_total - (($sub_total / 100) * $cp->value);
                }

                $data['result'] = 1;
            }
        }
        echo json_encode($data);
    }

    function cron_job() {
        foreach ($this->frontend_model->get_records("tbl_category", "status = '0'") as $key) {
            $slugs = $this->frontend_model->get_records("tbl_slug", "status = '0' and category_id = '" . $key->id . "'");
            if (sizeof($slugs) == 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_category", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
            } elseif (sizeof($slugs) > 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_category", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
                for ($i = 1; $i < sizeof($slugs); $i++) {
                    $this->frontend_model->delete_data("tbl_slug", "id = '" . $slugs[$i]->id . "'");
                }
            } else {
                if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                    $data['slug'] = $key->slug . "-" . uniqid();
                    $data1['slug'] = $data['slug'];
                    $data['category_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                    $this->frontend_model->update("tbl_category", $data1, "id = '" . $key->id . "'");
                } else {
                    $data['slug'] = $key->slug;
                    $data['category_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                }
            }
        }

        // Reset $data to empty array
        $data = array();

        foreach ($this->frontend_model->get_records("tbl_sub_category", "status = '0'") as $key) {
            $slugs = $this->frontend_model->get_records("tbl_slug", "status = '0' and sub_category_id = '" . $key->id . "'");
            if (sizeof($slugs) == 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_sub_category", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
            } elseif (sizeof($slugs) > 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_sub_category", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
                for ($i = 1; $i < sizeof($slugs); $i++) {
                    $this->frontend_model->delete_data("tbl_slug", "id = '" . $slugs[$i]->id . "'");
                }
            } else {
                if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                    $data['slug'] = $key->slug . "-" . uniqid();
                    $data1['slug'] = $data['slug'];
                    $data['sub_category_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                    $this->frontend_model->update("tbl_sub_category", $data1, "id = '" . $key->id . "'");
                } else {
                    $data['slug'] = $key->slug;
                    $data['sub_category_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                }
            }
        }

        // Reset $data to empty array
        $data = array();

        foreach ($this->frontend_model->get_records("tbl_child_category", "status = '0'") as $key) {
            $slugs = $this->frontend_model->get_records("tbl_slug", "status = '0' and child_category_id = '" . $key->id . "'");
            if (sizeof($slugs) == 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_child_category", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
            } elseif (sizeof($slugs) > 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_child_category", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
                for ($i = 1; $i < sizeof($slugs); $i++) {
                    $this->frontend_model->delete_data("tbl_slug", "id = '" . $slugs[$i]->id . "'");
                }
            } else {
                if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                    $data['slug'] = $key->slug . "-" . uniqid();
                    $data1['slug'] = $data['slug'];
                    $data['child_category_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                    $this->frontend_model->update("tbl_child_category", $data1, "id = '" . $key->id . "'");
                } else {
                    $data['slug'] = $key->slug;
                    $data['child_category_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                }
            }
        }

        // Reset $data to empty array
        $data = array();

        foreach ($this->frontend_model->get_records("tbl_brands", "status = '0'") as $key) {
            $slugs = $this->frontend_model->get_records("tbl_slug", "status = '0' and brand_id = '" . $key->id . "'");
            if (sizeof($slugs) == 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_brands", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
            } elseif (sizeof($slugs) > 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_brands", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
                for ($i = 1; $i < sizeof($slugs); $i++) {
                    $this->frontend_model->delete_data("tbl_slug", "id = '" . $slugs[$i]->id . "'");
                }
            } else {
                if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                    $data['slug'] = $key->slug . "-" . uniqid();
                    $data1['slug'] = $data['slug'];
                    $data['brand_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                    $this->frontend_model->update("tbl_brands", $data1, "id = '" . $key->id . "'");
                } else {
                    $data['slug'] = $key->slug;
                    $data['brand_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                }
            }
        }

        // Reset $data to empty array
        $data = array();

        foreach ($this->frontend_model->get_records("tbl_product", "status = '0'") as $key) {
            $slugs = $this->frontend_model->get_records("tbl_slug", "status = '0' and product_id = '" . $key->id . "'");
            if (sizeof($slugs) == 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_product", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
            } elseif (sizeof($slugs) > 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_product", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
                for ($i = 1; $i < sizeof($slugs); $i++) {
                    $this->frontend_model->delete_data("tbl_slug", "id = '" . $slugs[$i]->id . "'");
                }
            } else {
                if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                    $data['slug'] = $key->slug . "-" . uniqid();
                    $data1['slug'] = $data['slug'];
                    $data['product_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                    $this->frontend_model->update("tbl_product", $data1, "id = '" . $key->id . "'");
                } else {
                    $data['slug'] = $key->slug;
                    $data['product_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                }
            }
        }

        // Reset $data to empty array
        $data = array();

        foreach ($this->frontend_model->get_records("tbl_pages", "status = '0'") as $key) {
            $slugs = $this->frontend_model->get_records("tbl_slug", "status = '0' and page_id = '" . $key->id . "'");
            if (sizeof($slugs) == 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_pages", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
            } elseif (sizeof($slugs) > 1) {
                if ($slugs[0]->slug != $key->slug) {
                    if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                        $data['slug'] = $key->slug . "-" . uniqid();
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                        $this->frontend_model->update("tbl_pages", $data, "id = '" . $key->id . "'");
                    } else {
                        $data['slug'] = $key->slug;
                        $this->frontend_model->update("tbl_slug", $data, "status = '0' and id = '" . $slugs[0]->id . "'");
                    }
                }
                for ($i = 1; $i < sizeof($slugs); $i++) {
                    $this->frontend_model->delete_data("tbl_slug", "id = '" . $slugs[$i]->id . "'");
                }
            } else {
                if (sizeof($this->frontend_model->get_records("tbl_slug", "status = '0' and slug = '" . $key->slug . "'")) > 0) {
                    $data['slug'] = $key->slug . "-" . uniqid();
                    $data1['slug'] = $data['slug'];
                    $data['page_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                    $this->frontend_model->update("tbl_pages", $data1, "id = '" . $key->id . "'");
                } else {
                    $data['slug'] = $key->slug;
                    $data['page_id'] = $key->id;
                    $this->frontend_model->insert("tbl_slug", $data);
                }
            }
        }
    }

    function insert1() {



        $table = $this->input->post('table_name');
        if ($table == "tbl_evaluation") {
            $info['name'] = $this->input->post('name');
            $info['company'] = $this->input->post('company');
            $info['email'] = $this->input->post('email');
            $info['phone'] = $this->input->post('phone');
            $info['mobile'] = $this->input->post('mobile');
            $info['address'] = $this->input->post('address');
            $info['location'] = $this->input->post('location');
            $info['city'] = $this->input->post('city');
            $info['Pincode'] = $this->input->post('pincoode');

            $info['additionalinfo'] = $this->input->post('additionalinfo');
        }
        if ($table == "tbl_ventures") {
            $info['user_type'] = $this->input->post('user_type');
            $info['name'] = $this->input->post('name');
            if ($info['user_type'] == "Land Owners") {

                $info['propertytype'] = $this->input->post('propertytype');
            }
            $info['email'] = $this->input->post('email');
            $info['phone'] = $this->input->post('phone');
            $info['mobile'] = $this->input->post('mobile');
            $info['address'] = $this->input->post('address');
            $info['location'] = $this->input->post('location');
            $info['city'] = $this->input->post('city');
            $info['zone'] = $this->input->post('zone');
            $info['message'] = $this->input->post('message');
            $info['landmark'] = $this->input->post('landmark');

            $info['additionalinfo'] = $this->input->post('additionalinfo');
        }

        if ($table == "tbl_residential") {
            $info['sell_type'] = $this->input->post('sell_type');
            $info['name'] = $this->input->post('name');
            $info['user_id'] = $this->input->post('user_id');

            $info['email'] = $this->input->post('email');
            $info['phone'] = $this->input->post('phone');
            $info['mobile'] = $this->input->post('mobile');
            $info['address'] = $this->input->post('address');
            $info['location'] = $this->input->post('location');
            $info['city'] = $this->input->post('city');

            $info['message'] = $this->input->post('message');
        }
        if ($table == "tbl_post_req") {
            $info['interested_in'] = $this->input->post('interested_in');
            $info['looking_for'] = $this->input->post('looking_for');
            $info['city'] = $this->input->post('city');

            $info['locality'] = $this->input->post('locality');
            $info['cover_unit'] = $this->input->post('cover_unit');

            $info['bed_rooms'] = $this->input->post('bed_rooms');
            $info['minarea'] = $this->input->post('minarea');
            $info['maxarea'] = $this->input->post('maxarea');
            $info['minbudget'] = $this->input->post('minbudget');
            $info['maxbudget'] = $this->input->post('maxbudget');
        }






        $insert_id = $this->frontend_model->insert($table, $info);

        if ($insert_id) {
            $data['result'] = 1;
            $data['insert_id'] = $insert_id;
        } else {
            $data['result'] = 0;
        }


        echo json_encode($data);
    }

    function insert_media() {
        foreach ($_POST as $key => $value) {
            if ($key != 'table_name' && $key != 'row_id') {
                $info[$key] = $value;
            }
        }

        $table = $this->input->post('table_name');


        $id = $info['user_id'];
        $insert_id = $this->frontend_model->insert($table, $info);

        if ($insert_id) {
            $info2['social_media_id'] = $insert_id;
            $this->frontend_model->update('tbl_general_users', $info2, "id = '$id'");
            $data['result'] = 1;
            $data['insert_id'] = $insert_id;
        } else {
            $data['result'] = 0;
        }


        echo json_encode($data);
    }

    function insert() {
        foreach ($_POST as $key => $value) {
            if ($key != 'table_name' && $key != 'row_id') {
                if ($key == 'slug') {
                    if (strlen($value) > 0) {
                        $info[$key] = $this->slugify($value);
                    } else {
                        $info[$key] = $this->slugify($this->input->post('name'));
                    }
                } else {
                    $info[$key] = $value;
                }
            }
        }

        $table = $this->input->post('table_name');


        $folder_name = "common";
        $info['password'] = md5($info['password']);
        $email = $info['email'];
        $contact = $info['mobile'];
        $password = $info['password'];

        if ($_FILES['builders_image']['name'] != '') {
            $store_profile_image = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['builders_image']["name"], PATHINFO_EXTENSION));
            if ($this->image_upload('builders_image', $store_profile_image, 'uploads/common/') == true) {
                $info['builders_image'] = $store_profile_image;
            }
        }
        $record1 = $this->frontend_model->get_records('tbl_builder_register', "email = '" . $email . "'");

        $record2 = $this->frontend_model->get_records('tbl_builder_register', "
			mobile = '" . $contact . "'  ");
        if (sizeof($record1) > 0) {
            if ($record1[0]->status == 0) {
                $data['result'] = 2;
            } else {

                $data['result'] = 4;
            }
        } else if (sizeof($record2) > 0) {
            if ($record1[0]->status == 0) {
                $data['result'] = 3;
            } else {

                $data['result'] = 4;
            }
        } else {
            $insert_id = $this->frontend_model->insert($table, $info);

            if ($insert_id) {
                $data['result'] = 1;
                $_SESSION['builder_info_id'] = $insert_id;
                $_SESSION['form'] = 2;
                $data['url'] = base_url();
                $data['builder_info_id'] = $insert_id;
                $_SESSION['is_logged_in'] = TRUE;
                $_SESSION['login_id'] = $insert_id;
                $_SESSION['header'] = 1;
            } else {
                $data['result'] = 0;
            }
        }
        $_SESSION['id'] = $info['uniq_id'];
        $_SESSION['builder_id'] = 1;
        $data['uniq_id'] = $info['uniq_id'];
        echo json_encode($data);
    }

    function add_property() {

        $this->global['pageTitle'] = "Add Property";

        $this->loadPage("add_property", $this->global);
    }

    function assured_return_projects() {

        $this->global['pageTitle'] = "Assured return projects";
        $config = array();
        $config["base_url"] = base_url('assured-return-projects');
        $config['per_page'] = 10;
        $config["total_rows"] = sizeof($this->frontend_model->get_records('tbl_property_details', "status = '0' and assured_return_projects='1' and post_status='A'"));

        //$config["total_rows"] =count($recs);
        $config["uri_segment"] = 2;
        $config['use_page_numbers'] = TRUE;
        $config["num_links"] = 5;
        $config['full_tag_open'] = '<ul class="page_navigation">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = "<li class='page-item'>";
        $config['first_tag_close'] = "</li>";
        $config['prev_link'] = ' <span class="flaticon-left-arrow"></span>';
        $config['prev_tag_open'] = "<li class='page-item'>";
        $config['prev_tag_close'] = "</li>";
        $config['next_link'] = ' <span class="flaticon-right-arrow"></span>';
        $config['next_tag_open'] = "<li class='page-item'>";
        $config['next_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li class='page-item'>";
        $config['last_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='page-item active'><a class='page-link
		active' href=''><span class='sr-only'></span>";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li class='page-item'>";
        $config['num_tag_close'] = "</li>";
        $config['attributes'] = array('class' => 'page-link');
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) * $config['per_page'] : 0;


        $this->global['count'] = $config["total_rows"];

        $this->global["links"] = $this->pagination->create_links();

        $this->global['records'] = $this->frontend_model->get_records('tbl_property_details', "status = '0' and assured_return_projects='1'  and post_status='A' $sort limit $page,10");

        $this->loadPage("assured-return-projects", $this->global);
    }

    function blog() {

        $this->global['pageTitle'] = "Blog";

        $this->loadPage("blog", $this->global);
    }

    function blog_details() {

        $this->global['pageTitle'] = "Blog Details";

        $this->loadPage("blog-detail", $this->global);
    }

    function media_coverage() {

        $this->global['pageTitle'] = "Blog";
        $this->global['records'] = $this->frontend_model->get_records('tbl_media_coverage', "status='0'");
        $this->loadPage("media", $this->global);
    }

    function career() {

        $this->global['pageTitle'] = "Career";

        $this->loadPage("career", $this->global);
    }

    function contact_us() {

        $this->global['pageTitle'] = "Contact Us";

        $this->loadPage("contact-us", $this->global);
    }

    function events() {

        $this->global['pageTitle'] = "Events";

        $this->loadPage("events", $this->global);
    }

    function faq() {

        $this->global['pageTitle'] = "FAQ";

        $this->loadPage("faq", $this->global);
    }

    function home_loan() {

        $this->global['pageTitle'] = "Home Loan";

        $this->loadPage("home-loan", $this->global);
    }

    function joint_ventures() {

        $this->global['pageTitle'] = "Joint Ventures";

        $this->loadPage("joint-ventures", $this->global);
    }

    function privacy_policy() {

        $this->global['pageTitle'] = "Privacy Policy";

        $this->loadPage("privacy", $this->global);
    }

    function terms_and_conditions() {

        $this->global['pageTitle'] = "Terms and Conditions";

        $this->loadPage("terms-and-condition", $this->global);
    }

    function user_agreement() {

        $this->global['pageTitle'] = "User Agreement";

        $this->loadPage("user-agreement", $this->global);
    }

    function listing_page() {

        $this->global['pageTitle'] = "Listing Page";
        $this->global['data'] = $this->frontend_model->get_record('tbl_master', "status = '0' and property_status='For Rent'", 'id');
        $this->global['records'] = $this->frontend_model->get_records('tbl_property_details', "status = '0' and property_status='$data' order by id desc");

        $this->loadPage("listing-page", $this->global);
    }

    function detail_page($id) {

        $this->global['pageTitle'] = "Detail Page";
        $loginid = $_SESSION['loginid'];
        $rec = $this->frontend_model->get_record('tbl_recently_viewed', "status = '0' and item_id='$id' and login_id='$loginid'", 'id');

        $users = $this->frontend_model->get_records('tbl_general_users', "status = '0' and id='$loginid'");

        $this->global['records'] = $this->frontend_model->get_records('tbl_property_details', "status = '0'  and id='$id' and post_status='A'");

        $info['property_status'] = $this->global['records'][0]->property_status;

        date_default_timezone_set('Asia/Kolkata');
        if (isset($_SESSION['isloggedin'])) {
            if ($rec) {
                $info2['date_time'] = date('Y/m/d H:i:s');
                $this->frontend_model->update('tbl_recently_viewed', $info2, "id = '$rec'");
            } else {
                $info['item_id'] = $id;
                $info['date_time'] = date('Y/m/d H:i:s');
                $info['login_id'] = $_SESSION['loginid'];
                $this->frontend_model->insert('tbl_recently_viewed', $info);
            }
        }

        $status = $info['property_status'];
        $this->global['viewed'] = $this->frontend_model->get_records('tbl_recently_viewed', "status = '0' and item_id!='$id'  and property_status='$status' and login_id='$loginid' order by date_time desc limit 0,6");
        //$this->global['reviews']=$this->frontend_model->get_records('tbl_user_reviews', "property_id = '$id'");
        $this->global['product_details'] = $this->frontend_model->get_records('tbl_detailed_property_info', "property_id = '$id'");
        $this->loadPage('detail-page', $this->global);
    }

    function insert_form1() {
        $info = array();
        $info['property_name'] = $this->input->post('property_name');
        $info['description'] = $this->input->post('description');
        $info['property_type'] = $this->input->post('property_type');
        $info['property_status'] = $this->input->post('property_status');
        $info['category_id'] = $this->input->post('category_id');
        $info['price'] = $this->input->post('price');
        $info['area'] = $this->input->post('area');
        $info['sqft'] = $this->input->post('sqft');
        $info['rooms'] = $this->input->post('rooms');
        $info['RERA_ID'] = $this->input->post('RERA_ID');
        $info['DTCP'] = $this->input->post('DTCP');

        $info['bhk'] = $this->input->post('bhk');
        $info['built_up_area'] = $this->input->post('built_up_area');
        $info['subcategory_id'] = $this->input->post('subcategory_id');

        $info['post_status'] = "OP";

        $info['builders_info_id'] = $this->input->post('builders_info_id');
        $form1_id = $this->input->post('uniq_id');
        if ($form1_id == '') {
            $info['uniq_id'] = uniqid();
            if ($this->frontend_model->insert("tbl_property_details", $info)) {
                $data['result'] = 1;
                $data['uniq_id'] = $info['uniq_id'];
                $_SESSION['form'] = 3;
                $_SESSION['id'] = $info['uniq_id'];
                $_SESSION['form_id'] = $info['uniq_id'];
            }
        } else {
            $info['uniq_id'] = $form1_id;
            if ($this->frontend_model->update("tbl_property_details", $info, "uniq_id='$form1_id'")) {
                $data['result'] = 1;
                $data['uniq_id'] = $info['uniq_id'];
                $_SESSION['form'] = 3;
                $_SESSION['id'] = $info['uniq_id'];
            }
        }
        echo json_encode($data);
    }

    function insert_form2() {
        $info = array();
        $info['address'] = $this->input->post('address');
        $info['location'] = $this->input->post('location');
        $info['sub_location'] = $this->input->post('sub_location');
        $info['state'] = $this->input->post('state');
        $info['city'] = $this->input->post('city');
        $info['neighborhood'] = $this->input->post('neighborhood');
        $info['zip'] = $this->input->post('pincode');
        $info['country'] = $this->input->post('country');
        //$info['map']=$this->input->post('map');
        $info['uniq_id'] = $this->input->post('uniq_id');
        $id = $info['uniq_id'];
        if ($_SESSION['count1'] == 1) {
            $this->frontend_model->update("tbl_property_location", $info, "uniq_id='$id'");

            $data['result'] = 1;
            $data['uniq_id'] = $info['uniq_id'];
            $_SESSION['form'] = 4;
        } else {
            $insert_id = $this->frontend_model->insert("tbl_property_location", $info);
            if ($insert_id) {
                $info2['location_id'] = $insert_id;
                $this->frontend_model->update('tbl_property_details', $info2, "uniq_id = '$id'");
                $data['result'] = 1;
                $data['uniq_id'] = $info['uniq_id'];
                $_SESSION['form'] = 4;
                $_SESSION['count1'] = 1;
            }
        }
        echo json_encode($data);
    }

    function insert_form3() {
        $info = array();
        /* $info['area_size']=$this->input->post('property_size');
          $info['size_prefix']=$this->input->post('size_prefix');
          $info['landarea']=$this->input->post('landarea');
          $info['landarea_size_postfix']=$this->input->post('landarea_sizeprefix');
          $info['bedrooms']=$this->input->post('bedrooms');
          $info['bathrooms']=$this->input->post('bathrooms');
          $info['balconies']=$this->input->post('balconies');
          $info['is_your_property']=$this->input->post('is_your_property');
          $info['floor_no']=$this->input->post('floor_no');
          $info['total_floors']=$this->input->post('total_floors');
          $info['car_parking_area']=$this->input->post('car_parking_area');
          $info['no_of_car_parking']=$this->input->post('no_of_car_parking');
          $info['garages']=$this->input->post('garage');
          $info['garages_size']=$this->input->post('garage_size');

          $info['transaction_type']=$this->input->post('transaction_type');
          $info['possession_status']=$this->input->post('possession_status');
          $info['month_a']=$this->input->post('month_a');
          $info['year_a']=$this->input->post('year_a');
          $info['age_of_construction']=$this->input->post('age_of_construction');
          $info['year_built']=$this->input->post('year_built');
          if($this->input->post('video_url[]'))
          {
          $info['video_url']=implode(",",$this->input->post('video_url[]'));
          }

          $info['map']=$this->input->post('map');
          $info['virtual_tour']=$this->input->post('virtual_tour');
          $info['education']=$this->input->post('education');
          $info['health']=$this->input->post('health');
          $info['transport']=$this->input->post('transport');
          $info['edistance']=$this->input->post('edistance');
          $info['hdistance']=$this->input->post('hdistance');
          $info['tdistance']=$this->input->post('tdistance');

         */
        foreach ($_POST as $key => $value) {
            if ($key != 'table_name' && $key != 'row_id') {
                if ($key == 'slug') {
                    if (strlen($value) > 0) {
                        $info[$key] = $this->slugify($value);
                    } else {
                        $info[$key] = $this->slugify($this->input->post('name'));
                    }
                } else {
                    $info[$key] = $value;
                }
            }
        }


        if ($this->input->post('amenities[]')) {

            $info['amenities'] = implode(",", $this->input->post('amenities[]'));

            $arr = implode(",", $this->input->post('amenities[]'));
        } else {
            $arr = "";
        }

        $info['uniq_id'] = $this->input->post('uniq_id');
        $id = $info['uniq_id'];

        if ($_SESSION['count2'] == 1) {
            $this->frontend_model->update("tbl_detailed_property_info", $info, "uniq_id = '$id'");
            $info2['ameneties'] = $arr;
            $info2['features'] = $features;
            $this->frontend_model->update('tbl_property_details', $info2, "uniq_id = '$id'");
            $data['result'] = 1;
            $data['uniq_id'] = $info['uniq_id'];
            $_SESSION['form'] = 5;
            $data['update'] = "true";
        } else {
            $insert_id = $this->frontend_model->insert("tbl_detailed_property_info", $info);
            if ($insert_id) {
                $info3['property_id'] = "Prop000" . $insert_id;
                $this->frontend_model->update('tbl_detailed_property_info', $info3, "uniq_id = '$id'");

                $info2['ameneties'] = $arr;
                $info2['features'] = $features;
                $info2['detailed_property_info_id'] = $insert_id;
                $this->frontend_model->update('tbl_property_details', $info2, "uniq_id = '$id'");
                $data['result'] = 1;
                $data['uniq_id'] = $info['uniq_id'];
                $_SESSION['form'] = 5;
                $_SESSION['count2'] = 1;
                $data['insert'] = "true";
            }
        }
        echo json_encode($data);
    }

    public function insert_form4() {
        $data['result'] = 0;
        $info['uniq_id'] = $this->input->post('uniq_id');
        $store_id = $info['uniq_id'];

        if ($_FILES['image']['name'] != '') {
            $store_profile_image = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['image']["name"], PATHINFO_EXTENSION));
            if ($this->image_upload('image', $store_profile_image, 'uploads/common/') == true) {
                $info['profile_image'] = $store_profile_image;
            }
        }

        $insert_id = $this->frontend_model->insert('tbl_property_images', $info);
        if ($insert_id) {
            $id = $info['uniq_id'];
            $info2['property_image_id'] = $insert_id;
            $this->frontend_model->update('tbl_property_details', $info2, "uniq_id = '$id'");
            $data['result'] = 1;

            $data['uniq_id'] = $info['uniq_id'];
        }
        echo json_encode($data);
    }

    function insert_form5() {
        $info = array();
        //$info['plan']=$this->input->post('plan');
        //$info['plan_bedrooms']=$this->input->post('plan_bedrooms');
        $info['plan_bhk'] = implode(",", $this->input->post('plan_bhk[]'));

        $info['plan_title'] = implode(",", $this->input->post('title[]'));
        $info['plan_sqft'] = implode(",", $this->input->post('sqft[]'));
        $info['plan_description'] = implode(",", $this->input->post('plan_description[]'));
        $info['site_description'] = $this->input->post('site_description');
        $info['uniq_id'] = $_SESSION['id'];
        $this->load->library('upload');
        $dataInfo = array();

        $data = array();
        $files = $_FILES;
        $cpt = count($_FILES['plan_image']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['plan_image']['name'] = $files['plan_image']['name'][$i];
            $_FILES['plan_image']['type'] = $files['plan_image']['type'][$i];
            $_FILES['plan_image']['tmp_name'] = $files['plan_image']['tmp_name'][$i];
            $_FILES['plan_image']['error'] = $files['plan_image']['error'][$i];
            $_FILES['plan_image']['size'] = $files['plan_image']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload('plan_image');
            $dataInfo[] = $this->upload->data();
        }
        $a = array();

        for ($i = 0; $i < count($dataInfo); $i++) {
            array_push($a, $dataInfo[$i]['file_name']);
        }
        $info['plan_image'] = implode(",", $a);
        if ($_FILES['site_image']['name'] != '') {
            $store_profile_image = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['site_image']["name"], PATHINFO_EXTENSION));
            if ($this->image_upload('site_image', $store_profile_image, 'uploads/common/') == true) {
                $info['site_image'] = $store_profile_image;
            }
        }
        if ($_SESSION['count4'] == 1) {
            $this->frontend_model->update("tbl_floor_plans", $info, "uniq_id = '$id'");
            //$info2['floor_plans_id']=$insert_id;

            $data['result'] = 1;
            $data['uniq_id'] = $info['uniq_id'];
            $_SESSION['form'] = 5;
            $data['update'] = "true";
        } else {
            $insert_id = $this->frontend_model->insert("tbl_floor_plans", $info);
            if ($insert_id) {
                $id = $info['uniq_id'];
                $info2['floor_plans_id'] = $insert_id;
                //$info2['post_status']='W';
                $this->frontend_model->update('tbl_property_details', $info2, "uniq_id = '$id'");

                $data['result'] = 1;
                $data['uniq_id'] = $info['uniq_id'];
                $data['url'] = base_url();
            }
        }
        echo json_encode($data);
    }

    function insert_form6() {
        foreach ($_POST as $key => $value) {
            if ($key != 'table_name' && $key != 'row_id') {
                if ($key == 'slug') {
                    if (strlen($value) > 0) {
                        $info[$key] = $this->slugify($value);
                    } else {
                        $info[$key] = $this->slugify($this->input->post('name'));
                    }
                } else {
                    $info[$key] = $value;
                }
            }
        }
        if ($this->input->post('rooms[]')) {
            $info['rooms'] = implode(",", $this->input->post('rooms[]'));
        }
        if ($this->input->post('floor_no[]')) {
            $info['floor_no'] = implode(",", $this->input->post('floor_no[]'));
        }


        if ($info['uniq_id']) {
            $id = $info['uniq_id'];
        } else {
            $id = $_SESSION['id'];
        }

        $insert_id = $this->frontend_model->insert("tbl_additional_info", $info);
        if ($insert_id) {
            $info2['additional_info_id'] = $insert_id;
            $info2['post_status'] = 'W';
            $this->frontend_model->update('tbl_property_details', $info2, "uniq_id = '$id'");

            $data['result'] = 1;
            $data['uniq_id'] = $info['uniq_id'];
            $data['url'] = base_url();
        } else {
            $info2['post_status'] = 'W';
            $this->common_model->update('tbl_property_details', $info2, "uniq_id = '$id'");
        }

        $_SESSION['form'] = '';
        $_SESSION['id'] = '';
        $_SESSION['count1'] = 0;
        $_SESSION['count2'] = 0;
        $_SESSION['count3'] = 0;
        echo json_encode($data);
    }

    public function form4d() {
        $this->load->library('upload');
        $dataInfo = array();

        $data = array();
        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
            $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
            $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload('userfile');
            $dataInfo[] = $this->upload->data();
        }
        $a = array();

        for ($i = 0; $i < count($dataInfo); $i++) {
            array_push($a, $dataInfo[$i]['file_name']);
        }
        $dataInfo2 = array();
        $cpt = count($_FILES['file']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['file']['name'] = $files['file']['name'][$i];
            $_FILES['file']['type'] = $files['file']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['file']['error'][$i];
            $_FILES['file']['size'] = $files['file']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload('file');
            $dataInfo2[] = $this->upload->data();
        }
        $b = array();

        for ($i = 0; $i < count($dataInfo2); $i++) {
            array_push($b, $dataInfo2[$i]['file_name']);
        }
        $dataInfo3 = array();
        $cpt = count($_FILES['actual']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['actual']['name'] = $files['actual']['name'][$i];
            $_FILES['actual']['type'] = $files['actual']['type'][$i];
            $_FILES['actual']['tmp_name'] = $files['actual']['tmp_name'][$i];
            $_FILES['actual']['error'] = $files['actual']['error'][$i];
            $_FILES['actual']['size'] = $files['actual']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload('actual');
            $dataInfo2[] = $this->upload->data();
        }
        $c = array();

        for ($i = 0; $i < count($dataInfo3); $i++) {
            array_push($c, $dataInfo3[$i]['file_name']);
        }

        if ($_FILES['profile_image']['name'] != '') {
            $store_profile_image = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['profile_image']["name"], PATHINFO_EXTENSION));
            if ($this->image_upload('profile_image', $store_profile_image, 'uploads/common/') == true) {
                $data['profile_image'] = $store_profile_image;
            }
        }
        if ($_FILES['banner']['name'] != '') {
            $store_profile_image = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['banner']["name"], PATHINFO_EXTENSION));
            if ($this->image_upload('banner', $store_profile_image, 'uploads/common/') == true) {
                $data['banner_image'] = $store_profile_image;
            }
        }


        $data['image'] = implode(",", $a);
        $data['actual_image'] = implode(",", $c);
        $data['attachment'] = implode(",", $b);
        $data['uniq_id'] = $this->input->post('uniq_id');
        $id = $data['uniq_id'];

        if ($_SESSION['count3'] == 1) {
            $this->frontend_model->update('tbl_property_images', $data, "uniq_id = '$id'");

            $id = $data['uniq_id'];
            $dat['result'] = 1;
            $_SESSION['form'] = 6;
        } else {
            $insert_id = $this->frontend_model->insert('tbl_property_images', $data);
            if ($insert_id) {
                $id = $data['uniq_id'];
                $info2['property_image_id'] = $insert_id;
                $this->frontend_model->update('tbl_property_details', $info2, "uniq_id = '$id'");
                $dat['result'] = 1;
                $_SESSION['form'] = 6;
                $_SESSION['count3'] = 1;
            }
        }
        echo json_encode($dat);
    }

    function set_upload_options() {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'uploads/common/';

        $config ['allowed_types'] = 'gif|jpg|png|jpeg|txt|pdf|xsl|doc';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;

        return $config;
    }

    public function add_item() {
        if ($this->input->post('product_id') != "") {
            if (isset($_SESSION['compare_items'])) {
                $cart = $_SESSION['compare_items'];
                $new_cart = array();
                $cc = 0;
                foreach ($cart as $item) {
                    if ($this->input->post('product_id') == $item->product_id) {
                        $item->product_quantity = $item->product_quantity + $this->input->post('product_quantity');
                    } else {
                        $cc++;
                    }
                    array_push($new_cart, $item);
                }
                if (sizeof($_SESSION['compare_items']) != $cc) {
                    $_SESSION['compare_items'] = $new_cart;
                } else {
                    $item = new stdClass();
                    $item->cart_item_id = time() . uniqid() . date('Ymd');
                    $item->product_id = $this->input->post('product_id');
                    $item->product_quantity = $this->input->post('product_quantity');

                    array_push($new_cart, $item);
                    $_SESSION['compare_items'] = $new_cart;
                }
            } else {
                $cart = array();

                $item = new stdClass();
                $item->cart_item_id = time() . uniqid() . date('Ymd');
                $item->product_id = $this->input->post('product_id');
                $item->product_quantity = $this->input->post('product_quantity');

                array_push($cart, $item);
                $_SESSION['compare_items'] = $cart;
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    function update() {

        $info = array();
        foreach ($_POST as $key => $value) {
            if ($key != 'table_name' && $key != 'id' && $key != 'product_1') {
                if ($key == 'slug') {
                    if (strlen($value) > 0) {
                        $info[$key] = $this->slugify($value);
                    } else {
                        $info[$key] = $this->slugify($this->input->post('name'));
                    }
                } else {
                    $info[$key] = htmlentities($value);
                }
            }
        }

        $table = $this->input->post('table_name');
        $row_id = $this->input->post('id');

        if (sizeof($_FILES) > 0) {
            if ($table == 'tbl_brands') {
                $folder_name = 'brands';
            } elseif ($table == 'tbl_sections') {
                $folder_name = 'sections';
            } elseif ($table == 'tbl_category' || $table == 'tbl_sub_category' || $table == 'tbl_child_category') {
                $folder_name = 'category';
            } elseif ($table == 'mydetails') {
                $folder_name = 'mydetails';
            } else {
                $folder_name = "common";
            }

            foreach ($_FILES as $key => $value) {
                $file_new_name = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES[$key]["name"], PATHINFO_EXTENSION));
                if ($this->image_upload($key, $file_new_name, 'uploads/' . $folder_name . '/') == true) {
                    $info[$key] = $file_new_name;
                }
            }
            if ($this->frontend_model->update($table, $info, "id = '" . $row_id . "'")) {


                $data['result'] = 1;
            } else {
                $data['result'] = 0;
            }
        } else {
            if ($this->frontend_model->update($table, $info, "id = '" . $row_id . "'")) {


                $data['result'] = 1;
            } else {
                $data['result'] = 0;
            }
        }


        echo json_encode($data);
    }

    public function course_list() {

        $config = array();
        $config["base_url"] = base_url('course_list');
        $config['per_page'] = 10;
        $config["uri_segment"] = 2;
        $config['use_page_numbers'] = TRUE;
        $config["num_links"] = 5;
        $config['full_tag_open'] = ' <ul class="pagination p-center">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = "<li class='page-item'><a class='page-link'>";
        $config['first_tag_close'] = "</a></li>";
        $config['next_link'] = '<a class="page-link" href="#" aria-label="Next"><span class="ti-arrow-right"></span><span class="sr-only">Next</span></a>';
        $config['next_tag_open'] = "<li class='page-item'>";
        $config['next_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li class='page-item'>";
        $config['last_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='page-item active'><a class='page-link'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li class='page-item'><a class='page-link'>";
        $config['num_tag_close'] = "</a></li>";
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) * $config['per_page'] : 0;

        $this->global['count'] = $config['total_rows'];

        $this->global["links"] = $this->pagination->create_links();
        $this->global['count'] = $config['total_rows'];
        $this->global["res"] = $config['per_page'];
        $this->global['page'] = $this->uri->segment(2);
        $this->global['rows'] = $config["total_rows"];

        $this->global['records'] = $this->frontend_model->get_records('tbl_courses', "status=0 and post_status = '1' order by date_time desc");
        $this->loadPage('cources', $this->global);
    }

    public function about_us() {

        $this->global['records'] = $this->frontend_model->get_records('tbl_testimonials_add', "status='0' order by date_time asc");
        $this->loadPage('about-us', $this->global);
    }

    public function contact_form() {
        $this->global['records'] = $this->frontend_model->get_records('tbl_courses', "status=0");

        $this->loadPage('contact-us', $this->global);
    }

    public function blog_list() {
        $this->global['records'] = $this->frontend_model->get_records('tbl_courses', "status=0");

        $this->loadPage('blog', $this->global);
    }

    public function cources_details($id) {

        $this->global['record'] = $this->frontend_model->get_records('tbl_courses', "status=0 and post_status = '1' and id=$id")[0];
        $this->global['curriculums'] = $this->frontend_model->get_records('tbl_videos', "status=0 and course_id=$id");
        $this->global['feature'] = $this->frontend_model->get_records('tbl_courses', "id='$id' and post_status = '1' and status = '0'")[0];
        $this->global['reviews'] = $this->frontend_model->get_records('tbl_user_reviews', "video_id=$id");
        $this->global['records'] = $this->frontend_model->get_records('tbl_courses', "status= '0' and post_status = '1' and id=$id")[0];
        $video1 = $this->frontend_model->get_records('tbl_videos', " id='$id' and status=0")[0];
        $this->global['item'] = $video1;
        $this->global['orderitemvar'] = $this->frontend_model->get_records('tbl_order_item', "status=0 and user_id=" . $_SESSION['loginid'])[0];
        $this->loadPage('cources-details', $this->global);
    }

    public function billing_value() {
        $amount = $this->input->post('amount');
        $quantity = $this->input->post('quantity');
        //$_SESSION['product_count']=$quantity;
        $_SESSION['value'] = (int) $amount * (int) $quantity;
        $course_count = array();
        $_SESSION['product_count'] = array_push($course_count, $quantity);
        $data['result'] = 1;
        $data['value'] = $_SESSION['value'];

        echo json_encode($data);
    }

    public function student_dashboard() {
        $this->global['record'] = $this->frontend_model->get_records('tbl_general_users', "status=0 and id=" . $_SESSION['loginid'])[0];

        $this->loadPage('dashboard', $this->global);
    }

    public function student_profile() {
        $this->global['record'] = $this->frontend_model->get_records('tbl_general_users', "status=0 and id=" . $_SESSION['loginid'])[0];

        $this->loadPage('my-profile', $this->global);
    }

    public function my_courses() {
        $this->global['records'] = array();
        $orders = $this->frontend_model->get_records('tbl_orders', "is_paid=1 and user_id=" . $_SESSION['loginid']);
        foreach ($orders as $order) {
            $orderitemvar = $this->frontend_model->get_records('tbl_order_item', "status=0 and order_id= '$order->order_id'and user_id=" . $_SESSION['loginid'])[0];
            array_push($this->global['records'], $this->frontend_model->get_records('tbl_courses', "status=0 and post_status = '1' and id= $orderitemvar->product_id")[0]);
        }
        $this->loadPage('my-courses', $this->global);
    }

    public function my_courses_video_page($id, $id2) {
        $this->global['pageTitle'] = "my-courses-video-page";
        $video1 = $this->frontend_model->get_records('tbl_video_content', " video_id='$id' and id='$id2' and status=0")[0];
        $video2 = $this->frontend_model->get_records('tbl_videos', "id='$video1->video_id' and status=0")[0];
        $this->global['video3'] = $this->frontend_model->get_records('tbl_courses', "id='$video2->course_id' and status=0")[0];
        $this->global['comments'] = $this->frontend_model->get_records('tbl_comments', " video_id=$video1->id and status=0");
        $this->global['record'] = $video1;


        $this->global['video_id'] = $id2;

        $this->loadPage('my-courses-video-page', $this->global);
    }

    public function my_courses_details($id) {
        $this->global['details'] = $this->frontend_model->get_records('tbl_courses', " id='$id' and post_status = '1' and status=0 ")[0];
        $this->global['videos'] = $this->frontend_model->get_records('tbl_videos', "course_id='$id' and status=0 ");
//        $this->global['videos_content'] = $this->frontend_model->get_records('tbl_video_content', "video_id='$id' and status=0 ");
        $this->loadPage('my-courses-details', $this->global);
    }

    public function other_courses() {
        $ids = array();
        $orders = $this->frontend_model->get_records('tbl_orders', "is_paid=1 and user_id=" . $_SESSION['loginid']);
        foreach ($orders as $order) {
            $orderitemvar = $this->frontend_model->get_records('tbl_order_item', "status=0 and order_id= '$order->order_id'and user_id=" . $_SESSION['loginid'])[0];
            array_push($ids, $this->frontend_model->get_records('tbl_courses', "status=0 and post_status = '1' and id= $orderitemvar->product_id")[0]->id);
        }
        if (!empty($ids)) {

            $ids_merged = " ('" . implode("','", $ids) . "') ";
        } else {
            $ids_merged = " (NULL) ";
        }

        $this->global['record'] = $this->frontend_model->get_records('tbl_general_users', "status='0' and id=" . $_SESSION['loginid'])[0];
        $this->global['other_courses'] = $this->frontend_model->get_records('tbl_courses', "status='0' and post_status = '1'  and id NOT IN $ids_merged ");
        $this->loadPage('other-courses', $this->global);
    }

    public function change_password() {
        $this->global['record'] = $this->frontend_model->get_records('tbl_general_users', "status=0 and id=" . $_SESSION['loginid'])[0];

        $this->loadPage('change-password', $this->global);
    }

    public function reviews() {
// 	$this->global['record'] = $this->frontend_model->get_records('tbl_general_users', "status=0 and id=".$_SESSION['loginid'])[0];
        $id = $_SESSION['loginid'];
        $item = $this->frontend_model->get_records('tbl_user_reviews', "  status='0' and user_id='$id' order by date_time asc");
        $this->global['items'] = $item;
        $this->loadPage('reviews', $this->global);
    }

    public function dashboard_faq() {
        $this->global['record'] = $this->frontend_model->get_records('tbl_general_users', "status=0 and id=" . $_SESSION['loginid'])[0];

        $this->loadPage('dashboard-faq', $this->global);
    }

    public function support() {
        $this->global['record'] = $this->frontend_model->get_records('tbl_general_users', "status=0 and id=" . $_SESSION['loginid'])[0];

        $this->loadPage('support', $this->global);
    }

    public function student_logout() {
        $this->global['record'] = $this->frontend_model->get_records('tbl_general_users', "status=0 and id=" . $_SESSION['loginid'])[0];

        $this->loadPage('login', $this->global);
    }

//  public function  my_order()
//  {
//   $ordersvar = $this->frontend_model->get_records('tbl_orders', "is_paid=1 and user_id=".$_SESSION['loginid'])[0];
//   $orderitemvar = $this->frontend_model->get_records('tbl_order_item' ,"status=0 and order_id= '$ordersvar->order_id'and user_id=".$_SESSION['loginid'])[0];
//   $this->global['records']= $this->frontend_model->get_records('tbl_courses',"status=0 and id= $orderitemvar->product_id");
//   $this->global['items']= $orderitemvar;
//   $this->loadPage('my-order',$this->global);
//  }
    public function my_order() {

        $ordersvar = $this->frontend_model->get_records('tbl_orders', "is_paid=1 and user_id=" . $_SESSION['loginid'])[0];
        $orderitemvar = $this->frontend_model->get_records('tbl_order_item', "status=0 and order_id= '$ordersvar->order_id'and user_id=" . $_SESSION['loginid'])[0];
        $this->global['records'] = $this->frontend_model->get_records('tbl_courses', "status=0 and post_status = '1' and id= $orderitemvar->product_id");
        $this->global['items'] = $orderitemvar;
        $this->global['orders'] = $ordersvar;
        $this->loadPage('my-order', $this->global);
    }

    function change_user_password() {
        $id = $this->input->post('id');
        $password = md5($this->input->post('password'));


        $info['password'] = md5($this->input->post('password'));
        $this->frontend_model->update("tbl_general_users", $info, "id='$id'");
        $data['result'] = 1;
        echo json_encode($data);
    }

    function search() {

        $searchtext = $this->input->post('text');

        $_SESSION['records'] = $this->frontend_model->get_records('tbl_courses', " course_title like '%$searchtext%' and post_status = '1' and status ='0' order by date_time desc");

        $data['result'] = 1;

        echo json_encode($data);
    }

    function search_product() {
        $this->global['records'] = $_SESSION['records'];
        $this->loadpage("cources", $this->global);
    }
    
//    function search_title() {
//
//        $searchtext = $this->input->post('title');
//
//        $_SESSION['title'] = $this->frontend_model->get_records('tbl_video_content', "title like '%$searchtext%'and status ='0' order by date_time desc");
//
//        $data['result'] = 1;
//
//        echo json_encode($data);
//    }
//
//    function search_product_title() {
//        $this->global['video_urls'] = $_SESSION['title'];
//        $this->loadpage("search-title", $this->global);
//    }

    function comment_form_post() {
        $info = array();

        $info['name'] = $this->input->post('name');
        $info['email'] = $this->input->post('email');
        $info['comment'] = $this->input->post('comment');
        $info['video_id'] = $this->input->post('video_id');
        $data = array();
        $insert_id = $this->frontend_model->insert("tbl_comments", $info);
        $data['result'] = 1;
        echo json_encode($data);
    }

    function review_form_post() {
        $info = array();
        $info['name'] = $this->input->post('name');
        $info['email'] = $this->input->post('email');
        $info['review'] = $this->input->post('review');
        $info['ratings'] = $this->input->post('rating');
        $info['video_id'] = $this->input->post('video_id');
        if ($this->frontend_model->insert("tbl_user_reviews", $info))
            $data['result'] = 1;
        echo json_encode($data);
    }

    function invoice($order_id) {
        $this->global['pageTitle'] = 'Order Details' . " - " . $this->config->item('app_name');

        $this->global['order'] = $this->frontend_model->get_records('tbl_orders', "status = '0' and order_id = '$order_id'")[0];
        if ($this->global['order']->id) {
            $this->global['order_items'] = $this->frontend_model->get_records('tbl_order_item', "status = '0' and order_id = '$order_id'");
            $this->global['order_addresses'] = $this->frontend_model->get_records('tbl_order_address', "status = '0' and order_id = '$order_id'");
            $this->global['order_process'] = $this->frontend_model->get_records('tbl_order_process', "status = '0' and order_id = '$order_id'")[0];
            $this->global['order_process_images'] = $this->frontend_model->get_records('tbl_order_process_images', "status = '0' and order_id = '$order_id'");

            $this->loadPage("invoice", $this->global, NULL, NULL);
        } else {
            redirect(base_url());
        }
    }

}

?>