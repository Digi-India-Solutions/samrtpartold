<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Frontend');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(
    function(){
       return view('frontend/404');
    }
    );
$routes->setAutoRoute(true);



/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// FRONTEND

$routes->get('/', 'Frontend::index');
$routes->get('/pre_test_function', 'Frontend::pre_test_function');

$routes->get('home', 'Frontend::index');
$routes->get('about-us','Frontend::about');
$routes->get('brands','Frontend::brands');
$routes->get('contact-us','Frontend::contact'); 
$routes->get('products','Frontend::products');    


$routes->post('reset_save','Frontend::reset_save');


$routes->post('quotation','Frontend::quotation');

$routes->get('careers','Frontend::careers');
$routes->post('subscribe','Frontend::subscribe');
$routes->post('send_enquiry','Frontend::send_enquiry');
$routes->get('booking','Frontend::booking');
$routes->get('product-listing','Frontend::product_listing');
$routes->get('product-detail','Frontend::product_detail');
$routes->get('insurance','Frontend::insurance');
$routes->get('accessories','Frontend::accessories');
$routes->get('finance','Frontend::finance');
$routes->get('finance-application','Frontend::finance_application');
$routes->get('four-wheeler','Frontend::four_wheeler');
$routes->post('save_user_registration','Frontend::save_user_registration');
$routes->post('user_login','Frontend::user_login');
$routes->get('blogs','Frontend::blogs');
$routes->get('blog/(:any)','Frontend::blog_detail/$1');
$routes->get('blog-detail','Frontend::blog_detail');
$routes->get('search','Product::search');
$routes->get('thank-you','Frontend::thank_you');
$routes->get('forgot','Frontend::forgot');
$routes->get('reset-password/(:any)/(:any)','Frontend::reset_password/$1/$2');
$routes->post('get_state','Frontend::get_state');
$routes->get('login','Frontend::login');
$routes->get('sign-up','Frontend::sign_up');

$routes->get('faqs','Frontend::info');
$routes->get('terms-and-conditions','Frontend::info');
$routes->get('privacy-policy','Frontend::info');
$routes->post('update_company_info','Frontend::update_company_info');
// $routes->get('faq','Frontend::faq');

$routes->get('account-verify/(:any)','Frontend::account_verify');
$routes->post('search_result','Frontend::search_result');
$routes->post('forget_send','Frontend::forget_send');
$routes->match(['get','post'],'google_login','Frontend::google_login'); 
$routes->match(['get','post'],'facebook_login','Frontend::facebook_login'); 
$routes->match(['get','post'],'oem-brand/(:any)','Frontend::brand_category/$1'); 
$routes->post('cancel_newsletter','Frontend::cancel_newsletter');
$routes->post('save_career_enquiry','Frontend::save_career_enquiry');

//CART

$routes->post('add_to_cart_','Cart::add_to_cart');
$routes->post('update_cart_','Cart::update_cart');
$routes->post('Delete_cart_item_','Cart::delete_cart_item');
$routes->get('cart','Cart::cart');
$routes->get('checkout','Cart::checkout',['filter'=>'userLogin']);
$routes->post('check_coupan','Cart::check_coupan');
$routes->post('confirm','Cart::confirm',['filter'=>'userLogin']);
$routes->post('get_address_detail','Cart::get_address_detail');
$routes->match(['get','post'],'order-success','Cart::order_success'); 
$routes->match(['get','post'],'order-fail','Cart::order_fail'); 
$routes->match(['get','post'],'add_wishlist','Cart::add_wishlist'); 
$routes->match(['get','post'],'remove_wishlist','Cart::remove_wishlist'); 

$routes->get('cancel-coupon/(:any)','Cart::cancel_coupon/$1');




// PRODUCT

$routes->get('categories','Product::categories');
$routes->get('category/(:any)','Product::product_category/$1');

$routes->get('categories/(:any/(:any))','Product::product_detail/$1/$2');

