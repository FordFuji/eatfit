<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/clc', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    // Artisan::call('view:clear');
    // session()->forget('key');
    return "Cleared!";
});
//fronyend
Route::get('/switchlang/{lang}', 'FrontendController@switchlang');
Route::get('/', function() {
    return redirect('index');
});

Route::get('/index/{member_id?}', 'FrontendController@index');

Route::get('/product/{id}', 'FrontendController@product');

Route::get('/product_page/{id}/{id_product}', 'FrontendController@product_page');

Route::get('/review_all', 'FrontendController@review_all');

Route::get('/blog', 'FrontendController@blog');

Route::get('/blog_detail/{id}', 'FrontendController@blog_detail');

Route::get('/best_seller', 'FrontendController@best_seller');

Route::get('/contact', 'FrontendController@contact');
Route::post('/sendcontact', 'FrontendController@sendcontact');

Route::get('/register', 'FrontendController@register');
Route::post('/registerSaveUpdate', 'FrontendController@registerSaveUpdate');

Route::get('/forgotpassword', 'FrontendController@forgotpassword');
Route::post('/sendforgotpassword', 'FrontendController@sendforgotpassword');

Route::get('/faqs', 'FrontendController@faqs');
Route::get('/faqsAW/{id}', 'FrontendController@faqsAW');

Route::get('/BMI', 'FrontendController@BMI');
Route::post('/BMIresult', 'FrontendController@BMIresult');

Route::get('/cart-shipping', 'FrontendController@cartShipping');

Route::get('/cart-payment/{type?}', 'FrontendController@cartPayment');

Route::get('/cart-summary/', 'FrontendController@cartSummary');

Route::post('/saveUpdateCartShipping', 'FrontendController@saveUpdateCartShipping');

Route::post('/ajaxShipping', 'FrontendController@ajaxShipping');

Route::post('/ajaxCheckout', 'FrontendController@ajaxCheckout');

Route::get('/thankyou/{order_detail_id}', 'FrontendController@thankyou');

Route::post('/ajaxWishList', 'FrontendController@ajaxWishList');

Route::get('/myprofile', 'FrontendController@myprofile');

Route::post('/saveUpdateProfile', 'FrontendController@saveUpdateProfile');

Route::get('/member_shippingaddress', 'FrontendController@member_shippingaddress');

Route::get('/SendMailThankyou/{order_detail_id}', 'FrontendController@SendMailThankyou');

Route::get('/member_newaddress', 'FrontendController@member_newaddress');
Route::get('/member_newaddressEdit/{id}', 'FrontendController@member_newaddressEdit');
Route::post('/AddressSaveUpdate', 'FrontendController@AddressSaveUpdate');
Route::post('/delADD/{id}', 'FrontendController@delADD');
Route::get('/showADD', 'FrontendController@showADD');

Route::get('/myprofile', 'FrontendController@myprofile');

Route::get('/backend/pick_your_plan', 'PickYourPlanController@index');
Route::get('/backend/pick_your_plan/form/{plan_id?}', 'PickYourPlanController@form');
Route::post('/backend/pick_your_plan/pick_your_plan_save_update', 'PickYourPlanController@pick_your_plan_save_update');

Route::get('/product_page/{products_id}', 'FrontendController@product_page');

Route::post('/ajaxCheckShipping', 'FrontendController@ajaxCheckShipping');

Route::get('/terms', 'FrontendController@terms');

Route::post('/ajaxForgotPassword', 'FrontendController@ajaxForgotPassword');

Route::get('/change_password/{md5}', 'FrontendController@change_password');

Route::post('/ajaxChangePassword', 'FrontendController@ajaxChangePassword');

Route::post('/ajaxPaymentMethod', 'FrontendController@ajaxPaymentMethod');

Route::get('/thankyou_order', 'FrontendController@thankyou_order');


Route::post('/ajaxPromoCodeFrontend', 'FrontendController@ajaxPromoCodeFrontend');

Route::get('/calculatePoint', 'FrontendController@calculatePoint');

