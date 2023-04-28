<?php

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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...
});

	// https://justlaravel.com/paypal-payment-gateway-integration-laravel/
	// https://sujipthapa.co/blog/paypal-integration-omnipay-paypal-php-library-v30-with-laravel
	
	// Route::get('/paypal/{order?}', [
	//     'name' => 'PayPal Express Checkout',
	//     'as' => 'order.paypal',
	//     'uses' => 'PayPalController@form',
	// ]);

	// Route::post('/checkout/payment/{order}/paypal', [
	//     'name' => 'PayPal Express Checkout',
	//     'as' => 'checkout.payment.paypal',
	//     'uses' => 'PayPalController@checkout',
	// ]);

	// Route::get('/paypal/checkout/{order}/completed', [
	//     'name' => 'PayPal Express Checkout',
	//     'as' => 'paypal.checkout.completed',
	//     'uses' => 'PayPalController@completed',
	// ]);

	// Route::get('/paypal/checkout/{order}/cancelled', [
	//     'name' => 'PayPal Express Checkout',
	//     'as' => 'paypal.checkout.cancelled',
	//     'uses' => 'PayPalController@cancelled',
	// ]);

	// Route::post('/webhook/paypal/{order?}/{env?}', [
	//     'name' => 'PayPal Express IPN',
	//     'as' => 'webhook.paypal.ipn',
	//     'uses' => 'PayPalController@webhook',
	// ]);

Route::group(['middleware' => ['web']], function(){

	// Route::get('/', function () {
	// 	return view('welcome');
	// });
	
	Route::get('/login', 'Admin\AuthenticationController@Login')->name('login');
	Route::post('/login', 'Admin\AuthenticationController@LoginPost')->name('login');

	Route::get('/register', 'Admin\AuthenticationController@Register')->name('register');
	Route::post('/register', 'Admin\AuthenticationController@RegisterPost')->name('register');

	// RESET PASSWORD
	// Route::get('/password/reset', 'Admin\AuthenticationController@PasswordReset');
	Route::get('/password/reset', 'Admin\AuthenticationController@PasswordReset');
	Route::post('/password/reset', 'Admin\AuthenticationController@PasswordResetPost');
	Route::get('/password/reset/{user_id}/{token}', 'Admin\AuthenticationController@resetPasswordForm');
	Route::post('/password/reset/form', 'Admin\AuthenticationController@resetPasswordFormPost');

	// LOGOUT
	Route::get('/logout', 'Admin\AuthenticationController@Logout')->name('logout');

	// Route::get('/', 'HomeController@index')->name('home');

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/', 'HomeController@index')->name('home');

	Route::get('/mini-customer-reviews', 'HomeController@miniReviews');

	// FAQs
	Route::get('/faqs', 'FaqsController@faqs')->name('faqs');
	Route::get('faqs-active', 'FaqsController@active');

	// ABOUT US
	Route::get('/about-us', 'AboutUsController@index');

	// TESTIMONIALS
	Route::get('/testimonials', 'TestimonialsController@index');

	// PARKINGS
	Route::post('/get-parkings', 'ParkingsController@getParkings');
	Route::get('/parkings', 'ParkingsController@parkings');
	Route::get('/active-parkings', 'ParkingsController@activeParkings');
	Route::get('/airport/get/{Airport}', 'AirportController@find');
	Route::get('/parking/get/{Parking}', 'ParkingsController@find');

	Route::get('/rating/{Parking}', 'ParkingsController@rating');
	Route::get('/ratings', 'ParkingsController@ratings');

	// CONTACT US
	Route::get('/contact-us', 'ContactUsController@index');
	Route::post('/contact-us-post', 'ContactUsController@post');

	// BLOG
	Route::get('/blog', 'BlogController@index')->name('blog');
	Route::get('/blog/{BlogCategorySetup}', 'BlogController@blogCategoryPosts');
	Route::get('/blog/{BlogCategorySetup}/{BlogPost}', 'BlogController@blogPost')->name('blog-post');

	Route::get('/blog-active-all', 'BlogController@blogActiveAll')->name('blog');
	Route::get('/blog-active-all/count', 'BlogController@blogActiveAllCount')->name('blog');
	Route::get('/blog-comments-active-get/all/{BlogPost}', 'BlogController@blogCommentsActiveAll');
	Route::get('/blog-comments-active-get/count/{BlogPost}', 'BlogController@blogCommentsActiveCount');
	Route::get('/blog-category-posts-active-get/all/{BlogCategorySetup}', 'BlogController@blogCategoryPostsActiveAll');

	Route::get('/blog-recent-posts-max-comments', 'BlogController@recentPostsMaxComments');
	Route::get('/blog-recent-posts', 'BlogController@recentPosts');

	Route::get('/steps-active', 'StepsController@activeAll');
	Route::get('/services-active', 'ServicesController@activeAll');

	Route::get('/how-it-works', 'PagesController@HowItWorks');
	Route::get('/page/how-it-works', 'PagesController@pageHowItWorks');

	Route::get('/meet-and-greet', 'PagesController@MeetAndGreet');
	Route::get('/page/meet-and-greet', 'PagesController@pageMeetAndGreet');

	// AIRPORTS
	Route::get('/setup/airports-get-active/all', 'AirportController@activeAll');
	Route::get('/setup/titles-get-active/all', 'TitlesController@activeAll');

	Route::post('/order/validate', 'PayPalController@orderValidate');
	Route::post('/order', 'PayPalController@orderSave');

	Route::get('/review/{Order}/{ReferenceNo}/{Token}', 'PayPalController@review');
	Route::post('/review/{Order}/{ReferenceNo}/{Token}', 'PayPalController@reviewPost');

	Route::get('/my-bookings', 'MyBookingsController@index');
	Route::post('/my-bookings', 'MyBookingsController@myBookings');

});