$routes->get('brand/(:any)/(:any)/(:any)','Product::product_detail/$1/$2/$3');
$routes->get('brands/(:any)/(:any)','Product::brand_category/$1/$2');


$routes->get('product/(:any)','Product::product_detail/$1');
$routes->get('product-detail/(:any)','Product::product_detail/$1');
$routes->get('product-detail/(:any)/(:any)','Product::product_detail/$1/$2');
$routes->get('category/(:any)','Product::product_category/$1');
// $routes->get('product-detail/(:any)','Product::product_detail/$1');
$routes->post('send_product_enquiry','Product::send_product_enquiry');
$routes->post('send_review','Product::send_review');
$routes->post('get_product_ajax','Product::get_product_ajax');
$routes->post('get_product_review','Product::get_product_review');

$routes->get('most-popular-part','Product::most_popular_part');
$routes->post('get_most_product_part_ajax','Product::get_most_product_part_ajax');

$routes->post('get_brand_product_ajax','Product::get_brand_product_ajax');




// User controller

$routes->get('swift_code','User::swift_code',['filter' => 'userLogin']);

$routes->get('user','User::dashboard',['filter' => 'userLogin']);
$routes->get('dashboard','User::dashboard',['filter' => 'userLogin']);
$routes->get('my-orders','User::my_orders',['filter' => 'userLogin']);
$routes->get('cashback','User::cashback',['filter' => 'userLogin']);
$routes->get('car-booking','User::car_booking',['filter' => 'userLogin']);
$routes->get('logout','User::logout',['filter' => 'userLogin']);
$routes->post('update_user_profile','User::update_user_profile',['filter' => 'userLogin']);
$routes->post('change_user_password','User::change_user_password',['filter' => 'userLogin']);
$routes->post('update_user_address','User::update_user_address',['filter' => 'userLogin']);
$routes->get('my_address','User::my_address',['filter' => 'userLogin']);
$routes->match(['get','post'],'add_address','User::add_address',['filter' => 'userLogin']);
$routes->match(['get','post'],'add_address/(:num)','User::add_address/$1',['filter' => 'userLogin']); 
$routes->get('my_wishlist','User::my_wishlist',['filter' => 'userLogin']);
$routes->get('invoice/(:num)','User::invoice/$1',['filter' => 'userLogin']);
$routes->post('delete_user_address','User::delete_user_address',['filter' => 'userLogin']);


// Admin

//login
$routes->get('admin_console','AdminLogin::index');
$routes->post('admin_console/verify_','AdminLogin::Login_verifY_');



// Backend

$routes->get('admin','admin/Backend::index',['filter' => 'adminlogin']);
$routes->match(['get','post'],'admin/dashboard','admin/Backend::index');
$routes->get('admin/logout','admin/Backend::logout');
$routes->match(['get', 'post'], 'admin/profile', 'admin/Backend::profile');


$routes->get('admin/permission-denied','admin/Backend::permission_denied',['filter' => 'adminlogin']);


// Design controller
$routes->group('admin', function($routes)
{
    $routes->add('pages', 'admin/Design::index');
    $routes->add('add_pages', 'admin/Design::add_pages');
    $routes->add('add_pages/(:num)', 'admin\Design::add_pages/$1');
    $routes->post('delete_pages','admin/Design::delete_pages');

});

$routes->get('admin/slider','admin/Design::slider');
$routes->match(['get', 'post'], 'admin/add_slider', 'admin/Design::add_slider');
$routes->match(['get', 'post'], 'admin/add_slider/(:num)', 'admin\Design::add_slider/$1');
$routes->post('admin/delete_slider','admin/Design::delete_slider');




// Setting controller
$routes->get('admin/store','admin/Store::index');
$routes->match(['get', 'post'], 'admin/add_store', 'admin/Store::add_store');
$routes->post('admin/get_state_list','admin/Store::get_state_list');