// review admin
Route::get('/backreview/admin', 'ReviewController@reviewAdmin');
Route::get('/backreview/admin_add_edit', 'ReviewController@reviewAdminAddEdit');
Route::post('/backreview/admin_insert_update', 'ReviewController@reviewAdminInsertUpdate');
Route::get('/backreview/admin_delete/{review_id}', 'ReviewController@reviewAdminDelete');
// end review admin

// Address
Route::post('/ajaxChangeProvince', 'FrontendController@ajaxChangeProvince');
Route::post('/ajaxChangeAmphur', 'FrontendController@ajaxChangeAmphur');
// End Address

// package
Route::get('/pickyourplan/{day}', 'FrontendController@pickyourplan');
Route::post('/ajaxCalories', 'FrontendController@ajaxCalories');
Route::post('/ajaxInserCartPackage', 'FrontendController@ajaxInserCartPackage');
// package

// cart
Route::get('/cart', 'FrontendController@cart');

Route::get('/cart_login', 'FrontendController@cartLogin');

Route::get('/ajaxCart', 'FrontendController@ajaxCart');
Route::post('/ajaxInsertCart', 'FrontendController@ajaxInsertCart');
Route::post('/ajaxInsertProductRedeemCart', 'FrontendController@ajaxInsertProductRedeemCart');
Route::post('/ajaxInsertFreeShippingCart', 'FrontendController@ajaxInsertFreeShippingCart');
Route::post('/ajaxInsertDiscountCart', 'FrontendController@ajaxInsertDiscountCart');
Route::post('/ajaxUpdateCart', 'FrontendController@ajaxUpdateCart');
Route::post('/ajaxDeleteCart', 'FrontendController@ajaxDeleteCart');
// end cart

//Route::post('/qr_code_url', 'TestController@qr_code_url');

Route::post('/saveUpdatePayment', 'FrontendController@saveUpdatePayment');

Route::post('/ajaxCheckEmail', 'FrontendController@ajaxCheckEmail');

Route::get('/privacy_policy', 'FrontendController@privacy_policy');
Route::get('/remove', 'FrontendController@remove');

Route::post('/ajaxCheckLogin', 'FrontendController@ajaxCheckLogin');
Route::post('/ajaxLoginFacebook', 'FrontendController@ajaxLoginFacebook');

// ตัดบัตรเครดิต
Route::post('/response_url', 'FrontendController@response_url')->name('response_url');
Route::post('/qr_code_url', 'FrontendController@responseQRCode');
Route::post('/unionpay_url', 'FrontendController@unionpay_url');
Route::post('/unionpay_notify_url', 'FrontendController@unionpay_notify_url');
// End ตัดบัตรเครดิต

// Test ตัดบัตรเครดิต
Route::get('/testCreditCard', 'TestController@testCreditCard');

Route::post('/responseMCC', 'FrontendController@responseMCC');
Route::post('/responseQRCode', 'FrontendController@responseQRCode');
Route::post('/responseUnionPay', 'FrontendController@responseUnionPay');

Route::post('/notify_url', 'FrontendController@notify_url');
// End Test ตัดบัตรเครดิต

// login
Route::post('/checkLoginInc', 'FrontendController@checkLoginInc');
Route::post('/ajaxCheckMemberSession', 'FrontendController@ajaxCheckMemberSession');

Route::get('/logout', 'FrontendController@logout');
// end login

Route::post('/ajaxCheckMember', 'FrontendController@ajaxCheckMember');

// promotion
Route::get('/promotion_500', 'FrontendController@promotion_500');
Route::get('/promotion_15000', 'FrontendController@promotion_15000');
// End promotion

// backend order
Route::get('/backend/order', 'FrontendController@backendOrder');
Route::get('/backend/order/form/{order_detail_id}', 'FrontendController@backendOrderForm');
Route::post('/backend/order/saveUpdateOrder', 'FrontendController@backendOrderSaveUpdate');
// end backend order