// ADMIN USER
Route::group(['middleware' => ['web', 'roleAuthentication']], function(){

	// DASHBOARD
	Route::get('/dashboard', 'Admin\DashboardController@index')->middleware('roleAuthentication');

	// ACL
	Route::get('user/permissions', function () {
		return explode(',', \Auth::user()->permissions);
	});
	Route::get('acl/all', "ACLController@all")->middleware('roleAuthentication');
	Route::get('acl', "ACLController@index")->middleware('roleAuthentication');
	Route::post('acl/user-permission/save', "ACLController@saveUserPermission")->middleware('roleAuthentication');
	Route::get('acl/group', "ACLGroupController@index")->middleware('roleAuthentication');
	Route::get('acl/group/all', "ACLGroupController@all")->middleware('roleAuthentication');
	Route::post('acl/group/save', "ACLGroupController@save")->middleware('roleAuthentication');
	Route::post('acl/group/update', "ACLGroupController@update")->middleware('roleAuthentication');
	Route::get('acl/group/find/{rolegroup}', "ACLGroupController@find")->middleware('roleAuthentication');
	Route::get('user/all', "ACLController@getUsers")->middleware('roleAuthentication');
	Route::get('user/rights/{user}', "ACLController@getUserRights")->middleware('roleAuthentication');

	// SETTINGS
	Route::get('settings', "SettingsController@index")->middleware('roleAuthentication');
	Route::get('settings/get', "SettingsController@ourSettings")->middleware('roleAuthentication');
	Route::get('settings-socials/get', "SettingsController@ourSettingsSocial")->middleware('roleAuthentication');
	Route::post('settings', "SettingsController@update")->middleware('roleAuthentication');
	Route::post('settings/logos', "SettingsController@updateLogos")->middleware('roleAuthentication');

	// ICONS
	Route::get('icons/all', "Setting\CommonController@Icons")->middleware('roleAuthentication');

	// PROFILE
	Route::get('/profile', 'Admin\ProfileController@Profile')->middleware('roleAuthentication');
	Route::post('/profile', 'Admin\AuthenticationController@MyProfileUpdate')->middleware('roleAuthentication');
	Route::post('/profile/avatar', 'Admin\AuthenticationController@MyProfileAvatarUpdate')->middleware('roleAuthentication');
	Route::get('/profile/get', 'Admin\AuthenticationController@MyProfileGet')->middleware('roleAuthentication');
	
	// CHANGE PASSWORD
	Route::get('/change-password', 'Admin\AuthenticationController@changePassword');
	Route::post('/change-password', 'Admin\AuthenticationController@changePasswordPost');

	// USERS
	Route::get('users', 'UsersController@index')->middleware('roleAuthentication');
	Route::post('users/save', 'UsersController@store')->middleware('roleAuthentication');
	Route::get('users-get/all', 'UsersController@all')->middleware('roleAuthentication');
	Route::get('users/find/{User}', 'UsersController@find')->middleware('roleAuthentication');
	Route::post('users/update', 'UsersController@update')->middleware('roleAuthentication');
	Route::get('users-delete/{User}', 'UsersController@delete')->middleware('roleAuthentication');
	Route::post('users/search', 'UsersController@search')->middleware('roleAuthentication');

	Route::get('users-get-active/all', 'UsersController@activeAll')->middleware('roleAuthentication');

	// USERS
	Route::get('user-parkings', 'UserParkingsController@index')->middleware('roleAuthentication');
	Route::post('user-parkings/save', 'UserParkingsController@store')->middleware('roleAuthentication');
	Route::get('user-parkings-get/all', 'UserParkingsController@all')->middleware('roleAuthentication');
	Route::get('user-parkings/find/{UserParking}', 'UserParkingsController@find')->middleware('roleAuthentication');
	Route::post('user-parkings/update', 'UserParkingsController@update')->middleware('roleAuthentication');
	Route::get('user-parkings-delete/{UserParking}', 'UserParkingsController@delete')->middleware('roleAuthentication');
	Route::post('user-parkings/search', 'UserParkingsController@search')->middleware('roleAuthentication');

	// SOCIALS
	Route::get('social-setup', 'Setting\SocialsSetupController@index')->middleware('roleAuthentication');
	Route::post('social-setup/save', 'Setting\SocialsSetupController@store')->middleware('roleAuthentication');
	Route::get('social-setup-get/all', 'Setting\SocialsSetupController@all')->middleware('roleAuthentication');
	Route::get('social-setup/find/{SocialSetup}', 'Setting\SocialsSetupController@find')->middleware('roleAuthentication');
	Route::post('social-setup/update', 'Setting\SocialsSetupController@update')->middleware('roleAuthentication');
	Route::get('social-setup-delete/{SocialSetup}', 'Setting\SocialsSetupController@delete')->middleware('roleAuthentication');

	Route::get('/socials-setup/data', 'Setting\SocialsSetupController@activeAll')->middleware('roleAuthentication');

	// BLOG CATEGORY
	Route::get('blog-category-setup', 'Setting\BlogCategorySetupController@index')->middleware('roleAuthentication');
	Route::post('blog-category-setup/save', 'Setting\BlogCategorySetupController@store')->middleware('roleAuthentication');
	Route::get('blog-category-setup-get/all', 'Setting\BlogCategorySetupController@all')->middleware('roleAuthentication');
	Route::get('blog-category-setup/find/{BlogCategorySetup}', 'Setting\BlogCategorySetupController@find')->middleware('roleAuthentication');
	Route::post('blog-category-setup/update', 'Setting\BlogCategorySetupController@update')->middleware('roleAuthentication');
	Route::get('blog-category-setup-delete/{BlogCategorySetup}', 'Setting\BlogCategorySetupController@delete')->middleware('roleAuthentication');
	Route::post('blog-category-setup/search', 'Setting\BlogCategorySetupController@search')->middleware('roleAuthentication');

	Route::get('blog-category-setup-get-active/all', 'Setting\BlogCategorySetupController@activeAll')->middleware('roleAuthentication');

	// BLOG POST
	Route::get('blog-post', 'BlogPostController@index')->middleware('roleAuthentication');
	Route::post('blog-post/save', 'BlogPostController@store')->middleware('roleAuthentication');
	Route::get('blog-post-get/all', 'BlogPostController@all')->middleware('roleAuthentication');
	Route::get('blog-post/find/{BlogPost}', 'BlogPostController@find')->middleware('roleAuthentication');
	Route::post('blog-post/update', 'BlogPostController@update')->middleware('roleAuthentication');
	Route::post('blog-post/update/avatar', 'BlogPostController@updateAvatar')->middleware('roleAuthentication');
	Route::get('blog-post-delete/{BlogPost}', 'BlogPostController@delete')->middleware('roleAuthentication');
	Route::post('blog-post/search', 'BlogPostController@search')->middleware('roleAuthentication');

	// FAQs
	Route::get('faqs-view', 'FaqsController@index')->middleware('roleAuthentication');
	Route::post('faqs/save', 'FaqsController@store')->middleware('roleAuthentication');
	Route::get('faqs-get/all', 'FaqsController@all')->middleware('roleAuthentication');
	Route::get('faqs/find/{Faq}', 'FaqsController@find')->middleware('roleAuthentication');
	Route::post('faqs/update', 'FaqsController@update')->middleware('roleAuthentication');
	Route::get('faqs-delete/{Faq}', 'FaqsController@delete')->middleware('roleAuthentication');
	Route::post('faqs/search', 'FaqsController@search')->middleware('roleAuthentication');

	// STEPS
	Route::get('steps-view', 'StepsController@index')->middleware('roleAuthentication');
	Route::post('steps/save', 'StepsController@store')->middleware('roleAuthentication');
	Route::get('steps-get/all', 'StepsController@all')->middleware('roleAuthentication');
	Route::get('steps/find/{Step}', 'StepsController@find')->middleware('roleAuthentication');
	Route::post('steps/update', 'StepsController@update')->middleware('roleAuthentication');
	Route::post('steps/update/avatar', 'StepsController@updateAvatar')->middleware('roleAuthentication');
	Route::get('steps-delete/{Step}', 'StepsController@delete')->middleware('roleAuthentication');
	Route::post('steps/search', 'StepsController@search')->middleware('roleAuthentication');

	// SERVICES
	Route::get('services-view', 'ServicesController@index')->middleware('roleAuthentication');
	Route::post('services/save', 'ServicesController@store')->middleware('roleAuthentication');
	Route::get('services-get/all', 'ServicesController@all')->middleware('roleAuthentication');
	Route::get('services/find/{Service}', 'ServicesController@find')->middleware('roleAuthentication');
	Route::post('services/update', 'ServicesController@update')->middleware('roleAuthentication');
	Route::get('services-delete/{Service}', 'ServicesController@delete')->middleware('roleAuthentication');
	Route::post('services/search', 'ServicesController@search')->middleware('roleAuthentication');

	// PAGES
	Route::get('pages-view', 'PagesController@index')->middleware('roleAuthentication');
	Route::post('pages/save', 'PagesController@store')->middleware('roleAuthentication');
	Route::get('pages-get/all', 'PagesController@all')->middleware('roleAuthentication');
	Route::get('pages/find/{Page}', 'PagesController@find')->middleware('roleAuthentication');
	Route::post('pages/update', 'PagesController@update')->middleware('roleAuthentication');
	Route::get('pages-delete/{Page}', 'PagesController@delete')->middleware('roleAuthentication');
	Route::post('pages/search', 'PagesController@search')->middleware('roleAuthentication');

	// PARKING
	Route::get('parking', 'ParkingsController@index')->middleware('roleAuthentication');
	Route::post('parking/save', 'ParkingsController@store')->middleware('roleAuthentication');
	Route::get('parking-get/all', 'ParkingsController@all')->middleware('roleAuthentication');
	Route::get('parking/find/{Parking}', 'ParkingsController@find')->middleware('roleAuthentication');
	Route::get('parking/find/selected-parking-services/{Parking}', 'ParkingsController@findSelectedParkingServices')->middleware('roleAuthentication');
	Route::post('parking/update', 'ParkingsController@update')->middleware('roleAuthentication');
	Route::post('parking/update/avatar', 'ParkingsController@updateAvatar')->middleware('roleAuthentication');
	Route::get('parking-delete/{Parking}', 'ParkingsController@delete')->middleware('roleAuthentication');
	Route::post('parking/search', 'ParkingsController@search')->middleware('roleAuthentication');

	Route::get('parkings-get-active/all', 'ParkingsController@activeAll')->middleware('roleAuthentication');

	Route::get('/order/{Order}', 'ParkingHistoryController@order')->middleware('roleAuthentication');
	Route::get('/parking-history/{Parking}', 'ParkingHistoryController@history')->middleware('roleAuthentication');
	Route::get('/parking-orders/{Parking}', 'ParkingHistoryController@parkingOrders')->middleware('roleAuthentication');
	Route::post('/parking-history/search/{Parking}', 'ParkingHistoryController@search')->middleware('roleAuthentication');
	Route::post('/order-taken-remarks', 'ParkingHistoryController@orderTakenRemarks')->middleware('roleAuthentication');
	Route::post('/order-completed-remarks', 'ParkingHistoryController@orderCompletedRemarks')->middleware('roleAuthentication');

	Route::group(['prefix' => 'setup'], function () {
		// AIRPORT
		Route::get('airport', 'AirportController@index')->middleware('roleAuthentication');
		Route::post('airport/save', 'AirportController@store')->middleware('roleAuthentication');
		Route::get('airport-get/all', 'AirportController@all')->middleware('roleAuthentication');
		Route::get('airport/find/{Airport}', 'AirportController@find')->middleware('roleAuthentication');
		Route::post('airport/update', 'AirportController@update')->middleware('roleAuthentication');
		Route::get('airport-delete/{Airport}', 'AirportController@delete')->middleware('roleAuthentication');
		Route::post('airport/search', 'AirportController@search')->middleware('roleAuthentication');

		// AIRPORT TERMINALS
		Route::get('airport-terminals/{Airport}', 'AirportTermialsController@index')->middleware('roleAuthentication');
		Route::post('airport-terminals/save', 'AirportTermialsController@store')->middleware('roleAuthentication');
		Route::get('airport-terminals-get/all/{Airport}', 'AirportTermialsController@all')->middleware('roleAuthentication');
		Route::get('airport-terminals/find/{AirportTerminal}', 'AirportTermialsController@find')->middleware('roleAuthentication');
		Route::post('airport-terminals/update', 'AirportTermialsController@update')->middleware('roleAuthentication');
		Route::get('airport-terminals-delete/{AirportTerminal}', 'AirportTermialsController@delete')->middleware('roleAuthentication');
		Route::post('airport-terminals/search', 'AirportTermialsController@search')->middleware('roleAuthentication');
		Route::post('airport-terminals/sorting', 'AirportTermialsController@sorting')->middleware('roleAuthentication');

		// PARKING TYPE
		Route::get('title', 'TitlesController@index')->middleware('roleAuthentication');
		Route::post('title/save', 'TitlesController@store')->middleware('roleAuthentication');
		Route::get('title-get/all', 'TitlesController@all')->middleware('roleAuthentication');
		Route::get('title/find/{Title}', 'TitlesController@find')->middleware('roleAuthentication');
		Route::post('title/update', 'TitlesController@update')->middleware('roleAuthentication');
		Route::get('title-delete/{Title}', 'TitlesController@delete')->middleware('roleAuthentication');
		Route::post('title/search', 'TitlesController@search')->middleware('roleAuthentication');

		// PARKING TYPE
		Route::get('parking-types', 'ParkingTypeController@index')->middleware('roleAuthentication');
		Route::post('parking-types/save', 'ParkingTypeController@store')->middleware('roleAuthentication');
		Route::get('parking-types-get/all', 'ParkingTypeController@all')->middleware('roleAuthentication');
		Route::get('parking-types/find/{ParkingType}', 'ParkingTypeController@find')->middleware('roleAuthentication');
		Route::post('parking-types/update', 'ParkingTypeController@update')->middleware('roleAuthentication');
		Route::get('parking-types-delete/{ParkingType}', 'ParkingTypeController@delete')->middleware('roleAuthentication');
		Route::post('parking-types/search', 'ParkingTypeController@search')->middleware('roleAuthentication');

		Route::get('parking-types-get-active/all', 'ParkingTypeController@activeAll')->middleware('roleAuthentication');

		// PARKING SERVICES
		Route::get('parking-services', 'ParkingServicesController@index')->middleware('roleAuthentication');
		Route::post('parking-services/save', 'ParkingServicesController@store')->middleware('roleAuthentication');
		Route::get('parking-services-get/all', 'ParkingServicesController@all')->middleware('roleAuthentication');
		Route::get('parking-services/find/{ParkingService}', 'ParkingServicesController@find')->middleware('roleAuthentication');
		Route::post('parking-services/update', 'ParkingServicesController@update')->middleware('roleAuthentication');
		Route::get('parking-services-delete/{ParkingService}', 'ParkingServicesController@delete')->middleware('roleAuthentication');
		Route::post('parking-services/update/avatar', 'ParkingServicesController@updateAvatar')->middleware('roleAuthentication');
		Route::post('parking-services/search', 'ParkingServicesController@search')->middleware('roleAuthentication');

		Route::get('parking-services-get-active/all', 'ParkingServicesController@activeAll')->middleware('roleAuthentication');
		Route::post('parking-services/sorting', 'ParkingServicesController@sorting')->middleware('roleAuthentication');

		// PARKING TYPE
		Route::get('cancellation', 'CancellationController@index')->middleware('roleAuthentication');
		Route::post('cancellation/save', 'CancellationController@store')->middleware('roleAuthentication');
		Route::get('cancellation-get/all', 'CancellationController@all')->middleware('roleAuthentication');
		Route::get('cancellation/find/{Cancellation}', 'CancellationController@find')->middleware('roleAuthentication');
		Route::post('cancellation/update', 'CancellationController@update')->middleware('roleAuthentication');
		Route::get('cancellation-delete/{Cancellation}', 'CancellationController@delete')->middleware('roleAuthentication');
		Route::post('cancellation/search', 'CancellationController@search')->middleware('roleAuthentication');

		Route::get('cancellations-get-active/all', 'CancellationController@activeAll')->middleware('roleAuthentication');

		// PARKING TYPE
		Route::get('parking-tabs', 'ParkingTabsController@index')->middleware('roleAuthentication');
		Route::post('parking-tabs/save', 'ParkingTabsController@store')->middleware('roleAuthentication');
		Route::get('parking-tabs-get/all', 'ParkingTabsController@all')->middleware('roleAuthentication');
		Route::get('parking-tabs/find/{ParkingTab}', 'ParkingTabsController@find')->middleware('roleAuthentication');
		Route::post('parking-tabs/update', 'ParkingTabsController@update')->middleware('roleAuthentication');
		Route::get('parking-tabs-delete/{ParkingTab}', 'ParkingTabsController@delete')->middleware('roleAuthentication');
		Route::post('parking-tabs/search', 'ParkingTabsController@search')->middleware('roleAuthentication');
		Route::post('parking-tabs/sorting', 'ParkingTabsController@sorting')->middleware('roleAuthentication');

		Route::get('parking-tabs-get-active/all', 'ParkingTabsController@activeAll')->middleware('roleAuthentication');

		// Route::get('airport-setup-get-active/all', 'Setting\AirportController@activeAll')->middleware('roleAuthentication');
	});
});

// NORMAL USER
Route::group(['middleware' => ['web', 'AuthenticationNormal']], function(){
	Route::get('/socials-setup', 'Setting\SocialsSetupController@activeAll')->middleware('AuthenticationNormal');
	// PROFILE
	Route::get('/my-profile', 'Admin\AuthenticationController@MyProfile')->middleware('AuthenticationNormal');
	Route::post('/my-profile', 'Admin\AuthenticationController@MyProfileUpdate')->middleware('AuthenticationNormal');
	Route::post('/my-profile/avatar', 'Admin\AuthenticationController@MyProfileAvatarUpdate')->middleware('AuthenticationNormal');
	Route::get('/my-profile/get', 'Admin\AuthenticationController@MyProfileGet')->middleware('AuthenticationNormal');

	// COMMENT ON BLOG
	Route::post('/blog-post-comment/save', 'BlogController@blogPostCommentSave')->middleware('AuthenticationNormal');
});