$routes->get('admin/menu','admin/Setting::menu');
$routes->match(['get', 'post'], 'admin/add_menu', 'admin/Setting::add_menu');
$routes->match(['get', 'post'], 'admin/add_menu/(:num)', 'admin\Setting::add_menu/$1');

$routes->get('admin/user','admin/Setting::users');
$routes->match(['get', 'post'], 'admin/add_user', 'admin/Setting::add_user');
$routes->match(['get', 'post'], 'admin/add_user/(:num)', 'admin\Setting::add_user/$1');
$routes->post('admin/delete_users','admin/Setting::delete_users');

$routes->get('admin/front_menu','admin/Setting::front_menu');
$routes->match(['get', 'post'], 'admin/add_front_menu', 'admin/Setting::add_front_menu');
$routes->match(['get', 'post'], 'admin/add_front_menu/(:num)', 'admin\Setting::add_front_menu/$1');
$routes->post('admin/delete_front_menu','admin/Setting::delete_front_menu');

$routes->get('admin/user_group','admin/Setting::user_group');
$routes->match(['get', 'post'], 'admin/add_user_group', 'admin/Setting::add_user_group');
$routes->match(['get', 'post'], 'admin/add_user_group/(:num)', 'admin\Setting::add_user_group/$1');
$routes->post('admin/delete_user_group','admin/Setting::delete_user_group');


$routes->get('admin/stock_status','admin/Setting::stock_status');
$routes->match(['get', 'post'], 'admin/add_stock_status', 'admin/Setting::add_stock_status');
$routes->match(['get', 'post'], 'admin/add_stock_status/(:num)', 'admin\Setting::add_stock_status/$1');
$routes->post('admin/delete_stock_status','admin/Setting::delete_stock_status');

$routes->get('admin/order_status','admin/Setting::order_status');
$routes->match(['get', 'post'], 'admin/add_order_status', 'admin/Setting::add_order_status');
$routes->match(['get', 'post'], 'admin/add_order_status/(:num)', 'admin\Setting::add_order_status/$1');
$routes->post('admin/delete_order_status','admin/Setting::delete_order_status');


$routes->get('admin/country','admin/Setting::country');
$routes->get('admin/country/(:any)','admin/Setting::country/$1');
$routes->match(['get', 'post'], 'admin/add_country', 'admin/Setting::add_country');
$routes->match(['get', 'post'], 'admin/add_country/(:num)', 'admin\Setting::add_country/$1');
$routes->post('admin/delete_country','admin/Setting::delete_country');

$routes->get('admin/state','admin/Setting::state');
$routes->get('admin/state/(:any)','admin/Setting::state/$1');
$routes->match(['get', 'post'], 'admin/add_state', 'admin/Setting::add_state');
$routes->match(['get', 'post'], 'admin/add_state/(:num)', 'admin\Setting::add_state/$1');
$routes->post('admin/delete_state','admin/Setting::delete_state');
$routes->post('admin/get_pincode','admin/Setting::get_pincode');


$routes->get('admin/pincode','admin/Setting::pincode');
$routes->get('admin/pincode/(:any)','admin/Setting::pincode/$1');
$routes->match(['get', 'post'], 'admin/add_pincode', 'admin/Setting::add_pincode');
$routes->match(['get', 'post'], 'admin/add_pincode/(:num)', 'admin\Setting::add_pincode/$1');
$routes->post('admin/delete_pincode','admin/Setting::delete_pincode');
$routes->post('admin/import_pincode','admin/Setting::import_pincode');

$routes->get('admin/verify_pincode','admin/Setting::verify_pincode');
$routes->get('admin/verify_pincode/(:any)','admin/Setting::verify_pincode/$1');
$routes->match(['get', 'post'], 'admin/add_verify_pincode', 'admin/Setting::add_verify_pincode');
$routes->match(['get', 'post'], 'admin/add_verify_pincode/(:num)', 'admin\Setting::add_verify_pincode/$1');
$routes->post('admin/delete_verify_pincode','admin/Setting::delete_verify_pincode');
$routes->post('admin/import_verify_pincode','admin/Setting::import_verify_pincode');