// backend payment
Route::get('/backend/payment', 'FrontendController@backendPayment');
// end backend payment

Route::post('/ajaxSearchOrderNo', 'FrontendController@ajaxSearchOrderNo');
Route::post('/ajaxSearchOrderNoPayment', 'FrontendController@ajaxSearchOrderNoPayment');

// backend product_point
Route::get('/backend/product_point', 'ProductPointController@productPoint');
Route::get('/backend/product_point/form/{product_point_id?}', 'ProductPointController@productPointForm');
Route::post('/backend/product_point/saveUpdateProductPoint', 'ProductPointController@saveUpdateProductPoint');
Route::get('/backend/product_point/delete/{product_point_id}', 'ProductPointController@productPointDelete');
// end backend product_point

// backend promocode
Route::get('/backend/promocode', 'PromocodeController@promocode');
Route::get('/backend/promocode/form/{promocode_id?}', 'PromocodeController@promocode_form');
Route::post('/backend/promocode/saveUpdatepromocode', 'PromocodeController@saveUpdatepromocode');
Route::get('/backend/promocode/delete/{promocode_id?}', 'PromocodeController@promocode_delete');
// end backend promocode

// backend instagram
Route::get('/backend/instagram', 'InstagramController@instagram');
Route::get('/backend/instagram/form/{instagram_id?}', 'InstagramController@instagram_form');
Route::post('/backend/instagram/saveUpdateInstagram', 'InstagramController@saveUpdateInstagram');
Route::get('/backend/instagram/delete/{instagram_id?}', 'InstagramController@instagram_delete');
// end backend instagram

// backend review admin
Route::get('/backend/review_admin', 'ReviewAdminController@review_admin');
Route::get('/backend/review_admin/form/{review_admin_id?}', 'ReviewAdminController@review_admin_form');
Route::post('/backend/review_admin/saveUpdateReviewAdmin', 'ReviewAdminController@saveUpdateReviewAdmin');
Route::get('/backend/review_admin/delete/{review_admin_id?}', 'ReviewAdminController@review_admin_delete');
Route::get('/backend/review_admin/delete/{review_admin_image_id}/{review_admin_id}', 'ReviewAdminController@review_admin_delete_gallery');
// end backend review admin

// backend package 
Route::get('/backend/package', 'PackageController@index');
Route::post('/backend/saveUpdatePackage', 'PackageController@saveUpdate');
// end backend package 

// backend package 
Route::get('/backend/promotion_by_product', 'PromotionController@promotion_by_product');
Route::post('/backend/promotion_by_product_save_update', 'PromotionController@promotion_by_product_save_update');
// end backend package 

// backend text_home 
Route::get('/backend/text_home', 'HomeController@textHome');
Route::get('/backend/text_home_form/{text_home_id?}', 'HomeController@FormTextHome');
Route::post('/backend/saveUpdateTextHome', 'HomeController@saveUpdateTextHome');
Route::get('/backend/deleteTextHome/{text_home_id}', 'HomeController@deleteTextHome');
// end backend text_home

// backend video_youtube 
Route::get('/backend/video_youtube', 'HomeController@VideoYoutube');
Route::post('/backend/saveUpdateVideoYoutube', 'HomeController@saveUpdateVideoYoutube');
// end backend video_youtube

// login
Route::get('/backend/login', 'FrontendController@loginBackend');

Route::post('/saveUpdatelogin', 'FrontendController@saveUpdatelogin');

Route::get('/logoutBackend', 'FrontendController@logoutBackend');
// End login

// test
Route::get('/test/testInstagram', 'TestController@testInstagram');
Route::get('/test/testPHPMailer', 'TestController@testPHPMailer');
// end test

Route::get('/backend/banner_promotion', 'BannerPromotionController@banner_promotion');
Route::post('/backend/banner_promotion_save_update', 'BannerPromotionController@banner_promotion_save_update');

// member
Route::get('backend/member', 'MemberController@member');
Route::get('backend/member/form/{member_id}', 'MemberController@form');
// end member

