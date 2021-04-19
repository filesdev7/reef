<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {


    Config::set('auth.defines', 'admin');

    //================ Auth ================
    Route::get('login', 'AdminAuth@login');
    Route::post('login', 'AdminAuth@dologin');
    Route::get('forgot/password', 'AdminAuth@forgot_password');
    Route::post('forgot/password', 'AdminAuth@forgot_password_post');
    Route::get('reset/password/{token}', 'AdminAuth@reset_password');
    Route::post('reset/password/{token}', 'AdminAuth@reset_password_final');


    //================ RegisterController ================
    Route::get('market-register-form', 'RegisterController@market_register_form');
    Route::post('market-register', 'RegisterController@market_register')->name('market-register.store');
    Route::get('city_parent/{city_id}', 'RegisterController@city_parent');


    //********************* after login *********************
    Route::group(['middleware' => 'admin:admin'], function () {


        Route::get('/', function () {
            return view('admin.index');
        });

        Route::get('/test', function () {
            return view('admin.test');
        });
        //================ admin ================
        Route::resource('admin', 'AdminController');
        Route::delete('admin/destroy/all', 'AdminController@multi_delete')->name('delete_all_admin');
        Route::get('my-profile', 'AdminController@my_profile');

        //================ MyAdminController ================
        Route::resource('my-admin', 'MyAdminController');
        Route::delete('my-admin/destroy/all', 'MyAdminController@multi_delete')->name('delete_all_my_admin');

        Route::get('register', 'RegisterController@index_register');
        Route::delete('register/destroy/all', 'RegisterController@multi_delete')->name('delete_all_register');

        Route::get('register/{id}', 'RegisterController@show');
        Route::delete('register/destroy/all', 'RegisterController@multi_delete')->name('delete_all_register');
        Route::post('marketer_activation', 'RegisterController@marketer_activation')->name('marketer_activation');


        //================ صلاحيات المشرفين ================

        Route::resource('permission_group', 'AdminGroupController');
        Route::delete('permission_group/destroy/all', 'AdminGroupController@multi_delete')->name('delete_all_admin_group');


        //================ settings ================
        Route::get('settings', 'SettingController@setting_page');
        Route::post('operate_page', 'SettingController@operate_page')->name('operate_page');;
        Route::post('settings', 'SettingController@send_settings')->name('send_settings');
        Route::resource('general_setting', 'GeneralSettingController');

        //================ profile ================
        Route::get('profile', 'ProfileController@market_register_form');
        Route::post('profile/store', 'ProfileController@market_register')->name('profile.store');
        Route::post('marketer/delete_img', 'ProfileController@delete_img')->name('delete_img_marketer');


        //================ department ================
        Route::resource('department', 'DepartmentController');
        Route::delete('department/destroy/all', 'DepartmentController@multi_delete')->name('delete_all_department');


        //================ Sub_deparmentController ================
        Route::resource('sub_department', 'Sub_department_Controller');
        Route::delete('sub_department/destroy/all', 'Sub_department_Controller@multi_delete')->name('delete_all_sub_deparment');


        //================ product ================
        Route::resource('product', 'ProductController');
        Route::delete('product/destroy/all', 'ProductController@multi_delete')->name('delete_all_product');
        Route::post('product/delete_img', 'ProductController@delete_img')->name('delete_img_product');


        //================ product_addtion ================
        Route::resource('addtion', 'Product_addtionController');
        Route::delete('addtion/destroy/all', 'Product_addtionController@multi_delete')->name('delete_all_product_addtion');


        //================ offer ================
        Route::resource('offer', 'OfferController');
        Route::delete('offer/destroy/all', 'OfferController@multi_delete')->name('delete_all_offer');


        //================ contact-us ================
        Route::resource('contact', 'ContactController');
        Route::delete('contact/destroy/all', 'ContactController@multi_delete')->name('delete_all_contact');

        //================ coupon ================
        Route::resource('coupon', 'CouponController');
        Route::delete('coupon/destroy/all', 'CouponController@multi_delete')->name('delete_all_coupon');


        Route::get('driver', 'UserController@index_driver');
        Route::get('driver/{id}', 'UserController@show');
        Route::get('client', 'UserController@index_client');
        Route::delete('user/destroy/all', 'UserController@multi_delete')->name('delete_all_user');
        Route::post('user_block', 'UserController@user_block')->name('user_block');
        Route::post('user_is_confirmed', 'UserController@user_is_confirmed')->name('user_is_confirmed');

        //=================orders===================
        Route::resource('orders', 'AdminOrderController');

        Route::any('logout', 'AdminAuth@logout');

    });

});

