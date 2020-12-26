<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Common_controller extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/common_model');
        $this->isLoggedIn();

        $this->global['tis'] = $this;
    }

    public function index() {
        $this->global['pageTitle'] = $this->config->item('app_name') . ' : ' . 'Dashboard';

        $this->global['countofcategory'] = $this->common_model->get_records('tbl_category', "status = '0'");
        $this->global['countofsubcategory'] = $this->common_model->get_records('tbl_sub_category', "status = '0'");
        $this->global['countofchildcategory'] = $this->common_model->get_records('tbl_child_category', "status = '0'");
        $this->global['countofproduct'] = $this->common_model->get_records('tbl_product', "status = '0'");

        $this->loadViews("product", $this->global, NULL, NULL);
    }

    public function logout() {
        session_destroy();
        redirect(base_url() . "admin");
    }

    public function coupons() {
        $this->load->model('Common_model');
        $data["fetch_data"] = $this->Common_model->fetch_data1();
        $this->loadViews("coupons", $data);
    }

    public function used_coupons() {


        $this->global['rows'] = $this->common_model->get_records('tbl_coupon_users', "status = 'A'");
        $this->loadViews("used_coupons", $this->global, NULL, NULL);
    }

    public function insert1() {
        $this->load->model('Common_model');
        $this->load->helper('string');
        $coupon_number = random_string('alnum', 10);

        $data = array(
            "Coupon_number" => $coupon_number,
            "Generated_date" => date("yy-m-d"),
            "Used_date" => "",
            "User_id" => "",
            "Expiry_date" => $this->input->post("expiry_date"),
            "Point" => $this->input->post("point"),
            "IsFlat" => $this->input->post("IsFlat"),
            "Status" => "C"
        );
        $this->Common_model->insert_data1($data);
        redirect(base_url() . "admin/coupons");
    }

    public function update1() {
        $id = $this->input->get('Id');
        $this->load->model('Common_model');
        $this->Common_model->update1($id);
        //echo '<script>alert($id)</script>';
        redirect(base_url() . "admin/coupons");
    }

    public function stores() {
        $this->global['pageTitle'] = 'Stores - ' . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_records('tbl_stores', "status = '0' order by id desc");

        $this->loadViews("store", $this->global, NULL, NULL);
    }

    public function contact_form() {
        $this->global['pageTitle'] = 'Contact Form - ' . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_records('tbl_contact_form', "status = '0' order by id desc");

        $this->loadViews("contact_form", $this->global, NULL, NULL);
    }

    public function order_help_center() {
        $this->global['pageTitle'] = 'Contact Help Center - ' . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_records('tbl_order_enquiry', "status = '0' order by id desc");

        $this->loadViews("order_help_center", $this->global, NULL, NULL);
    }

    public function product_enquiry() {
        $this->global['pageTitle'] = 'Product Enquiries - ' . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_records('tbl_product_enquiry', "status = '0' order by id desc");

        $this->loadViews("product_enquiry", $this->global, NULL, NULL);
    }

    function header_menu() {
        $this->global['pageTitle'] = 'Header Menu' . " - " . $this->config->item('app_name');

        $this->global['categories'] = $this->common_model->get_records('tbl_category', "status = '0' order by name asc");

        $this->global['sub_categories'] = $this->common_model->get_records('tbl_sub_category', "status = '0' order by name asc");

        $this->global['child_categories'] = $this->common_model->get_records('tbl_child_category', "status = '0' order by name asc");

        $this->global['menus'] = $this->common_model->get_records('tbl_header_menu', "status = '0' order by menu_order + 0 asc");

        $this->loadViews("header-menu", $this->global, NULL, NULL);
    }

    function new_page() {
        $this->global['pageTitle'] = 'New Page' . " - " . $this->config->item('app_name');

        $this->loadViews("new_page", $this->global, NULL, NULL);
    }

    function orders() {
        $this->global['pageTitle'] = 'Orders' . " - " . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_custom_query("select a.*, b.course_title from tbl_order_item a, tbl_courses b where a.status = '0' and b.id = a.product_id group by a.order_id order by date_time desc");

        if (isset($_GET['user-id'])) {
            $this->global['records'] = $this->common_model->get_records('tbl_orders', "status = '0' and user_id='" . $_GET['user-id'] . "' order by date_time desc");
        }

        $this->loadViews("orders", $this->global, NULL, NULL);
    }

    function order_details($order_id) {
        $this->global['pageTitle'] = 'Order Details' . " - " . $this->config->item('app_name');

        $this->global['order'] = $this->common_model->get_records('tbl_orders', "status = '0' and order_id = '$order_id'")[0];
        if ($this->global['order']->id) {
            $this->global['order_items'] = $this->common_model->get_records('tbl_order_item', "status = '0' and order_id = '$order_id'");
            $this->global['order_addresses'] = $this->common_model->get_records('tbl_order_address', "status = '0' and order_id = '$order_id'");
            $this->global['order_process'] = $this->common_model->get_records('tbl_order_process', "status = '0' and order_id = '$order_id'")[0];
            $this->global['order_process_images'] = $this->common_model->get_records('tbl_order_process_images', "status = '0' and order_id = '$order_id'");

            $this->loadViews("order-details", $this->global, NULL, NULL);
        } else {
            redirect(base_url());
        }
    }

    function customers() {
        $this->global['pageTitle'] = 'Customers' . " - " . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_records('tbl_general_users', "status = '0' order by id desc");

        $this->loadViews("customers", $this->global, NULL, NULL);
    }

    function pages() {
        $this->global['pageTitle'] = 'Pages' . " - " . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_records('tbl_pages', "status = '0' order by name asc");

        $this->loadViews("pages", $this->global, NULL, NULL);
    }

    function edit_page($id) {
        $this->global['pageTitle'] = 'Edit Page' . " - " . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_records('tbl_pages', "status = '0' and id = '$id'");

        $this->loadViews("edit-page", $this->global, NULL, NULL);
    }

    function page_editor($id) {
        $this->global['pageTitle'] = 'Page Editor' . " - " . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_records('tbl_pages', "status = '0' and id = '$id'");
        if (sizeof($this->global['records']) > 0) {
            $this->global['sections'] = $this->common_model->get_records('tbl_sections', "status = '0'");

            $this->global['page_sections'] = $this->common_model->get_records('tbl_page_sections', "status = '0' and page_id = '$id' order by section_order + 0 asc");

            $this->global['tis'] = $this;

            $this->loadViews("page-editor", $this->global, NULL, NULL);
        } else {
            redirect("admin");
        }
    }

    function get_table_data() {
        $table_name = $this->input->post('table_name');
        $data['page_section_id'] = $this->input->post('page_section_id');

        if ($table_name == "tbl_image_with_link") {
            $this->load->view('admin/sections/includes/list-images.php', $data);
        } elseif ($table_name == "tbl_testimonial") {
            $this->load->view('admin/sections/includes/list-testimonials.php', $data);
        } elseif ($table_name == "tbl_image_with_link1") {
            $this->load->view('admin/sections/includes/list-image.php', $data);
        } elseif ($table_name == "tbl_image_with_link2") {
            $this->load->view('admin/sections/includes/list-image_with_text_link.php.php', $data);
        } else {
            echo '<span class="text-danger">Something went wrong!</span>';
        }
    }

    function get_records() {
        $table_name = $this->input->post('table_name');
        $where = $this->input->post('where');
        $data['records'] = $this->common_model->get_records($table_name, $where);

        $data['result'] = 1;

        echo json_encode($data);
    }

    public function banner() {
        $this->load->library('upload');
        $dataInfo = array();
        $files = $_FILES;

        print_r($files);




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
        $data = array();
        $data['images'] = implode(",", $a);



        $insert_id = $this->common_model->update($table = '', $info = $data, $where = 'id=1');
        if ($insert_id) {
            $data['result'] = 1;
        }
        echo json_encode($data);
    }

    public function file_update() {
        $this->load->library('upload');
        $dataInfo = array();
        $files = $_FILES;

        print_r($files);




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
        $data = array();
        $data['images'] = implode(",", $a);



        $insert_id = $this->common_model->update('tbl_banner', $data, "id='1'");
        if ($insert_id) {
            $data['result'] = 1;
        }
        echo json_encode($data);
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

    function deletecats() {
        $table_name = $this->input->post('table_name');
        $row_id = $this->input->post('row_id');

        $data['result'] = 0;

        if ($table_name == "tbl_category") {
            if (sizeof($this->common_model->get_records('tbl_sub_category', "status = 0 and category_id = '$row_id'")) > 0) {
                $data['msg'] = "This category cannot be deleted!<br>Please remove all the sub categories under this category!";
                $data['result'] = 2;
            } else {
                $info['status'] = '1';

                $where = "id=" . $row_id;

                if ($this->common_model->update($table_name, $info, $where)) {
                    $data['result'] = 1;
                } else {
                    $data['result'] = 0;
                }
            }
        }

        if ($table_name == "tbl_sub_category") {
            if (sizeof($this->common_model->get_records('tbl_child_category', "status = 0 and sub_category_id = '$row_id'")) > 0) {
                $data['msg'] = "This sub category cannot be deleted!<br>Please remove all the child categories under this sub category!";
                $data['result'] = 2;
            } else {
                $info['status'] = '1';

                $where = "id=" . $row_id;

                if ($this->common_model->update($table_name, $info, $where)) {
                    $data['result'] = 1;
                } else {
                    $data['result'] = 0;
                }
            }
        }

        if ($table_name == "tbl_child_category") {
            $info['status'] = '1';

            $where = "id=" . $row_id;

            if ($this->common_model->update($table_name, $info, $where)) {
                $data['result'] = 1;
            } else {
                $data['result'] = 0;
            }
        }
        if ($table_name == "tbl_child_category") {
            $info['status'] = '1';

            $where = "id=" . $row_id;

            if ($this->common_model->update($table_name, $info, $where)) {
                $data['result'] = 1;
            } else {
                $data['result'] = 0;
            }
        } else {
            $info['status'] = '1';

            $where = "id=" . $row_id;

            if ($this->common_model->update($table_name, $info, $where)) {
                $data['result'] = 1;
            } else {
                $data['result'] = 0;
            }
        }

        echo json_encode($data);
    }

    function delete() {
        $table_name = $this->input->get('table_name');
        $row_id = $this->input->get('id');
        $status = $this->input->get('status');

        $data['result'] = 0;


        if ($this->common_model->delete_data($table_name, $row_id, $status)) {
            $data['result'] = 1;
        }


        echo json_encode($data);
    }

    function status_update() {
        $table_name = $this->input->post('table');
        $row_id = $this->input->post('row_id');
        $status = $this->input->post('status');
        $field = $this->input->post('field');

        $data['result'] = 0;
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        if ($this->common_model->update_status($table_name, $row_id, $status, $field)) {
            $data['result'] = 1;
        }


        echo json_encode($data);
    }

    function activate() {
        $table_name = $this->input->post('table_name');
        $row_id = $this->input->post('row_id');
        $status = 0;

        $data['result'] = 0;


        if ($this->common_model->activate_data($table_name, $row_id, $status)) {
            $data['result'] = 1;
        }


        echo json_encode($data);
    }

    function delete_data() {
        $table_name = $this->input->post('table_name');
        $where = $this->input->post('where');
        $delete_image = $this->input->post('delete_image');

        $this->common_model->delete_data($table_name, $where);

        if (file_exists($delete_image)) {
            unlink($delete_image);
        }

        $data['result'] = 1;

        echo json_encode($data);
    }

    function delete_data_2() {
        $table_name = $this->input->post('table_name');
        $where = $this->input->post('where');
        $delete_image = $this->input->post('delete_image');
        $delete_data_2 = $this->input->post('delete_data_2');

        $this->common_model->delete_data($table_name, $where);

        if (file_exists($delete_image)) {
            unlink($delete_image);
        }

        if (file_exists($delete_data_2)) {
            unlink($delete_data_2);
        }

        $data['result'] = 1;

        echo json_encode($data);
    }

    function top_header() {
        $this->global['pageTitle'] = 'Top Header' . " - " . $this->config->item('app_name');

        $this->global['logo'] = $this->common_model->get_records('tbl_general_settings', "status = '0' and option_name = 'top-header-logo'")[0];

        $this->loadViews("top_header", $this->global, NULL, NULL);
    }

    function bottom_footer() {
        $this->global['pageTitle'] = 'Bottom Footer' . " - " . $this->config->item('app_name');

        $this->global['column1'] = $this->common_model->get_records('tbl_bottom_footer', "status = '0' and column_name = 'column1'")[0];
        $this->global['column2'] = $this->common_model->get_records('tbl_bottom_footer', "status = '0' and column_name = 'column2'")[0];
        $this->global['column3'] = $this->common_model->get_records('tbl_bottom_footer', "status = '0' and column_name = 'column3'")[0];

        $this->loadViews("bottom_footer", $this->global, NULL, NULL);
    }

    function list_sections_page() {
        $this->global['pageTitle'] = 'Sections' . " - " . $this->config->item('app_name');

        $this->global['records'] = $this->common_model->get_records('tbl_sections', "status != '9' order by name asc");

        $this->loadViews("list_sections_page", $this->global, NULL, NULL);
    }

    function checkSlugExists($slug, $table, $id) {
        $slugs = $this->common_model->get_records($table, "slug = '$slug'");
        if (sizeof($slugs) > 1) {
            return $slug . '-' . time();
        }
        if (sizeof($slugs) == 1) {
            if ($slugs[0]->id == $id) {
                return $slug;
            }
        }
        return $slug;
    }

    function update_page_sections() {
        if ($this->isAdmin() == TRUE) {
            $data['result'] = 0;
        } else {
            $size = sizeof($_POST['section_code']);
            $info['page_id'] = $_POST['page_id'];
            $info1['status'] = '1';
            $this->common_model->update('tbl_page_sections', $info1, 'page_id=' . $_POST['page_id']);
            for ($i = 0; $i < $size; $i++) {
                if ($_POST['row_id'][$i] == 0) {
                    $info['section_code'] = $_POST['section_code'][$i];
                    $info['section_order'] = $i + 1;
                    $this->common_model->insert('tbl_page_sections', $info);
                } else {
                    $info['section_code'] = $_POST['section_code'][$i];
                    $info['section_order'] = $i + 1;
                    $info['status'] = '0';
                    $this->common_model->update('tbl_page_sections', $info, 'id=' . $_POST['row_id'][$i]);
                }
            }
            $data['result'] = 1;
        }
        echo json_encode($data);
    }

    function update_header_menu() {
        if ($this->isAdmin() == TRUE) {
            $data['result'] = 0;
        } else {
            $parent = "0";
            $sub = "0";
            $size = sizeof($_POST['menu_type']);
            $this->common_model->delete_all('tbl_header_menu');
            for ($i = 0; $i < $size; $i++) {
                if ($_POST['menu_type'][$i] == "parent") {
                    $parent = "0";
                    $sub = "0";
                }

                $info['menu_type'] = $_POST['menu_type'][$i];
                $info['cat_id'] = $_POST['cat_id'][$i];
                $info['cat_type'] = $_POST['cat_type'][$i];
                $info['image'] = $_POST['image'][$i];
                $info['parent_id'] = $parent;
                $info['sub_id'] = $sub;

                if ($_POST['menu_type'][$i] == "sub") {
                    $info['sub_id'] = '0';
                }

                $info['menu_order'] = $i + 1;

                $insert_id = $this->common_model->insert('tbl_header_menu', $info);

                if ($_POST['menu_type'][$i] == "parent") {
                    $parent = $insert_id;
                    $sub = "0";
                } elseif ($_POST['menu_type'][$i] == "sub") {
                    $sub = $insert_id;
                }
            }
            $data['result'] = 1;
        }
        echo json_encode($data);
    }

    function menu_header_images() {
        $this->global['pageTitle'] = 'Header Menu Images' . " - " . $this->config->item('app_name');

        $this->global['menus'] = $this->common_model->get_records('tbl_header_menu', "status = '0' order by menu_order asc");

        $this->loadViews("header-menu-images", $this->global, NULL, NULL);
    }

    function menu_header_images_post() {
        $folder_name = "header-menu";
        if (sizeof($_FILES) > 0) {
            foreach ($_FILES as $key => $value) {
                $file_new_name = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES[$key]["name"], PATHINFO_EXTENSION));
                if ($this->image_upload($key, $file_new_name, 'uploads/' . $folder_name . '/') == true) {
                    $info['image'] = $file_new_name;
                    $this->common_model->update('tbl_header_menu', $info, 'id=' . $key);
                }
            }
            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
        echo json_encode($data);
    }

    function product_additional_images($product_id) {
        $data['product_id'] = $product_id;
        $this->load->view("admin/edit-product/product-additional-images", $data);
    }

    function insert() {
        if ($this->isAdmin() == TRUE) {
            $data['result'] = 0;
        } else {



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



            if ($table == "tbl_general_users") {

                $data['result'] = 0;
                $info['first_name'] = $this->input->post('first_name');
                $info['last_name'] = $this->input->post('last_name');
                $info['email'] = $this->input->post('email');
                $info['phone_number'] = $this->input->post('phone_number');
                $info['password'] = md5($this->input->post('password'));
                $info['user_type'] = $this->input->post('user_type');
                $info['is_verified'] = "1";
                if (sizeof($this->common_model->get_records('tbl_general_users', "email = '" . $this->input->post('email') . "'")) > 0) {
                    $data['result'] = 2;
                    $data['EmailExist'] = "Email Is already Exist";
                } else if (sizeof($this->common_model->get_records('tbl_general_users', "phone_number = '" . $this->input->post('phone_number') . "'")) > 0) {
                    $data['result'] = 3;
                    $data['Moobile_num'] = "Mobile Number Is already Exist";
                } else {
                    if ($insert_id = $this->common_model->insert('tbl_general_users', $info)) {

                        $data['result'] = 1;
                    }
                }
            } else if ($table == "tbl_users") {

                $data['result'] = 0;
                $info['name'] = $this->input->post('name');
                $info['email'] = $this->input->post('email');
                $info['mobile'] = $this->input->post('mobile');
                $info['password'] = md5($this->input->post('password'));
                $info['roleId'] = $this->input->post('roleId');
                if (sizeof($this->common_model->get_records('tbl_users', "email = '" . $this->input->post('email') . "'")) > 0) {
                    $data['result'] = 2;
                    $data['EmailExist'] = "Email Is already Exist";
                } else if (sizeof($this->common_model->get_records('tbl_users', "mobile = '" . $this->input->post('mobile') . "'")) > 0) {
                    $data['result'] = 3;
                    $data['Moobile_num'] = "Mobile Number Is already Exist";
                } else {
                    if ($insert_id = $this->common_model->insert('tbl_users', $info)) {

                        $data['result'] = 1;
                    }
                }
            } else if ($table == "tbl_builder_register") {

                $data['result'] = 0;
                $info['first_name'] = $this->input->post('first_name');
                $info['last_name'] = $this->input->post('last_name');
                $info['email'] = $this->input->post('email');
                $info['mobile'] = $this->input->post('mobile');
                $info['password'] = md5($this->input->post('password'));
                $info['name'] = $this->input->post('name');

                if (sizeof($this->common_model->get_records('tbl_builder_register', "email = '" . $this->input->post('email') . "'")) > 0) {
                    $data['result'] = 2;
                    $data['EmailExist'] = "Email Is already Exist";
                } else if (sizeof($this->common_model->get_records('tbl_builder_register', "mobile = '" . $this->input->post('mobile') . "'")) > 0) {
                    $data['result'] = 3;
                    $data['Moobile_num'] = "Mobile Number Is already Exist";
                } else {
                    if ($insert_id = $this->common_model->insert('tbl_builder_register', $info)) {

                        $data['result'] = 1;
                    }
                }
            } else {




                if ($this->input->post('features[]')) {
                    $info['features'] = implode(",", $this->input->post('features[]'));
                }

                if ($table == "tbl_sections") {
                    $info['section_code'] = "section-" . time() . "-" . uniqid();
                }

                $folder_name = 'common';

                if ($table == 'tbl_brands') {
                    $folder_name = 'brands';
                } elseif ($table == 'tbl_product_images') {
                    $folder_name = 'products';
                } elseif ($table == 'tbl_product') {
                    $folder_name = 'products';
                } elseif ($table == 'tbl_sections') {
                    $folder_name = 'sections';
                } elseif ($table == 'tbl_category' || $table == 'tbl_sub_category' || $table == 'tbl_child_category' || $table == 'tbl_category_images') {
                    $folder_name = 'category';
                } elseif ($table == 'tbl_pages') {
                    $folder_name = 'pages';
                } elseif ($table == "locations") {
                    $folder_name = 'locations';
                } elseif ($table == "mydetails") {
                    $folder_name = 'mydetails';
                } elseif ($table == "builder") {
                    $folder_name = 'builder';
                } elseif ($table == "yearbuilt") {
                    $folder_name = 'yearbuilt';
                } else {
                    $folder_name = "common";
                }


                if (sizeof($_FILES) > 0) {
                    if ($table == 'tbl_product_images') {
                        $incc = 0;
                        while ($incc < sizeof($_FILES['file_name']['name'])) {
                            if ($_FILES['file_name']['error'][$incc] != 4) {
                                $file_new_name = "mimaas-product-" . date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['file_name']["name"][$incc], PATHINFO_EXTENSION));
                                if ($this->product_images_upload('file_name', $file_new_name, 'uploads/products/', $incc) == true) {
                                    $info['file_name'] = $file_new_name;
                                    //echo $file_new_name;
                                    $this->common_model->insert('tbl_product_images', $info);
                                }
                            }

                            $incc++;
                        }

                        $data['result'] = 1;
                    } else {
                        foreach ($_FILES as $key => $value) {
                            $file_new_name = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES[$key]["name"], PATHINFO_EXTENSION));
                            if ($this->image_upload($key, $file_new_name, 'uploads/' . $folder_name . '/') == true) {
                                $info[$key] = $file_new_name;
                            }
                        }

                        if ($insert_id = $this->common_model->insert($table, $info)) {
                            if (array_key_exists('slug', $info)) {
                                $info['slug'] = $this->checkSlugExists($info['slug'], $table, $insert_id);
                                $info2['slug'] = $info['slug'];
                                $this->common_model->update($table, $info2, "id=" . $insert_id);
                                $this->insert_slug($info, $table, $insert_id);
                            }
                            $data['result'] = 1;
                            $data['insert_id'] = $insert_id;
                        } else {
                            $data['result'] = 0;
                        }
                    }
                } else {
                    if ($insert_id = $this->common_model->insert($table, $info)) {
                        if (array_key_exists('slug', $info)) {
                            $info['slug'] = $this->checkSlugExists($info['slug'], $table, $insert_id);
                            $info2['slug'] = $info['slug'];
                            $this->common_model->update($table, $info2, "id=" . $insert_id);
                            $this->insert_slug($info, $table, $insert_id);
                        }
                        $data['result'] = 1;
                        $data['insert_id'] = $insert_id;
                    } else {
                        $data['result'] = 0;
                    }
                }
            }
        }
        echo json_encode($data);
    }

    function insert_product() {
        if ($this->isAdmin() == TRUE) {
            $data['result'] = 0;
        } else {
            foreach ($_POST as $key => $value) {
                if ($key != 'table_name' && $key != 'spec_id' && $key != 'spec_description' && $key != 'highlight') {
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

            if (sizeof($_FILES) > 0) {
                $file_new_name1 = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['highlight']["name"], PATHINFO_EXTENSION));
                if ($this->image_upload('highlight', $file_new_name1, 'uploads/product-highlight/') == true) {
                    $info['highlight'] = $file_new_name1;
                }
                $file_new_name = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['product_image']["name"], PATHINFO_EXTENSION));
                if ($this->product_image_upload('product_image', $file_new_name, 'uploads/products/') == true) {
                    $info['product_image'] = $file_new_name;
                    if ($insert_id = $this->common_model->insert($table, $info)) {
                        if (array_key_exists('slug', $info)) {
                            $info['slug'] = $this->checkSlugExists($info['slug'], $table, $insert_id);
                            $info2['slug'] = $info['slug'];
                            $this->common_model->update($table, $info2, "id=" . $insert_id);
                            $this->insert_slug($info, $table, $insert_id);
                        }

                        $info3['product_id'] = $insert_id;

                        $data['result'] = 1;
                    } else {
                        $data['result'] = 0;
                    }
                } else {
                    if ($insert_id = $this->common_model->insert($table, $info)) {
                        if (array_key_exists('slug', $info)) {
                            $info['slug'] = $this->checkSlugExists($info['slug'], $table, $insert_id);
                            $info2['slug'] = $info['slug'];
                            $this->common_model->update($table, $info2, "id=" . $insert_id);
                            $this->insert_slug($info, $table, $insert_id);
                        }

                        $info2['product_id'] = $insert_id;

                        $data['result'] = 1;
                    } else {
                        $data['result'] = 0;
                    }
                }
            } else {
                if ($insert_id = $this->common_model->insert($table, $info)) {
                    if (array_key_exists('slug', $info)) {
                        $info['slug'] = $this->checkSlugExists($info['slug'], $table, $insert_id);
                        $info2['slug'] = $info['slug'];
                        $this->common_model->update($table, $info2, "id=" . $insert_id);
                        $this->insert_slug($info, $table, $insert_id);
                    }
                    $data['result'] = 1;
                } else {
                    $data['result'] = 0;
                }
            }

            $incc = 0;
            while ($incc < sizeof($_FILES['product_images']['name'])) {
                if ($_FILES['product_images']['error'][$incc] != 4) {
                    $file_new_name = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['product_images']["name"][$incc], PATHINFO_EXTENSION));
                    if ($this->product_images_upload('product_images', $file_new_name, 'uploads/products/', $incc) == true) {
                        $info1['product_id'] = $insert_id;
                        $info1['file_name'] = $file_new_name;
                        if ($this->common_model->insert('tbl_product_images', $info1)) {
                            $data['result'] = 1;
                        } else {
                            $data['result'] = 0;
                        }
                    }
                }
                $incc++;
            }
        }
        echo json_encode($data);
    }

    function update_product() {
        if ($this->isAdmin() == TRUE) {
            $data['result'] = 0;
        } else {
            $info = array();
            foreach ($_POST as $key => $value) {
                if ($key != 'table_name' && $key != 'row_id' && $key != 'product_1') {
                    if ($key == 'slug') {
                        $info[$key] = $this->slugify($this->input->post('name'));
                    } else {
                        $info[$key] = $value;
                    }
                }
            }

            $child_category = $this->input->post('child_category');

            $sub_cat = "";
            $parent_cat = "";
            $child_cat = "";

            foreach ($child_category as $child_category_explode_val) {
                $parent_cat = $parent_cat . $this->common_model->get_record("tbl_child_category", "id=" . $child_category_explode_val, "category_id") . ",";
                $sub_cat = $sub_cat . $this->common_model->get_record("tbl_child_category", "id=" . $child_category_explode_val, "sub_category_id") . ",";
                $child_cat = $child_cat . $child_category_explode_val . ",";
            }

            $parent_cat = substr($parent_cat, 0, -1);
            $sub_cat = substr($sub_cat, 0, -1);
            $child_cat = substr($child_cat, 0, -1);

            $info['category'] = $parent_cat;
            $info['sub_category'] = $sub_cat;
            $info['child_category'] = $child_cat;

            $table = $this->input->post('table_name');
            $row_id = $this->input->post('row_id');

            if (sizeof($_FILES) > 0) {
                $folder_name = 'products';

                foreach ($_FILES as $key => $value) {
                    $file_new_name = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES[$key]["name"], PATHINFO_EXTENSION));
                    if ($this->image_upload($key, $file_new_name, 'uploads/' . $folder_name . '/') == true) {
                        $info[$key] = $file_new_name;
                    }
                }
                if ($this->common_model->update($table, $info, "id = '" . $row_id . "'")) {
                    if (array_key_exists('slug', $info)) {
                        $info['slug'] = $this->checkSlugExists($info['slug'], $table, $row_id);
                        $info2['slug'] = $info['slug'];
                        $this->common_model->update($table, $info2, "id=" . $row_id);
                        $this->update_slug($info, $table, $row_id);
                    }
                    $data['result'] = 1;
                } else {
                    $data['result'] = 0;
                }
            } else {
                if ($this->common_model->update($table, $info, "id = '" . $row_id . "'")) {
                    if (array_key_exists('slug', $info)) {
                        $info['slug'] = $this->checkSlugExists($info['slug'], $table, $row_id);
                        $info2['slug'] = $info['slug'];
                        $this->common_model->update($table, $info2, "id=" . $row_id);
                        $this->update_slug($info, $table, $row_id);
                    }
                    $data['result'] = 1;
                } else {
                    $data['result'] = 0;
                }
            }
        }

        echo json_encode($data);
    }

    function tags_insert() {

        $table = $this->input->post('table_name');
        $row_id = $this->input->post('row_id');
        $info['tags'] = $this->input->post('tags');

        if ($this->common_model->update($table, $info, "id = '" . $row_id . "'")) {

            $data['result'] = 1;
        } else {
            $data['result'] = 0;
        }
    }

    function update() {
        if ($this->isAdmin() == TRUE) {
            $data['result'] = 0;
        } else {
            $info = array();
            foreach ($_POST as $key => $value) {
                if ($key != 'table_name' && $key != 'row_id' && $key != 'product_1') {
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
            $row_id = $this->input->post('row_id');

            if ($this->input->post('video_url[]')) {
                $info['video_url'] = implode(",", $this->input->post('video_url[]'));
            }
            if ($this->input->post('similar_properties[]')) {
                $info['similar_properties'] = implode(",", $this->input->post('similar_properties[]'));
            }
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
                if ($this->common_model->update($table, $info, "id = '" . $row_id . "'")) {
                    if (array_key_exists('slug', $info)) {
                        $info['slug'] = $this->checkSlugExists($info['slug'], $table, $row_id);
                        $info2['slug'] = $info['slug'];
                        $this->common_model->update($table, $info2, "id=" . $row_id);
                        $this->update_slug($info, $table, $row_id);
                    }
                    $data['result'] = 1;
                } else {
                    $data['result'] = 0;
                }
            } else {
                if ($this->common_model->update($table, $info, "id = '" . $row_id . "'")) {
                    if (array_key_exists('slug', $info)) {
                        $info['slug'] = $this->checkSlugExists($info['slug'], $table, $row_id);
                        $info2['slug'] = $info['slug'];
                        $this->common_model->update($table, $info2, "id=" . $row_id);
                        $this->update_slug($info, $table, $row_id);
                    }
                    $data['result'] = 1;
                } else {
                    $data['result'] = 0;
                }
            }
        }
        echo json_encode($data);
    }

    function update_admin_user() {
        if ($this->isAdmin() == TRUE) {
            $data['result'] = 0;
        } else {
            $info = array();
            foreach ($_POST as $key => $value) {
                if ($key != 'table_name' && $key != 'row_id' && $key != 'product_1') {
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
            $row_id = $this->input->post('row_id');
            if ($this->common_model->update($table, $info, "userId = '" . $row_id . "'")) {
                if (array_key_exists('slug', $info)) {
                    $info['slug'] = $this->checkSlugExists($info['slug'], $table, $row_id);
                    $info2['slug'] = $info['slug'];
                    $this->common_model->update($table, $info2, "userId=" . $row_id);
                    $this->update_slug($info, $table, $row_id);
                }
                $data['result'] = 1;
            } else {
                $data['result'] = 0;
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

            $this->common_model->insert('tbl_slug', $info1);
        }
    }

    function update_slug($info = '', $table = '', $row_id = '') {
        if (array_key_exists("slug", $info)) {
            $info1['slug'] = $info['slug'];

            $where = '';

            if ($table == 'tbl_category') {
                $where = 'category_id=' . $row_id;
            }
            if ($table == 'tbl_sub_category') {
                $where = 'sub_category_id=' . $row_id;
            }
            if ($table == 'tbl_child_category') {
                $where = 'child_category_id=' . $row_id;
            }
            if ($table == 'tbl_pages') {
                $where = 'page_id=' . $row_id;
            }
            if ($table == 'tbl_product') {
                $where = 'product_id=' . $row_id;
            }
            if ($table == 'tbl_brands') {
                $where = 'brand_id=' . $row_id;
            }

            if ($this->common_model->update('tbl_slug', $info1, $where) == true) {
                return true;
            } else {
                return false;
            }
        }
    }

    function update_product_slug($info = '', $table = '', $where = '') {
        if (array_key_exists("slug", $info)) {
            $info1['slug'] = $info['slug'];

            if ($this->common_model->update('tbl_slug', $info1, $where) == true) {
                return true;
            } else {
                return false;
            }
        }
    }

    function image_upload($atr_name, $file_new_name, $target_dir) {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($_FILES[$atr_name]["name"], PATHINFO_EXTENSION));
        $target_file = $target_dir . $file_new_name;
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        /* if ($_FILES[$atr_name]["size"] > 500000) {
          $uploadOk = 0;
          } */
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

    function product_image_upload($atr_name, $file_new_name, $target_dir) {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($_FILES[$atr_name]["name"], PATHINFO_EXTENSION));
        $target_file = $target_dir . $file_new_name;
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        /* if ($_FILES[$atr_name]["size"] > 500000) {
          $uploadOk = 0;
          } */
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

    function multiple_images_upload($atr_name, $file_new_name, $target_dir, $incc) {
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

    function property() {
        $this->global['records'] = $this->common_model->get_records('tbl_property_details', "status = '0' and post_status!='OP' order by date_time desc");
        $this->loadViews("item-product-page", $this->global);
    }

    function admindashboard() {
        // $this->global['records']=$this->common_model->get_records('tbl_property_details', "status = '0' order by date_time desc");
        $this->loadViews("admin-dashboard", $this->global);
    }

    function edit_property($id) {
        $this->global['records'] = $this->common_model->get_records('tbl_property_details', "status = '0' and id='$id' order by date_time desc");
        $this->loadViews("edit-product-page", $this->global);
    }

    function user_registration() {
        $this->global['records'] = $this->common_model->get_records('tbl_general_users', "status = '0' order by date_time desc");
        $this->loadViews("user-registration", $this->global);
    }

    function user_list($id, $value) {

        if ($value == 1) {
            $lists = $this->common_model->get_custom_query("select user_id from tbl_user_wishlist where status = '0' and item_id='$id' order by date_time desc");
            $user = array();
            foreach ($lists as $list) {
                array_push($user, $list->user_id);
            }
        } else if ($value == 2) {
            $lists = $this->common_model->get_custom_query("select user_id from tbl_user_reviews where status = '0' and property_id='$id' order by Updated_time desc");
            $user = array();
            foreach ($lists as $list) {
                array_push($user, $list->user_id);
            }
        } else if ($value == 3) {
            $lists = $this->common_model->get_custom_query("select login_id from tbl_recently_viewed where status = '0' and item_id='$id' order by date_time desc");
            $user = array();
            foreach ($lists as $list) {
                array_push($user, $list->login_id);
            }
        }

        $listuser = implode(",", $user);

        if (sizeof($listuser) > 0 && $listuser[0] != '' && $listuser[0] != ',') {


            $this->global['records'] = $this->common_model->get_custom_query("select * from tbl_general_users where status = '0' and id IN ($listuser) order by date_time desc");
        } else {
            $this->global['records'] = array();
        }
        $this->loadViews("user-registration", $this->global);
    }

    function builder_registration() {
        $this->global['records'] = $this->common_model->get_records('tbl_builder_register', "status = '0' order by date_time desc");
        $this->loadViews("builder-registration", $this->global);
    }

    function update_amenities() {
        $id = $this->input->post('id');
        $info['ameneties'] = implode(",", $this->input->post('amenities[]'));
        $this->common_model->update('tbl_property_details', $info, "status = '0' and id='$id'");
        $data['result'] = 1;
        echo json_encode($data);
    }

    function builder_image_update() {
        $data = array();

        $row_id = $this->input->post('row_id');
        $this->load->library('upload');
        $dataInfo = array();
        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);

        if ($_FILES['userfile']['name'][0] != '') {
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
            $data['image'] = implode(",", $a);
        }
        $dataInfo2 = array();
        $cpt = count($_FILES['file']['name']);

        if ($_FILES['file']['name'][0] != '') {
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
            $data['attachment'] = implode(",", $b);
        }
        if ($_FILES['profile_image']['name'] != '') {
            $store_profile_image = date('Ydm') . time() . uniqid() . "." . strtolower(pathinfo($_FILES['profile_image']["name"], PATHINFO_EXTENSION));
            if ($this->image_upload('profile_image', $store_profile_image, 'uploads/common/') == true) {
                $data['profile_image'] = $store_profile_image;
            }
        }




        $insert_id = $this->common_model->update('tbl_property_images', $data, "id='$row_id'");
        if ($insert_id) {
            $data['result'] = 1;
        }
        echo json_encode($data);
    }

    function approve() {
        $row_id = $this->input->post('row_id');
        $info['post_status'] = $this->input->post('post_status');

        $data['result'] = 0;


        if ($this->common_model->update("tbl_courses", $info, "id='$row_id'")) {
            $data['result'] = 1;
        }


        echo json_encode($data);
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
            if ($this->common_model->insert("tbl_property_details", $info)) {
                $data['result'] = 1;
                $data['uniq_id'] = $info['uniq_id'];
                $_SESSION['form'] = 3;
                $_SESSION['id'] = $info['uniq_id'];
                $_SESSION['form_id'] = $info['uniq_id'];
            }
        } else {
            $info['uniq_id'] = $form1_id;
            if ($this->common_model->update("tbl_property_details", $info, "uniq_id='$form1_id'")) {
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
            $this->common_model->update("tbl_property_location", $info, "uniq_id='$id'");

            $data['result'] = 1;
            $data['uniq_id'] = $info['uniq_id'];
            $_SESSION['form'] = 4;
        } else {
            $insert_id = $this->common_model->insert("tbl_property_location", $info);
            if ($insert_id) {
                $info2['location_id'] = $insert_id;
                $this->common_model->update('tbl_property_details', $info2, "uniq_id = '$id'");
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
        $info['area_size'] = $this->input->post('property_size');
        $info['size_prefix'] = $this->input->post('size_prefix');
        $info['landarea'] = $this->input->post('landarea');
        $info['landarea_size_postfix'] = $this->input->post('landarea_sizeprefix');
        $info['bedrooms'] = $this->input->post('bedrooms');
        $info['bathrooms'] = $this->input->post('bathrooms');
        $info['balconies'] = $this->input->post('balconies');
        $info['is_your_property'] = $this->input->post('is_your_property');
        $info['floor_no'] = $this->input->post('floor_no');
        $info['total_floors'] = $this->input->post('total_floors');
        $info['car_parking_area'] = $this->input->post('car_parking_area');
        $info['no_of_car_parking'] = $this->input->post('no_of_car_parking');
        $info['garages'] = $this->input->post('garage');
        $info['garages_size'] = $this->input->post('garage_size');

        $info['transaction_type'] = $this->input->post('transaction_type');
        $info['possession_status'] = $this->input->post('possession_status');
        $info['month_a'] = $this->input->post('month_a');
        $info['year_a'] = $this->input->post('year_a');
        $info['age_of_construction'] = $this->input->post('age_of_construction');
        $info['year_built'] = $this->input->post('year_built');
        $info['video_url'] = implode(",", $this->input->post('video_url[]'));

        $info['map'] = $this->input->post('map');
        $info['virtual_tour'] = $this->input->post('virtual_tour');
        $info['education'] = $this->input->post('education');
        $info['health'] = $this->input->post('health');
        $info['transport'] = $this->input->post('transport');
        $info['edistance'] = $this->input->post('edistance');
        $info['hdistance'] = $this->input->post('hdistance');
        $info['tdistance'] = $this->input->post('tdistance');

        $arr = implode(",", $this->input->post('amenities[]'));

        $features = implode(",", $this->input->post('features[]'));

        $info['uniq_id'] = $this->input->post('uniq_id');
        $id = $info['uniq_id'];

        if ($_SESSION['count2'] == 1) {
            $this->common_model->update("tbl_detailed_property_info", $info, "uniq_id = '$id'");
            $info2['ameneties'] = $arr;
            $info2['features'] = $features;
            $this->common_model->update('tbl_property_details', $info2, "uniq_id = '$id'");
            $data['result'] = 1;
            $data['uniq_id'] = $info['uniq_id'];
            $_SESSION['form'] = 5;
            $data['update'] = "true";
        } else {
            $insert_id = $this->common_model->insert("tbl_detailed_property_info", $info);
            if ($insert_id) {
                $info3['property_id'] = "Prop000" . $insert_id;
                $this->common_model->update('tbl_detailed_property_info', $info3, "uniq_id = '$id'");

                $info2['ameneties'] = $arr;
                $info2['features'] = $features;
                $info2['detailed_property_info_id'] = $insert_id;
                $this->common_model->update('tbl_property_details', $info2, "uniq_id = '$id'");
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
                $info['image'] = $store_profile_image;
            }
        }

        $insert_id = $this->common_model->insert('tbl_property_images', $info);
        if ($insert_id) {
            $id = $info['uniq_id'];
            $info2['property_image_id'] = $insert_id;
            $this->common_model->update('tbl_property_details', $info2, "uniq_id = '$id'");
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
            $this->common_model->update("tbl_floor_plans", $info, "uniq_id = '$id'");
            //$info2['floor_plans_id']=$insert_id;

            $data['result'] = 1;
            $data['uniq_id'] = $info['uniq_id'];
            $_SESSION['form'] = 5;
            $data['update'] = "true";
        } else {
            $insert_id = $this->common_model->insert("tbl_floor_plans", $info);
            if ($insert_id) {
                $id = $info['uniq_id'];
                $info2['floor_plans_id'] = $insert_id;
                //$info2['post_status']='W';
                $this->common_model->update('tbl_property_details', $info2, "uniq_id = '$id'");

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
        $insert_id = $this->common_model->insert("tbl_additional_info", $info);
        if ($insert_id) {
            $id = $info['uniq_id'];
            $info2['additional_info_id'] = $insert_id;
            $info2['post_status'] = 'W';
            $this->common_model->update('tbl_property_details', $info2, "uniq_id = '$id'");

            $data['result'] = 1;
            $data['uniq_id'] = $info['uniq_id'];
            $data['url'] = base_url();
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

        $data['attachment'] = implode(",", $b);
        $data['uniq_id'] = $this->input->post('uniq_id');
        $id = $data['uniq_id'];

        if ($_SESSION['count3'] == 1) {
            $this->common_model->update('tbl_property_images', $data, "uniq_id = '$id'");

            $id = $data['uniq_id'];
            $dat['result'] = 1;
            $_SESSION['form'] = 6;
        } else {
            $insert_id = $this->common_model->insert('tbl_property_images', $data);
            if ($insert_id) {
                $id = $data['uniq_id'];
                $info2['property_image_id'] = $insert_id;
                $this->common_model->update('tbl_property_details', $info2, "uniq_id = '$id'");
                $dat['result'] = 1;
                $_SESSION['form'] = 6;
                $_SESSION['count3'] = 1;
            }
        }
        echo json_encode($dat);
    }

    public function builder_properties($id) {
        $this->global['records'] = $this->common_model->get_records('tbl_property_details', "status='0' and builders_info_id='$id'");

        $this->loadViews("builder-properties", $this->global);
    }

    function insert_form7() {

        $info = array();
        $title = $this->input->post('title[]');
        $description = $this->input->post('description[]');
        $url = $this->input->post('url[]');
        $count = count($url);

        $info['course_id'] = $this->input->post('course_title');
        $info['course_type'] = $this->input->post('course_type');
        $info['curriculum'] = $this->input->post('curriculum');
        $info['curriculum_title'] = $this->input->post('curriculum_title');
        $item = $this->common_model->insert("tbl_videos", $info);
        $info2['video_id'] = $item;
        for ($i = 0; $i < $count; $i++) {
            $info2['title'] = $title[$i];
            $info2['description'] = $description[$i];
            $info2['url'] = $url[$i];
            $this->common_model->insert("tbl_video_content", $info2);
        }
        $data['result'] = 1;

        echo json_encode($data);
    }

    function update_form7() {
        $info = array();
        $id = $this->input->post('id');
        $id2 = $this->input->post('id2[]');
        $title = $this->input->post('title[]');
        $description = $this->input->post('description[]');
        $url = $this->input->post('url[]');
        $count = count($url);

        $info['course_id'] = $this->input->post('course_title');
        $info['course_type'] = $this->input->post('course_type');
        $info['curriculum'] = $this->input->post('curriculum');
        $info['curriculum_title'] = $this->input->post('curriculum_title');
        $this->common_model->update("tbl_videos", $info, "id='$id' and status='0'");

        for ($i = 0; $i < $count; $i++) {
            $info2['title'] = $title[$i];
            $info2['description'] = $description[$i];
            $info2['url'] = $url[$i];
            $this->common_model->update("tbl_video_content", $info2, "video_id='$id' and id='$id2[$i]' and status='0'");
        }
        $data['result'] = 1;

        echo json_encode($data);
    }

}

?>