//backend Nee
Route::resource('/backabout', 'AboutController');

Route::resource('/backbanner', 'BannerController');
Route::get('/showdata', 'BannerController@showdata');

Route::resource('/backblog', 'BlogController');

Route::resource('/backbank', 'BankController');
Route::get('/showBank', 'BankController@showBank');

Route::resource('/backquestionHelp', 'QuestionController');
Route::get('/showQA', 'QuestionController@showQA');
Route::get('/filterIntType', 'QuestionController@filterIntType');
Route::post('/delType/{id}', 'QuestionController@delType');
Route::get('/backquestionTYPEedit/{id}', 'QuestionController@backquestionTYPEedit');
Route::post('/backquestionTYPEupdate/{request}/{id}', 'QuestionController@backquestionTYPEupdate');

Route::resource('/backcontact', 'ContactController');

Route::resource('/backreview', 'ReviewController');
Route::get('/showReview', 'ReviewController@showReview');

Route::resource('/backorder', 'OrderController');
Route::post('/savepay/{id}', 'OrderController@savepay');
Route::get('/backpay', 'OrderController@backpay');
Route::post('/savepro/{id}', 'OrderController@savepro');
Route::get('/backpro', 'OrderController@backpro');
Route::post('/savedelivery', 'OrderController@savedelivery');
Route::get('/backdelivery', 'OrderController@backdelivery');

//backend JaY
Route::get('/backend', 'BackendController@Dashboard');
Route::get('/menu', 'BackendController@index');
Route::post('/insert_menu_head', 'BackendController@insert');
Route::get('/model_edit_menu_head', 'BackendController@show');
Route::post('/edit_menu_head', 'BackendController@edit');
Route::post('/delete_menu_head/{iddelete}', 'BackendController@destroy');

Route::get('/edit_gallery_banner_menu_head', 'BackendController@show_gallery_banner');
Route::post('/save_gallery_banner_menu_head', 'BackendController@save_gallery_banner');
Route::post('/delete_gallery_banner_menu/', 'BackendController@delete_gallery_banner_menu');

Route::get('/products', 'ProductsController@index');
Route::post('/insert_products', 'ProductsController@insert');
Route::get('/model_edit_products', 'ProductsController@show');
Route::post('/edit_menu_product', 'ProductsController@edit');

Route::get('/edit_gallery_products', 'ProductsController@show_gallery_products');
Route::post('/save_gallery_products', 'ProductsController@save_gallery_products');
//Route::post('/delete_gallery_products','ProductsController@delete_gallery_products');
Route::post('delete_gallery_products/{iddel}', 'ProductsController@delete_gallery_products');

Route::get('/edit_tag_products', 'ProductsController@edit_tag_products');
Route::post('/save_tag_products', 'ProductsController@save_tag_products');
Route::post('/remove_tag_products/{iddel}', 'ProductsController@remove_tag_products');

Route::post('/delete_product/{products_id}', 'BackendController@delete_product');

Route::get('/edit_ingredients_products', 'ProductsController@edit_ingredients_products');
Route::post('/save_ingredients_products', 'ProductsController@save_ingredients_products');
Route::get('/modal_edit_ingredients', 'ProductsController@modal_edit_ingredients');
Route::post('/save_edit_ingredients', 'ProductsController@save_edit_ingredients');
Route::post('/delete_ingredients/{iddel}', 'ProductsController@delete_ingredients');

Route::get('/edit_delivery_products', 'ProductsController@edit_delivery_products');
Route::post('/save_delivery_products', 'ProductsController@save_delivery_products');
Route::get('/modal_edit_delivery', 'ProductsController@modal_edit_delivery');
Route::post('/save_edit_delivery', 'ProductsController@save_edit_delivery');
Route::post('/delete_delivery/{iddel}', 'ProductsController@delete_delivery');


Route::get('/mypoint', 'FrontendController@mypoint');

Route::get('/mywishlist', 'FrontendController@mywishlist');
Route::get('/mywish', 'FrontendController@mywish');

