<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckHeader;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace' => 'API'], function () {
    //-----------------------------------------
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('delete-user', 'AuthController@deleteUser');
    //-----------------------------------------
    Route::get('sttings', 'SettingController@showSetting');
    Route::get('slider', 'SettingController@slider');
    Route::get('countries', 'SettingController@countries');
    Route::get('offer-settings', 'SettingController@offerSetting');
    //-----------------------------------------
    Route::get('category', 'PlaceController@categories');
    Route::get('place-by-category', 'PlaceController@placeByCategory');
    Route::get('get-place-by-id', 'PlaceController@getPlaceById');
    Route::get('get-place-by-google-id', 'PlaceController@getPlaceByGoogleId');
    Route::get('get-place-departments', 'PlaceController@getPlaceDepartments');
    Route::get('get-place-products', 'PlaceController@getPlaceProducts');
    Route::get('get-place-departments-products', 'PlaceController@getPlaceDepartmentsProduct');
    //-----------------------------------------
    Route::get('test', 'OrderController@findDrivers');
    Route::get('cron', 'OrderController@cronJob');

    Route::get('Get-coupon', 'SettingController@get_coupons');


    /**
     *  ============================================================
     *
     *  ------------------------------------------------------------
     *
     *  ============================================================
     */
    Route::group(['middleware' => CheckHeader::class], function(){

        // telr payment another link in web.php
        Route::post('pay', 'TelrController@index');

        Route::get('profile', 'AuthController@profile');
        Route::get('get-profile', 'AuthController@getProfile');
        Route::post('update-firebase', 'AuthController@updateFirebase');
        Route::post('logout', 'AuthController@logout');
        Route::post('update-profile', 'AuthController@updateProfile');
        Route::post('update-location', 'AuthController@updateProfile');
        Route::post('update-order-location', 'AuthController@updateOrderLocation');
        Route::post('update-receive-notifications', 'AuthController@updateProfile');
        Route::get('get-driver-location', 'AuthController@getTrackers');
        Route::get('get-user-balance', 'AuthController@getBalance');
        Route::post('delete-user-logo', 'AuthController@deleteUserLogo');
        //-----------------------------------------
        Route::post('create-order', 'OrderController@createOrder');
        Route::post('send-order-to-other-drivers', 'OrderController@sendOrderToOtherDrivers');
        Route::get('get-client-orders', 'OrderController@getClientOrders');
        Route::get('get-driver-orders', 'OrderController@getDriverOrders');
        Route::get('get-driver-new-orders', 'OrderController@getDriverNewOrders');
        Route::get('get-one-order', 'OrderController@getOneOrder');
        Route::post('driver-leave-order', 'OrderController@driverLeaveOrder');
        Route::post('cancel-offer', 'OrderController@cancelOffer');
        Route::post('change-order-status', 'OrderController@changeOrderStatus');
        Route::post('attach-bill', 'OrderController@attachBill');
        Route::post('end-order', 'OrderController@endOrder');
        Route::post('client-end-order', 'OrderController@clientEndOrder');
        Route::post('client-rate-driver', 'OrderController@clientRateDriver');
        Route::get('get-comments', 'OrderController@getComments');
        //-----------------------------------------
        Route::get('get-notifications', 'NotificationController@my');
        Route::get('get-count-unread', 'NotificationController@countUnread');
        Route::post('get-read-notifications', 'NotificationController@readNotification');
        Route::post('delete-notification', 'NotificationController@delete');
        Route::post('delete-user-notification', 'NotificationController@deleteUserNote');
        //-----------------------------------------
        Route::post('create-offer', 'OfferController@create');
        Route::post('driver-refuse-offer', 'OfferController@driverRefuserOffer');
        Route::post('client-accept-offer', 'OfferController@clientAcceptOffer');
        Route::post('client-refuse-offer', 'OfferController@clientRefuseOffer');
        Route::post('client-cancel-order', 'OfferController@clientCancelOrder');
        Route::get('show-driver-offers', 'OfferController@showDriverOffers');
        Route::post('range-offer', 'OfferController@rangeOffer');
        //-----------------------------------------
        Route::get('get-room-msg', 'ChatController@getRoomMsg');
        Route::post('send-chat-msg', 'ChatController@createMsg');


        //-----------------------------------------
    });
});