$routes->get('admin/length_class','admin/Setting::length_class');
$routes->match(['get', 'post'], 'admin/add_length_class', 'admin/Setting::add_length_class');
$routes->match(['get', 'post'], 'admin/add_length_class/(:num)', 'admin\Setting::add_length_class/$1');
$routes->post('admin/delete_length_class','admin/Setting::delete_length_class');


$routes->get('admin/weight_class','admin/Setting::weight_class');
$routes->match(['get', 'post'], 'admin/add_weight_class', 'admin/Setting::add_weight_class');
$routes->match(['get', 'post'], 'admin/add_weight_class/(:num)', 'admin\Setting::add_weight_class/$1');
$routes->post('admin/delete_weight_class','admin/Setting::delete_weight_class');




$routes->get('admin/tax_rate','admin/Setting::tax_rate');
$routes->match(['get', 'post'], 'admin/add_tax_rate', 'admin/Setting::add_tax_rate');
$routes->match(['get', 'post'], 'admin/add_tax_rate/(:num)', 'admin\Setting::add_tax_rate/$1');
$routes->post('admin/delete_tax_rate','admin/Setting::delete_tax_rate');


$routes->get('admin/currency','admin/Setting::currency');
$routes->match(['get', 'post'], 'admin/add_currency', 'admin/Setting::add_currency');
$routes->match(['get', 'post'], 'admin/add_currency/(:num)', 'admin\Setting::add_currency/$1');
$routes->post('admin/delete_currency','admin/Setting::delete_currency');


//////////////
// CMS 


$routes->post('admin/upload_image','admin/Cms::upload_image');

$routes->get('admin/address','admin/Cms::address');
$routes->match(['get', 'post'], 'admin/add_address', 'admin/Cms::add_address');
$routes->match(['get', 'post'], 'admin/add_address/(:num)', 'admin\Cms::add_address/$1');
$routes->post('admin/delete_address','admin/Cms::delete_address');


$routes->get('admin/banner','admin/Cms::banner');
$routes->match(['get', 'post'], 'admin/add_banner', 'admin/Cms::add_banner');
$routes->match(['get', 'post'], 'admin/add_banner/(:num)', 'admin\Cms::add_banner/$1');
$routes->post('admin/delete_banner','admin/Cms::delete_banner');


$routes->get('admin/flip','admin/Cms::flip');
$routes->match(['get', 'post'], 'admin/add_flip', 'admin/Cms::add_flip');
$routes->match(['get', 'post'], 'admin/add_flip/(:num)', 'admin\Cms::add_flip/$1');
$routes->post('admin/delete_flip','admin/Cms::delete_flip');


$routes->get('admin/testimonial','admin/Cms::testimonial');
$routes->match(['get', 'post'], 'admin/add_testimonial', 'admin/Cms::add_testimonial');
$routes->match(['get', 'post'], 'admin/add_testimonial/(:num)', 'admin\Cms::add_testimonial/$1');
$routes->post('admin/delete_testimonial','admin/Cms::delete_testimonial');

$routes->get('admin/manage_logo','admin/Cms::manage_logo');
$routes->match(['get', 'post'], 'admin/add_logo', 'admin/Cms::add_logo');
$routes->match(['get', 'post'], 'admin/add_logo/(:num)', 'admin\Cms::add_logo/$1');
$routes->post('admin/delete_logo','admin/Cms::delete_logo');


$routes->add('admin/photos','admin/Cms::photos');
$routes->match(['get', 'post'], 'admin/add_photos', 'admin/Cms::add_photos');
$routes->match(['get', 'post'], 'admin/add_photos/(:num)', 'admin\Cms::add_photos/$1');
$routes->post('admin/delete_photo','admin/Cms::delete_photo');

