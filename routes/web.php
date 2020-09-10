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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/','HomeController@index')->name('admin.index');

Route::prefix('admin')->group(function()
{
	Route::middleware('auth:admin')->group(function()
	{
		Route::group(['middleware'=>'menuPermission'],function()
		{
			//Dashboard Link url
			Route::get('/','HomeController@index')->name('admin.index');

			// Menu 
			Route::get('/menu','Admin\MenuController@index')->name('menu.index');
			Route::get('/menu-add','Admin\MenuController@add')->name('menu.add');
			Route::post('/menu-save','Admin\MenuController@save')->name('menu.save');
			Route::get('/menu-edit/{id}','Admin\MenuController@edit')->name('menu.edit');
			Route::post('/menu-update','Admin\MenuController@update')->name('menu.update');
			Route::post('/menu-status','Admin\MenuController@status')->name('menu.status');
			Route::post('/menu-delete','Admin\MenuController@delete')->name('menu.delete');
			Route::post('/menu-max-order-by','Admin\MenuController@maxOrderBY')->name('menu.maxOrderBy');

			// Menu Action
			Route::get('/menu-action/{id}','Admin\MenuActionController@index')->name('menuAction.index');
			Route::get('/menu-action-add/{menuId}','Admin\MenuActionController@add')->name('menuAction.add');
			Route::post('/menu-action-save','Admin\MenuActionController@save')->name('menuAction.save');
			Route::get('/menu-action-edit/{menuActionId}','Admin\MenuActionController@edit')->name('menuAction.edit');
			Route::post('/menu-action-update','Admin\MenuActionController@update')->name('menuAction.update');
			Route::post('/menu-action-status','Admin\MenuActionController@status')->name('menuAction.status');
			Route::post('/menu-action/delete','Admin\MenuActionController@delete')->name('menuAction.delete');

			// Menu Action Type
			Route::get('/menu-action-type','Admin\MenuActionTypeController@index')->name('menuActionType.index');
			Route::get('/menu-action-type-add','Admin\MenuActionTypeController@add')->name('menuActionType.add');
			Route::post('/menu-action-type-save','Admin\MenuActionTypeController@save')->name('menuActionType.save');
			Route::get('/menu-action-type-edit/{id}','Admin\MenuActionTypeController@edit')->name('menuActionType.edit');
			Route::post('/menu-action-type-update','Admin\MenuActionTypeController@update')->name('menuActionType.update');
			Route::post('/menu-action-type-status','Admin\MenuActionTypeController@status')->name('menuActionType.status');
			Route::post('/menu-action-delete','Admin\MenuActionTypeController@delete')->name('menuActionType.delete');

			//User Manage
			Route::get('/user','Admin\AdminController@index')->name('user.index');
			Route::get('/user-add','Admin\AdminController@addUser')->name('user.add');
			Route::post('/user-save','Admin\AdminController@saveUser')->name('user.save');
			Route::get('/user-edit/{id}','Admin\AdminController@editUser')->name('user.edit');
			Route::post('/user-upate','Admin\AdminController@updateUser')->name('user.update');
			Route::get('/user-change-password/{id}','Admin\AdminController@password')->name('user.changePassword');
			Route::post('/user-save-password','Admin\AdminController@passwordChange')->name('user.savePassword');
			Route::get('/user-profile/{id}','Admin\AdminController@userProfile')->name('user.profile');
			Route::post('/user-delete','Admin\AdminController@deleteUser')->name('user.delete');
			Route::post('/user-status','Admin\AdminController@changeUserStatus')->name('user.status');

			//User Roll Manage
			Route::get('/user-role','Admin\UserRoleController@index')->name('userRole.index');
			Route::get('/user-role-add','Admin\UserRoleController@add')->name('userRole.add');
			Route::post('/user-role-save','Admin\UserRoleController@save')->name('userRole.save');
			Route::get('/user-role-edit/{id}','Admin\UserRoleController@edit')->name('userRole.edit');
			Route::post('/user-role-upate','Admin\UserRoleController@update')->name('userRole.update');
			Route::post('/user-role-delete','Admin\UserRoleController@delete')->name('userRole.delete');
			Route::post('/user-role-status','Admin\UserRoleController@status')->name('userRole.status');
			Route::get('/user-role-permission/{id}','Admin\UserRoleController@permission')->name('userRole.permission');
			Route::post('/user-role-permission-update','Admin\UserRoleController@permissionUpdate')->name('userRole.permissionUpdate');
		
			//Site Information section
			Route::get('/website-information','Admin\WebsiteInformationController@index')->name('websiteInformation.index');
			Route::get('/website-information-add','Admin\WebsiteInformationController@add')->name('websiteInformation.add');
			Route::post('/website-information-save','Admin\WebsiteInformationController@save')->name('websiteInformation.save');
			Route::get('/website-information-edit/{id}','Admin\WebsiteInformationController@edit')->name('websiteInformation.edit');
			Route::post('/website-information-update','Admin\WebsiteInformationController@update')->name('websiteInformation.update');
		
			//Admin Information section
			Route::get('/admin-panel-information','Admin\AdminPanelInformationController@index')->name('adminPanelInformation.index');
			Route::get('/admin-panel-information-add','Admin\AdminPanelInformationController@add')->name('adminPanelInformation.add');
			Route::post('/admin-panel-information-save','Admin\AdminPanelInformationController@save')->name('adminPanelInformation.save');
			Route::get('/admin-panel-information-edit/{id}','Admin\AdminPanelInformationController@edit')->name('adminPanelInformation.edit');
			Route::post('/admin-panel-information-update','Admin\AdminPanelInformationController@update')->name('adminPanelInformation.update');

			// User Menu 
			Route::get('/front-end-menu','Admin\FrontEndMenuController@index')->name('frontEndMenu.index');
			Route::get('/front-end-menu-add','Admin\FrontEndMenuController@add')->name('frontEndMenu.add');
			Route::post('/front-end-menu-save','Admin\FrontEndMenuController@save')->name('frontEndMenu.save');
			Route::get('/front-end-menu-edit/{id}','Admin\FrontEndMenuController@edit')->name('frontEndMenu.edit');
			Route::post('/front-end-menu-update','Admin\FrontEndMenuController@update')->name('frontEndMenu.update');
			Route::post('/front-end-menu-status','Admin\FrontEndMenuController@status')->name('frontEndMenu.status');
			Route::post('/front-end-menu-menu-status','Admin\FrontEndMenuController@menuStatus')->name('frontEndMenu.menuStatus');
			Route::post('/front-end-menu-footer-menu-status','Admin\FrontEndMenuController@footerMenuStatus')->name('frontEndMenu.footerMenuStatus');
			Route::post('/front-end-menu-delete','Admin\FrontEndMenuController@delete')->name('frontEndMenu.delete');
			Route::post('/front-end-menu-max-order-by','Admin\FrontEndMenuController@maxOrderBY')->name('frontEndMenu.maxOrderBy');

			// Socila Links
			Route::get('/social-link','Admin\SocialLinksController@index')->name('socialLink.index');
			Route::get('/social-link-add','Admin\SocialLinksController@add')->name('socialLink.add');
			Route::post('/social-link-save','Admin\SocialLinksController@save')->name('socialLink.save');
			Route::get('/social-link-edit/{id}','Admin\SocialLinksController@edit')->name('socialLink.edit');
			Route::post('/social-link-update','Admin\SocialLinksController@update')->name('socialLink.update');
			Route::post('/social-link-status','Admin\SocialLinksController@status')->name('socialLink.status');
			Route::post('/social-link-delete','Admin\SocialLinksController@delete')->name('socialLink.delete');

			// Sliders
			Route::get('/sliders','Admin\SlidersController@index')->name('sliders.index');
			Route::get('/sliders-add','Admin\SlidersController@add')->name('sliders.add');
			Route::post('/sliders-save','Admin\SlidersController@save')->name('sliders.save');
			Route::get('/sliders-edit/{id}','Admin\SlidersController@edit')->name('sliders.edit');
			Route::post('/sliders-update','Admin\SlidersController@update')->name('sliders.update');
			Route::post('/sliders-status','Admin\SlidersController@status')->name('sliders.status');
			Route::post('/sliders-delete','Admin\SlidersController@delete')->name('sliders.delete');

			// Pages 
			Route::get('/page','Admin\PageController@index')->name('page.index');
			Route::get('/page-add','Admin\PageController@add')->name('page.add');
			Route::post('/page-save','Admin\PageController@save')->name('page.save');
			Route::get('/page-edit/{id}','Admin\PageController@edit')->name('page.edit');
			Route::post('/page-update','Admin\PageController@update')->name('page.update');
			Route::post('/page-status','Admin\PageController@status')->name('page.status');
			Route::post('/page-delete','Admin\PageController@delete')->name('page.delete');

			// Posts
			Route::get('/post/{id}','Admin\PostController@index')->name('post.index');
			Route::get('/post-add/{pageId}','Admin\PostController@add')->name('post.add');
			Route::post('/post-save','Admin\PostController@save')->name('post.save');
			Route::get('/post-edit/{postId}','Admin\PostController@edit')->name('post.edit');
			Route::post('/post-update','Admin\PostController@update')->name('post.update');
			Route::post('/post-status','Admin\PostController@status')->name('post.status');
			Route::post('/post/delete','Admin\PostController@delete')->name('post.delete');

			//club setup
			Route::resource('/club','Admin\ClubController');
			Route::post('/club-delete','Admin\ClubController@delete')->name('club.delete');
			Route::any('/club-status','Admin\ClubController@status')->name('club.status');

			//Game setup
			Route::any('/game','Admin\GamesController@index')->name('game.index');
			Route::any('/game-add','Admin\GamesController@create')->name('game.create');
			Route::any('/game-store','Admin\GamesController@store')->name('game.store');
			Route::any('/game-edit/{id}','Admin\GamesController@edit')->name('game.edit');
			Route::any('/game-update/{id}','Admin\GamesController@update')->name('game.update');
			Route::post('/game-delete','Admin\GamesController@delete')->name('game.delete');
			Route::any('/game-status','Admin\GamesController@status')->name('game.status');

			//Match setup
			Route::any('/match','Admin\MatchesController@index')->name('match.index');
			Route::any('/match-add','Admin\MatchesController@create')->name('match.create');
			Route::any('/match-store','Admin\MatchesController@store')->name('match.store');
			Route::any('/match-edit/{id}','Admin\MatchesController@edit')->name('match.edit');
			Route::any('/match-update/{id}','Admin\MatchesController@update')->name('match.update');
			Route::post('/match-delete','Admin\MatchesController@delete')->name('match.delete');
			Route::any('/match-status','Admin\MatchesController@status')->name('match.status');

			// betting category
			Route::get('/betting_category/{id}','Admin\BettingCategoriesController@index')->name('betting_category.index');
			Route::get('/betting_category-add/{menuId}','Admin\BettingCategoriesController@add')->name('betting_category.add');
			Route::post('/betting_category-save','Admin\BettingCategoriesController@save')->name('betting_category.save');
			Route::get('/betting_category-edit/{betting_category_id}','Admin\BettingCategoriesController@edit')->name('betting_category.edit');
			Route::post('/betting_category-update','Admin\BettingCategoriesController@update')->name('betting_category.update');
			Route::post('/betting_category-status','Admin\BettingCategoriesController@status')->name('betting_category.status');
			Route::post('/betting_category/delete','Admin\BettingCategoriesController@delete')->name('betting_category.delete');

			// bettings
			Route::get('/bett/{id}','Admin\BettsController@index')->name('bett.index');
			Route::get('/bett-add/{menuId}','Admin\BettsController@add')->name('bett.add');
			Route::post('/bett-save','Admin\BettsController@save')->name('bett.save');
			Route::get('/bett-edit/{betting_category_id}','Admin\BettsController@edit')->name('bett.edit');
			Route::post('/bett-update','Admin\BettsController@update')->name('bett.update');
			Route::post('/bett-result','Admin\BettsController@result')->name('bett.result');
			Route::post('/bett-status','Admin\BettsController@status')->name('bett.status');
			Route::post('/bett/delete','Admin\BettsController@delete')->name('bett.delete');

			// Client 
			Route::get('/client','Admin\ClientController@index')->name('client.index');
			Route::get('/client-add','Admin\ClientController@add')->name('client.add');
			Route::post('/client-save','Admin\ClientController@save')->name('client.save');
			Route::get('/client-edit/{id}','Admin\ClientController@edit')->name('client.edit');
			Route::post('/client-update','Admin\ClientController@update')->name('client.update');
			Route::post('/client-status','Admin\ClientController@status')->name('client.status');
			Route::post('/client-delete','Admin\ClientController@delete')->name('client.delete');

			// Client Bets
			Route::get('/client-bets','Admin\ClientBetController@index')->name('clientBet.index');
			Route::get('/client-bets/view/{id}','Admin\ClientBetController@view')->name('clientBet.view');

			//Deposite Request
			Route::any('/deposite-request','Admin\DepositeRequestController@index')->name('depositeRequest.index');
			Route::any('/deposite-request-edit/{id}','Admin\DepositeRequestController@edit')->name('depositeRequest.edit');
			Route::any('/deposite-request-update/{id}','Admin\DepositeRequestController@update')->name('depositeRequest.update');
			Route::post('/deposite-request-delete','Admin\DepositeRequestController@delete')->name('depositeRequest.delete');
			Route::any('/deposite-request-status','Admin\DepositeRequestController@status')->name('depositeRequest.status');

			//Withdraw Request
			Route::any('/withdraw-request','Admin\WithdrawRequestController@index')->name('withdrawRequest.index');
			Route::any('/withdraw-request-edit/{id}','Admin\WithdrawRequestController@edit')->name('withdrawRequest.edit');
			Route::any('/withdraw-request-update/{id}','Admin\WithdrawRequestController@update')->name('withdrawRequest.update');
			Route::post('/withdraw-request-delete','Admin\WithdrawRequestController@delete')->name('withdrawRequest.delete');
			Route::any('/withdraw-request-status','Admin\WithdrawRequestController@status')->name('withdrawRequest.status');

			//Transfer Request
			Route::any('/transfer-request','Admin\TransferRequestController@index')->name('transferRequest.index');
			Route::any('/transfer-request-edit/{id}','Admin\TransferRequestController@edit')->name('transferRequest.edit');
			Route::any('/transfer-request-update/{id}','Admin\TransferRequestController@update')->name('transferRequest.update');
			Route::post('/transfer-request-delete','Admin\TransferRequestController@delete')->name('transferRequest.delete');
			Route::any('/transfer-request-status','Admin\TransferRequestController@status')->name('transferRequest.status');

			//All Transaction
			Route::any('/transaction','Admin\TransactionController@index')->name('transaction.index');

			//Payment Method Setup
			Route::any('/payment-method','Admin\PaymentMethodController@index')->name('payment-method.index');
			Route::any('/payment-method-add','Admin\PaymentMethodController@create')->name('payment-method.create');
			Route::any('/payment-method-store','Admin\PaymentMethodController@store')->name('payment-method.store');
			Route::any('/payment-method-edit/{id}','Admin\PaymentMethodController@edit')->name('payment-method.edit');
			Route::any('/payment-method-update/{id}','Admin\PaymentMethodController@update')->name('payment-method.update');
			Route::post('/payment-method-delete','Admin\PaymentMethodController@delete')->name('payment-method.delete');
			Route::any('/payment-method-status','Admin\PaymentMethodController@status')->name('payment-method.status');

			//Payment Method Setup
			Route::any('/payment-number','Admin\PaymentNumberController@index')->name('payment-number.index');
			Route::any('/payment-number-add','Admin\PaymentNumberController@create')->name('payment-number.create');
			Route::any('/payment-number-store','Admin\PaymentNumberController@store')->name('payment-number.store');
			Route::any('/payment-number-edit/{id}','Admin\PaymentNumberController@edit')->name('payment-number.edit');
			Route::any('/payment-number-update/{id}','Admin\PaymentNumberController@update')->name('payment-number.update');
			Route::post('/payment-number-delete','Admin\PaymentNumberController@delete')->name('payment-number.delete');
			Route::any('/payment-number-status','Admin\PaymentNumberController@status')->name('payment-number.status');

		});
	});

	//Admin Login Url
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login');
    Route::post('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');

    // Password Reset Routes...
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@passwordForget')->name('admin.password.forget');
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@passwordEmail')->name('admin.password.email');
    Route::get('/new-password/{email}', 'Auth\AdminForgotPasswordController@newPassword')->name('admin.password.newPassword');
    Route::post('/password/save', 'Auth\AdminForgotPasswordController@changePasswordSave')->name('admin.password.save');
});

