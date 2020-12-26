<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "Frontend";
$route['404_override'] = 'frontend/pageNotFound';


/************ Mera English Admin Routes *******/

$route['admin/add_course'] = "admin/category/add_course";

$route['admin/course_list'] = "admin/category/course_list";
$route['admin/edit-video/(:any)'] = "admin/category/edit_video/$1";
$route['admin/edit-text/(:any)'] = "admin/category/edit_text/$1";
$route['admin/edit-video-content/(:any)/(:any)'] = "admin/category/edit_video_content/$1/$2";
$route['admin/edit-text-content/(:any)/(:any)'] = "admin/category/edit_text_content/$1/$2";
$route['admin/add_video'] = "admin/category/add_video";
$route['admin/add_text'] = "admin/category/add_text";

$route['admin/banner'] = "admin/category/banner";
$route['admin/newsletter'] = "admin/category/newsletter";
$route['admin/success_stories'] = "admin/category/success_stories";
$route['admin/contact_list'] = "admin/category/contact_list";
$route['admin/grievance'] = "admin/category/grievance";

/*********** mera english FRONTEND ROUTES *******************/

$route['course-list']="frontend/course_list";
$route['about-us']="frontend/about_us";

$route['search']= 'frontend/search';
$route['search-title']= 'frontend/search_title';
$route['search-product']= 'frontend/search_product';
$route['search-product-title']= 'frontend/search_product_title';

$route['cources-details(:any)']="frontend/course_details/$1";


$route['form_forget_password'] = "frontend/form_forget_password_post";
$route['change_password'] = "frontend/change_user_password";
$route['blog']="frontend/blog_list";
$route['blog-detail']="frontend/blog_details";
$route['media-coverage']="frontend/media_coverage";
$route['subscribe'] = 'frontend/subscribe';
$route['payment-success/(:any)'] = 'frontend/payment_success/$1';
$route['payment-failure'] = 'frontend/payment_failure';
$route['contact-form-post'] = 'frontend/contact_form_post';
$route['comment-form-post'] = 'frontend/comment_form_post';
$route['review-form-post'] = 'frontend/review_form_post';
$route['contact-admin'] = 'frontend/contact_admin';
$route['grievance-form'] = 'frontend/grievance_form';
$route['contact-us']="frontend/contact_form";
$route['checkout']="frontend/checkout";
$route['billing']="frontend/billing_value";
$route['cources-details/(:any)'] = "frontend/cources_details/$1";
$route['reviews']= "frontend/reviews";


$route['invoice/(:any)'] = "frontend/invoice/$1";





$route['registerPost'] = 'frontend/registerPost';

$route['logout'] = 'frontend/logout';

$route['add-to-cart'] = 'frontend/add_to_cart';

$route['remove-cart-item'] = 'frontend/remove_cart_item';
$route['cart'] = 'frontend/cart';

$route['update-cart'] = 'frontend/update_cart';
$route['update'] = 'frontend/update';
$route['loginPost'] = 'frontend/loginPost';

$route['student-dashboard'] = 'frontend/student_dashboard';
$route['my-profile'] = 'frontend/student_profile';
$route['my-courses'] = 'frontend/my_courses';
$route['my-courses-video-page'] = 'frontend/my_courses_video_page';


$route['my-courses-details/(:any)'] = 'frontend/my_courses_details/$1';
$route['my-courses-video-page/(:any)/(:any)'] = 'frontend/my_courses_video_page/$1/$2';

$route['other-courses'] = 'frontend/other_courses';
$route['my-order'] = 'frontend/my_order';
$route['change-password'] = 'frontend/change_password';
$route['reviews'] = 'frontend/reviews';
$route['dashboard-faq'] = 'frontend/dashboard_faq';
$route['faq'] = 'frontend/faq';
$route['privacy-policy'] = 'frontend/privacy_policy';
$route['forget-password'] = 'frontend/forget_password';
$route['support'] = 'frontend/support';
$route['login'] = 'frontend/student_logout';

$route['clients'] = 'frontend/clients';