$routes->get('admin/heading','admin/Cms::heading');
$routes->match(['get', 'post'], 'admin/add_heading', 'admin/Cms::add_heading');
$routes->match(['get', 'post'], 'admin/add_heading/(:num)', 'admin\Cms::add_heading/$1');
$routes->post('admin/delete_heading','admin/Cms::delete_heading');


$routes->get('admin/home_heading','admin/Cms::home_heading');
$routes->match(['get', 'post'], 'admin/add_home_heading', 'admin/Cms::add_home_heading');
$routes->match(['get', 'post'], 'admin/add_home_heading/(:num)', 'admin\Cms::add_home_heading/$1');
$routes->post('admin/delete_home_heading','admin/Cms::delete_home_heading');

$routes->get('admin/career_gallery','admin/Cms::career_gallery');
$routes->match(['get', 'post'], 'admin/add_career_gallery', 'admin/Cms::add_career_gallery');
$routes->match(['get', 'post'], 'admin/add_career_gallery/(:num)', 'admin\Cms::add_career_gallery/$1');
$routes->post('admin/delete_career_gallery','admin/Cms::delete_career_gallery');

$routes->get('admin/career_heading','admin/Cms::career_heading');
$routes->match(['get', 'post'], 'admin/add_career_heading', 'admin/Cms::add_career_heading');
$routes->match(['get', 'post'], 'admin/add_career_heading/(:num)', 'admin\Cms::add_career_heading/$1');
$routes->post('admin/delete_career_heading','admin/Cms::delete_career_heading');

$routes->get('admin/lifeat','admin/Cms::lifeat');
$routes->match(['get', 'post'], 'admin/add_lifeat', 'admin/Cms::add_lifeat');
$routes->match(['get', 'post'], 'admin/add_lifeat/(:num)', 'admin\Cms::add_lifeat/$1');
$routes->post('admin/delete_lifeat','admin/Cms::delete_lifeat');






$routes->get('admin/subscribe','admin/Cms::subscribe');
$routes->match(['get', 'post'], 'admin/subscribe/(:num)', 'admin\Cms::subscribe/$1');
$routes->post('admin/delete_subscribe','admin/Cms::delete_subscribe');

$routes->get('admin/product_gallery','admin/Cms::product_gallery');
$routes->match(['get', 'post'], 'admin/add_product_gallery', 'admin/Cms::add_product_gallery');
$routes->match(['get', 'post'], 'admin/add_product_gallery/(:num)', 'admin\Cms::add_product_gallery/$1');
$routes->post('admin/delete_product_gallery','admin/Cms::delete_product_gallery');

$routes->get('admin/blogs','admin/Cms::blogs');
$routes->match(['get','post'],'admin/add_blogs','admin/Cms::add_blogs');
$routes->match(['get', 'post'], 'admin/add_blogs/(:num)', 'admin\Cms::add_blogs/$1');
$routes->post('admin/delete_blogs','admin/Cms::delete_blogs');

$routes->get('admin/blog_category','admin/Cms::blog_category');
$routes->match(['get','post'],'admin/add_blog_category','admin/Cms::add_blog_category');
$routes->match(['get', 'post'], 'admin/add_blog_category/(:num)', 'admin\Cms::add_blog_category/$1');
$routes->post('admin/delete_blog_category','admin/Cms::delete_blog_category');

$routes->get('admin/media','admin/Cms::media');
$routes->match(['get','post'],'admin/add_media','admin/Cms::add_media');
$routes->match(['get', 'post'], 'admin/add_media/(:num)', 'admin\Cms::add_media/$1');
$routes->post('admin/delete_media','admin/Cms::delete_media');


$routes->get('admin/timeline','admin/Cms::timeline');
$routes->match(['get','post'],'admin/add_timeline','admin/Cms::add_timeline');
$routes->match(['get', 'post'], 'admin/add_timeline/(:num)', 'admin\Cms::add_timeline/$1');
$routes->post('admin/delete_timeline','admin/Cms::delete_timeline');