Route::get('/myorder', 'FrontendController@myorder');

Route::get('/myorder_detail/{order_detail_id}', 'FrontendController@myorder_detail');

Route::get('/myorder_uploadslip/{id}', 'FrontendController@myorder_uploadslip');

Route::get('/myreviews', 'FrontendController@myreviews');
// Route::get('/page_reviews/{id}', 'FrontendController@page_reviews');
Route::get('/page_reviews/{id}/{order}', 'FrontendController@page_reviews');
Route::get('/page_reviewsSEE/{id}/{order}', 'FrontendController@page_reviewsSEE');
Route::post('/ReviewsSave', 'FrontendController@ReviewsSave');

Route::get('/changepassword', 'FrontendController@changepassword');
Route::post('/changepasswordSave', 'FrontendController@changepasswordSave');

// Point
Route::get('/backend/point_text', 'PointController@point_text');
Route::post('/backend/proint_text_save_update', 'PointController@proint_text_save_update');

Route::get('/backend/point_redeem', 'PointController@point_redeem');
Route::get('/backend/point_redeem_form/{point_redeem_id?}', 'PointController@point_redeem_form');
Route::post('/backend/point_redeem_save_update', 'PointController@point_redeem_save_update');
Route::get('/backend/point_redeem_delete/{point_redeem_id}', 'PointController@point_redeem_delete');
// End Point

// Promotion
Route::get('/backend/promotion_complete', 'PromotionController@promotion_complete');
Route::post('/backend/promotion_complete_save_update', 'PromotionController@promotion_complete_save_update');

Route::get('/backend/buy_1_get_1_free', 'PromotionController@buy_1_get_1_free');
Route::get('/backend/buy_1_get_1_free_form/{buy_1_get_1_free_id?}', 'PromotionController@buy_1_get_1_free_form');
Route::post('/backend/buy_1_get_1_free_save_update', 'PromotionController@buy_1_get_1_free_save_update');
Route::get('/backend/buy_1_get_1_free_delete/{buy_1_get_1_free_id}', 'PromotionController@buy_1_get_1_free_delete');

Route::get('/backend/promotion_day', 'PromotionController@promotion_day');
Route::post('/backend/promotion_day_save_update', 'PromotionController@promotion_day_save_update');

Route::get('/backend/giftset', 'PromotionController@giftset');
Route::get('/backend/giftset/form/{giftset_id?}', 'PromotionController@giftsetform');
Route::post('/backend/giftset_save_update', 'PromotionController@giftset_save_update');
Route::get('/backend/giftset/delete/{giftset_id}', 'PromotionController@giftset_delete');
// End Promotion

Route::get('/backend/promotion_text', 'PromotionController@promotion_text');
Route::post('/backend/promotion_text_save_update', 'PromotionController@promotion_text_save_update');

Route::prefix('login')->group(function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
});

Route::get('/testLoginFacebook', 'TestController@testLoginFacebook');
Route::get('/testCaptcha', 'TestController@testCaptcha');

// [your site path]/Http/routes.php
Route::any('captcha-test', function() {
    if (request()->getMethod() == 'POST') {
        $rules = ['captcha' => 'required|captcha'];
        $validator = validator()->make(request()->all(), $rules);
        if ($validator->fails()) {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        } else {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }
    }

    $form = '<form method="post" action="captcha-test">';
    $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    $form .= '<p>' . captcha_img() . '</p>';
    $form .= '<p><input type="text" name="captcha"></p>';
    $form .= '<p><button type="submit" name="check">Check</button></p>';
    $form .= '</form>';
    return $form;
});

/*Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cleared!";

});*/

Route::get('/testPlus1Day', 'TestController@testPlus1Day');

Route::post('/ajaxInsertCartPackage', 'FrontendController@ajaxInsertCartPackage');

Route::get('/getSessionAll', 'FrontendController@getSessionAll');

Route::get('/setPoint', 'FrontendController@setPoint');