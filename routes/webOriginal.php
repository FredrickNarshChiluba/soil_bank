<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

// Route::view('/', 'site.pages.homepage');
Route::get('/notify', function () {
   
    $user = \App\Models\User::find(1);

    $details = [
            'greeting' => 'Hi Admin',
            'body' => 'This is to notify u about the copoun request i have made',
            'thanks' => 'Thank you for visiting codechief.org!',
    ];

    $user->notify(new \App\Notifications\TaskComplete($details));

    return dd("Done");
});

Route::get('markAsRead', function(){

	auth()->user()->unreadNotifications->markAsRead();

	return redirect()->back();

})->name('markRead');
Route::get('/test', function () {
    phpinfo();
});


Route::view('/', 'auth.login');


Route::view('/index1', 'site.Purchase.extends.index1');
Route::view('/index2', 'site.Purchase.extends.index2');
Route::view('/index3', 'site.Purchase.extends.index3');
Route::view('/index', 'site.Purchase.extends.index4');

Route::get('/change_password', 'Profile@profile_pass')->name('change_password');
Route::post('/change_password/post', 'Profile@change_user')->name('change.password');

Route::get('/profile', 'Admin\Profiles@profile')->name('profile');
Route::post('/user_profile', 'Admin\Profiles@updateuser')->name('user_profile.employe');
Route::any('/clients/index_cl', 'Admin\Profiles@index')->name('clients.index');
Route::post('/clients/create_pro', 'Admin\Profiles@create')->name('clients.create_pro');
Route::post('/user/edit_pro', 'Admin\Profiles@edituser')->name('user.edit_pro');
Route::get('/user/delete/{id}', 'Admin\Profiles@delete')->name('user.delete');



Route::get('/profiles', 'Admin\Profile@profile')->name('profiles');
Route::post('/user_profiles', 'Admin\Profile@updateuser')->name('user_profiles.employe');
Route::any('/users/indexd', 'Admin\Profile@index')->name('users.indexd');
Route::get('/user/change_password', 'Admin\Profile@profile_pass')->name('user.change_password');
Route::post('/user/edit_pro', 'Admin\Profile@edituser')->name('user.edit_pro');
Route::post('/user/change_password/post', 'Admin\Profile@change_user')->name('user.change.password');

Route::get('usersc/{user}', 'Client_update@edit')->name('users.index');
Route::post('usersc','Client_update@update')->name('users.index.update');

Route::get('/Client_Update/{user}', 'HomeController@profile')->name('auth.user');
Route::post('/userUpdates', 'HomeController@userUpdate')->name('auth.user');


Route::get('/charts', 'ChartController@index')->name('charts');//working
Route::view('/About_us', 'site.pages.cart');
Route::get('/Dashboard', 'Site\DashboardController@index')->name('site.Dashboard.index');

Route::get('Client_based', 'Client_Vouncher_Controller@Client_based')->name('site.Dashboard.Client_index');
Route::get('send', 'Client_Vouncher_Controller@store');
Route::post('/Client_bassed', 'Client_Vouncher_Controller@store')->name('site.Dashboard.store');
Route::get('/Client_baseds', 'ClientController@Client_baseds');
Route::get('/Copoun_baseds', 'VouncherController@Client_baseds');

Route::get('/Soil_Samples', 'ClientController@Client_based')->name('site.Purchase.index1');
Route::get('/Copoun_Requests', 'ClientController@show')->name('site.Purchase.index2');

//user updaTE


// Route::post('/update', 'EmployeeController@update')->name('site.Employees.update');

Route::get('/TAsk_Assigned', 'Site\Emplo_project@index')->name('Site.pages.product');


Route::get('/create', 'Auth\RegisterController@create')->name('auth.register');
 Route::post('/store', 'Auth\RegisterController@store')->name('auth.register');

