<?php
use Illuminate\Support\Facades\Route;

//--------------------------------------
//--------------------------------------
//-------------Family Part--------------
//--------------------------------------
//--------------------------------------

Route::group(['namespace' => 'API\Family'], function () {

    //auth
    Route::post('familyLogin', 'FamilyAuthController@family_login');
    Route::post('familyRegister', 'FamilyAuthController@family_register');
    Route::post('getFamilyByPhone', 'FamilyAuthController@getFamilyByPhone');
    Route::post('familyLogout', 'FamilyAuthController@family_logout');

    //profile
    Route::post('updateProfile', 'FamilyProfileController@family_update_profile');

    //helper
    Route::get('allPackages','FamilyHelperController@allPackages');
    Route::get('allBasicCategories','FamilyHelperController@allBasicCategories');
    Route::get('allCountries','FamilyHelperController@allCountries');

    //categories
    Route::get('allFamilyCategories','FamilyCategoryController@allFamilyCategories');
    Route::post('createNewFamilyCategory','FamilyCategoryController@createNewFamilyCategory');
    Route::post('editFamilyCategory','FamilyCategoryController@editFamilyCategory');
    Route::post('getSingleFamilyCategory','FamilyCategoryController@getSingleFamilyCategory');
    Route::post('deleteSingleFamilyCategory','FamilyCategoryController@deleteSingleFamilyCategory');

    //products
    Route::get('allFamilyProducts','FamilyProductController@allFamilyProducts');
    Route::post('createNewFamilyProduct','FamilyProductController@createNewFamilyProduct');
    Route::post('editFamilyProduct','FamilyProductController@editFamilyProduct');
    Route::post('getSingleFamilyProduct','FamilyProductController@getSingleFamilyProduct');
    Route::post('deleteSingleFamilyProduct','FamilyProductController@deleteSingleFamilyProduct');

    //------ tabs ----------
    //home
    Route::post('productsInHome','Tabs\FamilyHomeController@productsInHome');

    //offers
    Route::get('offersTab','Tabs\FamilyHomeController@offersTab');

    //settings
    Route::post('updateReceiveNotification','FamilySettingController@update_notification_status');
    Route::get('familySettings','FamilySettingController@settings');



});//end part of namespace