$route['checkoutPost'] = 'frontend/checkoutPost';
$route['checkoutPostFree'] = 'frontend/checkoutPostFree';
$route['checkout'] = 'frontend/checkout';
$route['payment/(:any)'] = 'frontend/checkoutpayment/$1';

$route['product-order/update-payment-details'] = 'frontend/product_order_update_payment_details';


/*********** ADMIN ROUTES *******************/
$route['builder/login'] = 'admin/login1/builder_login';
$route['builder/builder-dashboard'] = "admin/login1/builder_dashboard";
$route['builder/builder-login'] = "admin/login1/builder_login_validation";
$route['builder/logout'] = "admin/login1/logout";

$route['builder/profile'] = "admin/login1/builder_profile";
$route['builder/property-list/(:any)'] = "admin/login1/property_list/$1";

$route['builder/property'] = "admin/login1/builder_property_list";



$route['builder/builder-update'] = "admin/login1/update";
$route['builder/builder-image-update'] = "admin/login1/builder_image_update";
$route['builder/add-property'] = "admin/login1/add_property";
$route['builder/property/(:any)'] = "admin/login1/edit_property/$1";
$route['builder/update-amenities'] = "admin/login1/update_amenities";
$route['builder/delete'] = "admin/login1/delete";
$route['builder/builder_change_password'] = "admin/login1/change_password";
$route['builder/builder-properties/(:any)'] = "admin/login1/builder_properties/$1";
$route['builder/enquiry-list/(:any)'] = "admin/login1/builder_enquiry_list/$1";




$route['admin'] = 'admin/login/loginMe';
$route['admin/loginMe'] = 'admin/login/loginMe';
//$route['admin/dashboard'] = 'admin/common_controller/index';

$route['admin/admin_add_property'] = "admin/category/admin_add_property";
$route['admin/builder-properties/(:any)'] = "admin/common_controller/builder_properties/$1";
$route['admin/enquiry-list/(:any)'] = "admin/category/builder_enquiry_list/$1";
$route['admin/enquiry/(:any)'] = "admin/category/enquiry/$1";
$route['admin/user-enquiry/(:any)'] = "admin/category/user_enquiry/$1";
$route['admin/activate'] = "admin/common_controller/activate";
$route['admin/report'] = "admin/category/report";
$route['admin/dashboard'] = 'admin/category/index';
$route['admin/approve'] = 'admin/common_controller/approve';
$route['admin/builder-image-update'] = "admin/common_controller/builder_image_update";
$route['admin/logout'] = 'admin/common_controller/logout';
$route['admin/userListing'] = 'admin/user/userListing';
$route['admin/userListing/(:num)'] = "admin/user/userListing/$1";
$route['admin/addNew'] = "admin/user/addNew";

$route['admin/addNewUser'] = "admin/user/addNewUser";
$route['admin/editOld'] = "admin/user/editOld";
$route['admin/editOld/(:num)'] = "admin/user/editOld/$1";
$route['admin/editUser'] = "admin/user/editUser";
$route['admin/deleteUser'] = "admin/user/deleteUser";
$route['admin/loadChangePass'] = "admin/user/loadChangePass";
$route['admin/changePassword'] = "admin/user/changePassword";
$route['admin/pageNotFound'] = "admin/user/pageNotFound";
$route['admin/checkEmailExists'] = "admin/user/checkEmailExists";

$route['admin/forgotPassword'] = "admin/login/forgotPassword";
$route['admin/resetPasswordUser'] = "admin/login/resetPasswordUser";
$route['admin/resetPasswordConfirmUser'] = "admin/login/resetPasswordConfirmUser";
$route['admin/resetPasswordConfirmUser/(:any)'] = "admin/login/resetPasswordConfirmUser/$1";
$route['admin/resetPasswordConfirmUser/(:any)/(:any)'] = "admin/login/resetPasswordConfirmUser/$1/$2";
$route['admin/createPasswordUser'] = "admin/login/createPasswordUser";