// Route::get('/home', 'HomeController@index')->name('home');


//Frontend part start here
Route::get('/','FrontendController@index')->name('home.index');

Route::any('/route-plan', 'BookingController@rootPlan')->name('booking.rootPlan');
Route::any('/route-plan-details/{id}', 'BookingController@rootPlanDetails')->name('booking.routePlaneDetails');

Route::prefix('user')->group(function(){
		Route::namespace('Auth\Customer')->group(function () { 
			Route::match(['GET', 'POST'], '/registration', 'CustomerAuthController@registration')->name('user.registration');
			Route::match(['GET'], '/verification', 'CustomerAuthController@completeRegistration')->name('user.verificationLink');

			Route::match(['GET', 'POST'], '/login', 'CustomerAuthController@login')->name('user.login');
		});
	});

	//code for custom/user
	Route::prefix('user')->group(function(){
		//authentication for customer
		Route::middleware('auth:customer')->group(function(){
			Route::any('/dashboard', 'CustomerController@dashboard')->name('user.dashboard');
			Route::any('/profile', 'CustomerController@profile')->name('user.customerProfile');
			Route::any('/profile-edit', 'CustomerController@editProfile')->name('user.editProfile');
			Route::any('/logout', 'Auth\Customer\CustomerAuthController@logout')->name('user.logout');

			Route::any('/betts', 'CustomerBettController@index')->name('user.betts');
			Route::any('/bett-save', 'CustomerBettController@saveBett')->name('user.saveBett');
			Route::any('/betts/view/{id}', 'CustomerBettController@view')->name('user.bettsView');

			Route::any('/deposite', 'CustomerDepositeController@index')->name('user.deposite');
			Route::any('/deposite/request', 'CustomerDepositeController@depositeRequest')->name('user.depositeRequest');
			Route::any('/deposite/get-payment-no', 'CustomerDepositeController@getPaymentNo')->name('user.getPaymentNo');
			Route::any('/deposite/view/{id}', 'CustomerDepositeController@view')->name('user.depositeview');

			Route::any('/withdraw', 'CustomerWithdrawController@index')->name('user.withdraw');
			Route::any('/withdraw/request', 'CustomerWithdrawController@withdrawRequest')->name('user.withdrawRequest');
			Route::any('/withdraw/view/{id}', 'CustomerWithdrawController@view')->name('user.withdrawview');

			Route::any('/transfer', 'CustomerTransferController@index')->name('user.transfer');
			Route::any('/transfer/request', 'CustomerTransferController@transferRequest')->name('user.transferRequest');
			Route::any('/transfer/view/{id}', 'CustomerTransferController@view')->name('user.transferview');

			Route::any('/transaction', 'CustomerTransactionController@index')->name('user.transaction');
			Route::any('/transaction/view/{id}', 'CustomerTransactionController@view')->name('user.transactionview');
		});

	});