$routes->get('admin/team','admin/Cms::team');
$routes->match(['get','post'],'admin/add_team','admin/Cms::add_team');
$routes->match(['get', 'post'], 'admin/add_team/(:num)', 'admin\Cms::add_team/$1');
$routes->post('admin/delete_team','admin/Cms::delete_team');


$routes->get('admin/reviews','admin/Cms::reviews');
$routes->match(['get','post'],'admin/add_reviews','admin/Cms::add_reviews');
$routes->match(['get', 'post'], 'admin/add_reviews/(:num)', 'admin\Cms::add_reviews/$1');
$routes->post('admin/delete_reviews','admin/Cms::delete_reviews');


$routes->get('admin/trending_search','admin/Cms::trending_search');
$routes->match(['get','post'],'admin/add_trending_search','admin/Cms::add_trending_search');
$routes->match(['get', 'post'], 'admin/add_trending_search/(:num)', 'admin\Cms::add_trending_search/$1');
$routes->post('admin/delete_trending_search','admin/Cms::delete_trending_search');



$routes->get('admin/oem_brands','admin/Cms::oem_brands');
$routes->match(['get', 'post'], 'admin/add_oem_brands', 'admin/Cms::add_oem_brands');
$routes->match(['get', 'post'], 'admin/add_oem_brands/(:num)', 'admin\Cms::add_oem_brands/$1');
$routes->post('admin/delete_oem_brands','admin/Cms::delete_oem_brands');


$routes->get('admin/aftermarket_brands','admin/Cms::aftermarket_brands');
$routes->match(['get', 'post'], 'admin/add_aftermarket_brands', 'admin/Cms::add_aftermarket_brands');
$routes->match(['get', 'post'], 'admin/add_aftermarket_brands/(:num)', 'admin\Cms::add_aftermarket_brands/$1');
$routes->post('admin/delete_aftermarket_brands','admin/Cms::delete_aftermarket_brands');



$routes->get('admin/twowheeler_brands','admin/Cms::twowheeler_brands');
$routes->match(['get', 'post'], 'admin/add_twowheeler_brands', 'admin/Cms::add_twowheeler_brands');
$routes->match(['get', 'post'], 'admin/add_twowheeler_brands/(:num)', 'admin\Cms::add_twowheeler_brands/$1');
$routes->post('admin/delete_twowheeler_brands','admin/Cms::delete_twowheeler_brands');



////////////

// CATALOG

$routes->get('admin/category','admin/Catalog::index');
$routes->match(['get', 'post'], 'admin/add_category', 'admin/Catalog::add_category');
$routes->match(['get', 'post'], 'admin/add_category/(:num)', 'admin\Catalog::add_category/$1');
$routes->post('admin/delete_category','admin/Catalog::delete_category');

$routes->get('admin/product','admin/Catalog::product');
$routes->match(['get', 'post'], 'admin/add_product', 'admin/Catalog::add_product');
$routes->match(['get', 'post'], 'admin/add_product/(:num)', 'admin\Catalog::add_product/$1');
$routes->post('admin/delete_product','admin/Catalog::delete_product');


$routes->get('admin/product','admin/Catalog::product');
$routes->match(['get', 'post'], 'admin/add_product', 'admin/Catalog::add_product');
$routes->match(['get', 'post'], 'admin/add_product/(:num)', 'admin\Catalog::add_product/$1');
$routes->post('admin/delete_product','admin/Catalog::delete_product');

$routes->get('admin/manufactures','admin/Catalog::manufactures');
$routes->match(['get', 'post'], 'admin/add_manufacture', 'admin/Catalog::add_manufacture');
$routes->match(['get', 'post'], 'admin/add_manufacture/(:num)', 'admin\Catalog::add_manufacture/$1');
$routes->post('admin/delete_manufacture','admin/Catalog::delete_manufacture');