$route['admin/insert_cat_slider_data'] = "admin/common_controller/insert_cat_slider_data";
$route['admin/categories'] = "admin/category/list_category_page";


$route['admin/sub-categories'] = "admin/category/list_sub_category_page";


$route['admin/enquiry_list'] = "admin/category/enquiry_list";

$route['admin/text-edit-form'] = "admin/category/text_edit_form";
$route['admin/text-edit-form-one'] = "admin/category/text_edit_form_one";

$route['admin/location'] = "admin/category/location";
$route['admin/builder'] = "admin/category/builder";
$route['admin/buildupAr'] = "admin/category/buildupAr";
$route['admin/city'] = "admin/category/city";
$route['admin/amenities'] = "admin/category/amenities";
$route['admin/yearbuilt'] = "admin/category/yearbuilt";
$route['admin/bhk'] = "admin/category/bhk";
$route['admin/sub_location'] = "admin/category/sub_location";

$route['admin/join_venture'] = "admin/category/join_venture";

$route['admin/free-evaluation'] = "admin/category/free_evaluation";

$route['admin/category'] = "admin/category/category";
$route['admin/sub-category'] = "admin/category/sub_category";

$route['admin/property_status'] = "admin/category/property_status";
$route['admin/property_type'] = "admin/category/property_type";
$route['admin/transaction_type'] = "admin/category/transaction_type";
$route['admin/possession_status'] = "admin/category/possession_status";

$route['admin/Freeevaluation'] = "admin/category/Freeevaluation";
$route['admin/what_are_you_looking_for'] = "admin/category/what_are_you_looking_for";
$route['admin/Property_section'] = "admin/category/Property_section";
$route['admin/Realestate'] = "admin/category/Realestate";
$route['admin/Testimonialtitle'] = "admin/category/Testimonialtitle";
$route['admin/Slidersection'] = "admin/category/Slidersection";
$route['admin/clientstitle'] = "admin/category/clientstitle";
$route['admin/clientssection'] = "admin/category/clientssection";
$route['admin/partnertitle'] = "admin/category/partnertitle";
$route['admin/partnersection'] = "admin/category/partnersection";

$route['admin/clients'] = "admin/category/clients";
$route['admin/corporates'] = "admin/category/corporates";
$route['admin/child-categories'] = "admin/category/list_child_category_page";


$route['admin/deletecats'] = "admin/common_controller/deletecats";


$route['admin/update_amenities'] = "admin/common_controller/update_amenities";


$route['admin/banner'] = "admin/category/banner";
$route['admin/users'] = "admin/category/users";

$route['admin/fileinsert'] = "admin/common_controller/banner";



$route['admin/file_update'] = "admin/common_controller/file_update";
$route['admin/select-course-type'] = "admin/category/select_course_type";

$route['admin/technical-specifications'] = "admin/Product/technical_specifications";

$route['admin/brands'] = "admin/Product/brands";
$route['admin/orders'] = "admin/common_controller/orders";
$route['admin/order-details/(:any)'] = "admin/common_controller/order_details/$1";
$route['admin/customers'] = "admin/common_controller/customers";

$route['admin/insert'] = "admin/common_controller/insert";


$route['admin/insert_product'] = "admin/common_controller/insert_product";
$route['admin/update_product'] = "admin/common_controller/update_product";

$route['admin/update'] = "admin/common_controller/update";
$route['admin/update-admin-user'] = "admin/common_controller/update_admin_user";

$route['admin/tags_insert'] = "admin/common_controller/tags_insert";

$route['admin/get_records'] = "admin/common_controller/get_records";
$route['admin/delete_data'] = "admin/common_controller/delete_data";
$route['admin/delete_data_2'] = "admin/common_controller/delete_data_2";
$route['admin/get-table-data'] = "admin/common_controller/get_table_data";

$route['admin/header-menu'] = "admin/common_controller/header_menu";
$route['admin/top-header'] = "admin/common_controller/top_header";
$route['admin/bottom-footer'] = "admin/common_controller/bottom_footer";