Route::group(['middleware' => ['auth']], function () {
	// Route::get('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout.index');
	// Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');

	// Route::get('checkout/payment/complete', 'Site\CheckoutController@complete')->name('checkout.payment.complete');
    Route::get('login', [LoginController::class, 'create']);
    Route::post('login', [LoginController::class, 'redirectTo']);

	Route::get('account/orders', 'Site\AccountController@getOrders')->name('account.orders');

	Route::group(['prefix'  =>   'EmployeeZ'], function() {

        Route::get('/', 'EmployeeController@index')->name('site.Employees.index');
        Route::get('/create', 'EmployeeController@create')->name('site.Employees.create');
        Route::post('/store', 'EmployeeController@store')->name('site.Employees.store');
        Route::get('/{id}/edit', 'EmployeeController@edit')->name('site.Employees.edit');
        Route::post('/update', 'EmployeeController@update')->name('site.Employees.update');
        Route::get('/{id}/delete', 'EmployeeController@delete')->name('site.Employees.delete');

    });

    
    Route::post('/Client_soil', 'SoilController@store')->name('site.Soil.store');
    Route::get('/{id}/view', 'SoilController@Client_soil')->name('site.Soil.Client_soil');

    Route::group(['prefix'  =>   'Soil_Sample'], function() {

        Route::get('/', 'SoilController@index')->name('site.Soil.index');
        Route::get('/create', 'SoilController@create')->name('site.Soil.create');
        Route::post('/store', 'SoilController@store')->name('site.Soil.store');
        Route::get('/{id}/edit', 'SoilController@edit')->name('site.Soil.edit');
        Route::post('/update', 'SoilController@update')->name('site.Soil.update');
        Route::get('/{id}/delete', 'SoilController@delete')->name('site.Soil.delete');

    });

    Route::group(['prefix'  =>   'Vouncher'], function() {

        Route::get('/', 'VouncherController@index')->name('site.Vouncher.index');
        Route::get('/create', 'VouncherController@create')->name('site.Vouncher.create');
        Route::get('/Copoun_baseds', 'VouncherController@Client_baseds');
        Route::post('/store', 'VouncherController@store')->name('site.Vouncher.store');
        Route::get('/{id}/edit', 'VouncherController@edit')->name('site.Vouncher.edit');
        Route::post('/update', 'VouncherController@update')->name('site.Vouncher.update');
        Route::get('/{id}/delete', 'VouncherController@delete')->name('site.Vouncher.delete');

    });

    Route::get('users/{user}', 'UsersController@edit')->name('users.edit');
Route::post('users/{user}','UsersController@update')->name('users.edit');
Route::post('users/{user}',  ['as' => 'users.update', 'uses' => 'UsersController@update'])->name('users.edit');




    Route::group(['prefix'  =>   'client'], function() {

        Route::get('/', 'ClientController@index')->name('site.Clients.index');
        // Route::get('/create', 'EmployeeController@create')->name('site.Clients.create');
        // Route::post('/Client_based', 'EmployeeController@Client_based')->name('site.Clients.Client_based');
        // Route::get('/{id}/edit', 'EmployeeController@edit')->name('site.Clients.edit');
        // Route::post('/update', 'EmployeeController@update')->name('site.Clients.update');
        // Route::get('/{id}/delete', 'EmployeeController@delete')->name('site.Clients.delete');site.Dashboard.Client_index

    });
    Route::get('usersc/{user}', 'Client_update@edit');

    Route::group(['prefix'  =>   'client_vouncher'], function() {

        Route::get('/Client_basedz', 'Client_Vouncher_Controller@Client_based')->name('site.Dashboard.Client_index');
        Route::get('/create', 'Client_Vouncher_Controller@create')->name('site.Client_vouncher.create');
        Route::post('/stores', 'Client_Vouncher_Controller@stores')->name('site.Client_vouncher.stores');
       
        Route::post('/validate_copoun', 'Client_Vouncher_Controller@validate')->name('site.Client_vouncher.validate');
        // Route::get('/{id}/edit', 'Client_Vouncher_Controller@edit')->name('site.Client_vouncher.edit');
        // Route::post('/update', 'Client_Vouncher_Controller@update')->name('site.Client_vouncher.update');
        // Route::get('/{id}/delete', 'Client_Vouncher_Controller@delete')->name('site.Client_vouncher.delete');

    });

    Route::get('send', 'NotificationController@send');

    Route::group(['prefix'  =>   'create_copoun'], function() {

        Route::get('/token', 'ClientController@tokens')->name('site.Token.index');
        Route::get('/create', 'ClientController@create')->name('site.Token.create');
        Route::post('/store', 'ClientController@store')->name('site.Token.store');
        // Route::post('/validate_copoun', 'ClientController@validate')->name('site.Token.validate');
        // Route::get('/{id}/edit', 'Token_Controller@edit')->name('site.Token.edit');
        // Route::post('/update', 'Token_Controller@update')->name('site.Token.update');
        // Route::get('/{id}/delete', 'Token_Controller@delete')->name('site.Token.delete');

    });

    Route::group(['prefix'  =>   'LAND'], function() {

        Route::get('/', 'LandController@index')->name('site.Land.index');
        Route::get('/create', 'LandController@create')->name('site.Land.create');
        Route::post('/store', 'LandController@store')->name('site.Land.store');
        Route::get('/{id}/edit', 'LandController@edit')->name('site.Land.edit');
        Route::post('/update', 'LandController@update')->name('site.Land.update');
        Route::get('/{id}/delete', 'LandController@delete')->name('site.Land.delete');

    });

    Route::group(['prefix'  =>   'FARMER'], function() {

        Route::get('/', 'FarmerController@index')->name('site.Farmer.index');
        Route::get('/create', 'FarmerController@create')->name('site.Farmer.create');
        // Route::post('/store', 'FarmerController@store')->name('site.Farmer.store');
        Route::get('/{id}/edit', 'FarmerController@edit')->name('site.Farmer.edit');
        Route::post('/update', 'FarmerController@update')->name('site.Farmer.update');
        Route::get('/{id}/delete', 'FarmerController@delete')->name('site.Farmer.delete');

    });

    Route::get('change-password', 'ChangePasswordController@index')->name('site.change.password');
    Route::post('change-password', 'ChangePasswordController@changePassword');

});
    Route::get('/number_of_cancelled_projects', function () {
            return view('admin.number_of_cancelled_projects');
        })->name('admin.number_of_cancelled_projects'); 

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();
require 'admin.php';




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('auth.login');;