$routes->get('admin/attribute','admin/Catalog::attribute');
$routes->match(['get', 'post'], 'admin/add_attribute', 'admin/Catalog::add_attribute');
$routes->match(['get', 'post'], 'admin/add_attribute/(:num)', 'admin\Catalog::add_attribute/$1');
$routes->post('admin/delete_attribute','admin/Catalog::delete_attribute');



$routes->get('admin/attribute_group','admin/Catalog::attribute_group');
$routes->match(['get', 'post'], 'admin/add_attribute_group', 'admin/Catalog::add_attribute_group');
$routes->match(['get', 'post'], 'admin/add_attribute_group/(:num)', 'admin\Catalog::add_attribute_group/$1');
$routes->post('admin/delete_attribute_group','admin/Catalog::delete_attribute_group');



$routes->get('admin/filter','admin/Catalog::filter');
$routes->match(['get', 'post'], 'admin/add_filter', 'admin/Catalog::add_filter');
$routes->match(['get', 'post'], 'admin/add_filter/(:num)', 'admin\Catalog::add_filter/$1');
$routes->post('admin/delete_filter','admin/Catalog::delete_filter');



$routes->get('admin/brands','admin/Catalog::brands');
$routes->match(['get', 'post'], 'admin/add_brands', 'admin/Catalog::add_brands');
$routes->match(['get', 'post'], 'admin/add_brands/(:num)', 'admin\Catalog::add_brands/$1');
$routes->post('admin/delete_brands','admin/Catalog::delete_brands');


$routes->get('admin/brand_category','admin/Catalog::brand_category');
$routes->match(['get', 'post'], 'admin/add_brand_category', 'admin/Catalog::add_brand_category');
$routes->match(['get', 'post'], 'admin/add_brand_category/(:num)', 'admin\Catalog::add_brand_category/$1');
$routes->post('admin/delete_brand_category','admin/Catalog::delete_brand_category');




// $routes->match(['get', 'post'], 'admin/import_products', 'admin/Catalog::import_products');
$routes->match(['get', 'post'], 'admin/import_products', 'admin/Catalog::import_products_batch');
// $routes->match(['get', 'post'], 'admin/import_products', 'admin/Catalog::import_produt_excel');





//////
// CUTOMER

$routes->get('admin/enquiry','admin/Customer::enquiry');
$routes->post('admin/delete_enquiry','admin/Customer::delete_enquiry');
$routes->get('admin/quatation_enquiry','admin/Customer::quatation_enquiry');
$routes->post('admin/delete_quatation','admin/Customer::delete_quatation');


$routes->get('admin/product_enquiry','admin/Customer::product_enquiry');
$routes->post('admin/delete_product_enquiry','admin/Customer::delete_product_enquiry');
$routes->post('admin/delete_customer_review','admin/Customer::delete_customer_review');
$routes->post('admin/customer_export','admin/Customer::customer_export');
$routes->post('admin/get_ajax_product','admin/Customer::get_ajax_product');



$routes->get('admin/customer','admin/Customer::index');
$routes->get('admin/customer/(:num)','admin/Customer::index/$1');
$routes->match(['get', 'post'], 'admin/add_customer', 'admin/Customer::add_customer');
$routes->match(['get', 'post'], 'admin/add_customer/(:num)', 'admin\Customer::add_customer/$1');
$routes->post('admin/delete_customer','admin/Customer::delete_customer');


$routes->get('admin/customer_review','admin/Customer::customer_review');
$routes->get('admin/customer_review/(:num)','admin/Customer::customer_review/$1');
$routes->match(['get', 'post'], 'admin/add_customer_review', 'admin/Customer::add_customer_review');
$routes->match(['get', 'post'], 'admin/add_customer_review/(:num)', 'admin\Customer::add_customer_review/$1');
$routes->post('admin/delete_customer','admin/Customer::delete_customer');