$route['admin/products'] = "admin/Product/list_product_page";

$route['admin/productlist'] = "admin/Product/list_product";
$route['admin/product/(:any)'] = "admin/Product/edit_product_page/$1";
$route['admin/add-product'] = "admin/Product/add_product_page";
$route['admin/product-additional-images/(:any)'] = "admin/common_controller/product_additional_images/$1";

$route['admin/update_header_menu'] = "admin/common_controller/update_header_menu";
$route['admin/menu-header-images'] = "admin/common_controller/menu_header_images";
$route['admin/menu_header_images_post'] = "admin/common_controller/menu_header_images_post";

$route['admin/sections'] = "admin/common_controller/list_sections_page";

$route['admin/stores'] = "admin/common_controller/stores";
$route['admin/coupons'] = "admin/common_controller/coupons";
$route['admin/used_coupons'] = "admin/common_controller/used_coupons";

$route['admin/new-page'] = "admin/common_controller/new_page";
$route['admin/pages'] = "admin/common_controller/pages";
$route['admin/page-editor/(:any)'] = "admin/common_controller/page_editor/$1";
$route['admin/edit-page/(:any)'] = "admin/common_controller/edit_page/$1";
$route['admin/update_page_sections'] = "admin/common_controller/update_page_sections";
$route['admin/page/section/(:any)/(:any)'] = "admin/common_controller/update_page_section/$1/$2";

$route['admin/contact-form'] = "admin/common_controller/contact_form";
$route['admin/order-help-center'] = "admin/common_controller/order_help_center";
$route['admin/product-enquiry'] = "admin/common_controller/product_enquiry";

$route['admin/property'] = "admin/common_controller/property";

$route['admin/status-update'] = "admin/common_controller/status_update";
$route['admin/isfront'] = "admin/common_controller/isfront";


$route['admin/form1'] = "admin/common_controller/insert_form1";


$route['admin/form2'] = "admin/common_controller/insert_form2";


$route['admin/form3'] = "admin/common_controller/insert_form3";


$route['admin/form4'] = "admin/common_controller/form4d";


$route['admin/form5'] = "admin/common_controller/insert_form5";
$route['admin/form6'] = "admin/common_controller/insert_form6";
$route['admin/form7'] = "admin/common_controller/insert_form7";
$route['admin/update_form7'] = "admin/common_controller/update_form7";

$route['admin/admin-joint-ventures'] = "admin/category/admin_joint_ventures";
$route['admin/admin-evaluation'] = "admin/category/admin_evaluation";
$route['admin/admin-residential'] = "admin/category/admin_residential";


$route['admin/tags'] = "admin/category/tags";



$route['admin/feature'] = "admin/category/feature";



$route['admin/admindashboard'] = "admin/common_controller/admindashboard";

$route['admin/property/(:any)'] = "admin/common_controller/edit_property/$1";



$route['admin/assign_tags/(:any)'] = "admin/common_controller/assign_tags/$1";


$route['admin/property-list/(:any)'] = "admin/category/property_list/$1";

$route['admin/property-list/(:any)/(:any)'] = "admin/category/user_property_list/$1/$2";
$route['admin/user-registration'] = "admin/common_controller/user_registration";
$route['admin/user/(:any)/(:any)'] = "admin/common_controller/user_list/$1/$2";

$route['admin/builder-registration'] = "admin/common_controller/builder_registration";

$route['admin/settings'] = "admin/category/settings";
$route['admin/text-content-edit/(:any)'] = "admin/category/text_content_edit/$1";

$route['admin/media-coverage'] = "admin/category/media_coverage";

/*********** Builder ROUTES *******************/







$route['ventures']="frontend/ventures";

$route['update-amenities'] = "frontend/update_amenities";
$route['detail/(:any)'] = "frontend/detail_page/$1";
$route['builder-list/(:any)'] = "frontend/builder_list/$1";
$route['(:any)'] = 'frontend/control_function/$1/20';
$route['(:any)/(:any)'] = 'frontend/control_function/$1/$2';