$routes->get('admin/customer_group','admin/Customer::customer_group');
$routes->match(['get', 'post'], 'admin/add_customer_group', 'admin/Customer::add_customer_group');
$routes->match(['get', 'post'], 'admin/add_customer_group/(:num)', 'admin\Customer::add_customer_group/$1');
$routes->post('admin/delete_customer_group','admin/Customer::delete_customer_group');

//////////////


// Career
$routes->get('admin/careers','admin/Career::careers');
$routes->match(['get', 'post'], 'admin/add_career', 'admin/Career::add_career');
$routes->match(['get', 'post'], 'admin/add_career/(:num)', 'admin\Career::add_career/$1');
$routes->post('admin/delete_career','admin/Career::delete_career');


$routes->get('admin/career_enquiry','admin/Career::career_enquiry');
$routes->post('admin/delete_career_enquiry','admin/Career::delete_career_enquiry');

//////////////

// Sales


$routes->post('admin/import_orders','admin/Sales::import_orders');
$routes->post('admin/move_product','admin/Sales::move_product');

$routes->post('admin/remvoe_cart','admin/Sales::remvoe_cart');
$routes->post('admin/add_to_cart','admin/Sales::add_to_cart');
$routes->post('admin/update_cart','admin/Sales::update_cart');
$routes->post('admin/check_coupan','admin/Sales::check_coupan');
$routes->post('admin/confirm','admin/Sales::confirm');
$routes->post('admin/delete_orders','admin/Sales::delete_orders');



$routes->get('admin/order','admin/Sales::index');
$routes->get('admin/order/(:num)','admin/Sales::index/$i');
$routes->match(['get', 'post'], 'admin/add_order', 'admin/Sales::add_order');
$routes->match(['get', 'post'], 'admin/add_order/(:num)', 'admin\Sales::add_order/$1');
$routes->get('admin/delete_order/(:num)','admin\Sales::delete_order/$1');

$routes->get('admin/view_order/(:num)','admin\Sales::view_order/$1');

$routes->get('admin/swift_code/(:num)','admin\Sales::swift_code/$1');

$routes->post('admin/add_history','admin/Sales::add_history');
$routes->get('admin/invoice/(:num)','admin\Sales::invoice/$1');

$routes->get('admin/return_order','admin/Sales::return_order');
$routes->match(['get', 'post'], 'admin/add_return', 'admin/Sales::add_return');
$routes->match(['get', 'post'], 'admin/add_return/(:num)', 'admin\Sales::add_return/$1');
$routes->post('admin/delete_return_order','admin\Sales::delete_return_order');

$routes->get('admin/order_report','admin/Sales::order_report');
$routes->get('admin/inventory_reports','admin/Sales::inventory_reports');
$routes->get('admin/average_inventory_reports','admin/Sales::average_inventory_reports');
$routes->get('admin/payment_finance_report','admin/Sales::payment_finance_report');
$routes->get('admin/abc_analysis_product','admin/Sales::abc_analysis_product');
$routes->post('admin/export_order_report','admin/Sales::export_order_report');
$routes->post('admin/export_inventory_report','admin/Sales::export_inventory_report');
$routes->post('admin/export_inventory_average_report','admin/Sales::export_inventory_average_report');
$routes->post('admin/export_payment_report','admin/Sales::export_payment_report');
$routes->post('admin/export_abc_report','admin/Sales::export_abc_report');
$routes->match(['get', 'post'],'admin/order_export','admin/Sales::order_export');



/////////////
// Marketting

$routes->get('admin/coupon','admin\Marketing::coupon');
$routes->get('admin/coupon/(:num)','admin\Marketing::coupon/$1');
$routes->match(['get', 'post'], 'admin/add_coupon', 'admin/Marketing::add_coupon');
$routes->match(['get', 'post'], 'admin/add_coupon/(:num)', 'admin\Marketing::add_coupon/$1');
$routes->post('admin/delete_coupon','admin\Marketing::delete_coupon');




if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
