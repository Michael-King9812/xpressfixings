<?php

namespace Routes\web;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Events\SendPosition;
use App\Models\User;
use Session;
use App\Models\Orderdetail;
use App\Models\PossibleProblems;
use App\Models\State;


// To Index page
Route::get('/', function () {
    $data = array();

    if (Session::has('UserLoginId')) {
        $data = User::where('id','=', Session::get('UserLoginId'))->first();
    }
    return view('welcome', compact('data'));
})->name('index');


// Laravel 5.1.17 and above
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');

// Laravel 8
// PAYSTACK ROUTE
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);

Route::get('/getform', ['App\Http\Controllers\PaymentController@show'])->name('form');


Route::controller(CustomerController::class)->group(function () {
    Route::name('customer.')->group(function () {
        Route::prefix('/customer/')->group(function () {
            Route::get('/dashboards', 'indexs')->name('indexs');
            Route::get('/paystack/payment', 'paystackPayment')->name('payment');
            Route::get('/verify-payment/{remember_token}/{reference}', 'verify');
            Route::get('/profile', 'profile')->name('profile');
            Route::put('/assign/{engineer}', 'assignEngineer')->name('assignEngineer');
            Route::post("/orderfix", 'orderfixStore')->name('orderfixStore');
        });

        Route::get('/view/{orderdetails:remember_token}', 'orderdetailss')->name('orderdetails');
        Route::get('/views/engineer/{engineers}', 'getEngineerDetails')->name('currentCity');
        Route::put('/upload_payment_proof/{remember_token}', 'uploadProofOfPayment')->name('uploadProof');
    });

    Route::get('/views/{engineers}', 'getEngineersByState')->name('engineer.orderdetails');
    Route::put('/cancleorder/{cancleOrder}', 'cancleOrderFix')->name('cancle.order');
    Route::put('/approveOrder/{approveFixOrderToken}', 'approveFixOrder')->name('approve.fixOrder');
    Route::put('/cancleorder/{approveOrder}', 'approveRide')->name('approve.order');
    Route::put('/orderride/', 'orderRide')->name('order..ride');
    Route::put('/cancleorder/{cancleRide}', 'cancleRide')->name('cancle.ride');
});


Route::controller(AdminController::class)->prefix('admin')->group(function ()
{
    
    Route::name('admin.')->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/orders', 'customers')->name('customers');
        Route::get('/engineers', 'engineers')->name('engineers');
        Route::get('/riders', 'riders')->name('riders');
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/Done/', 'allDone')->name('allDone');
        Route::get('/view/customerorder/{remember_token}', 'singlePages')->name('viewSingle');
        Route::get('/allcustomers', 'allCustomers')->name('allCustomers');
        Route::get('/allengineers', 'allEngineers')->name('allEngineers');
        Route::get('/allriders', 'allRiders')->name('allRiders');
        Route::get('/profiles', 'profile')->name('profile');
        Route::get('/posible_problems', 'addProblems')->name('addProblems');
        Route::get('/edit_problem/{problem}/{remember_token}', 'editProblem')->name('editProblem');
        Route::get('/view/engineers', 'viewEngineers')->name('addEngineer');
        Route::get('/edit_add_engineer/{engineerToken}/{engineersName}', 'editAddEngineer')->name('editAddEngineer');
        Route::get('/state', 'addStates')->name('addStates');
        Route::get('/Components', 'orderdetails')->name('orderdetails');
        Route::post('/add_engineer_Store', 'addEngineerStore')->name('addEngineerStore');
        Route::post('/add_state', 'storeState')->name('addStateStore');
        Route::post('/add_possible_problems', 'storePossibleProblem')->name('addProblemsStore');
        Route::post('/Delete_State/{id}', 'deleteState')->name('deleteState');
        Route::put('/approve/customerorder/fixprice/{fixpricetoken}', 'updatePrice')->name('engineer.deviceFixPrice');
        Route::put('/update_possible_problems/{problem}/{token}', 'updatePossibleProblem')->name('updateProblemsStore');
        Route::delete('/{add_possible_problems}/{item}', 'deleteProblem')->name('deleteProblem');
        Route::delete('/deletingEngineer/{engineerToken}/{engineersName}', 'deleteEngineer')->name('deleteEngineer');

        // Route::get('/profile', 'profile')->name('profile');
        // Route::put('/Verifyiny_Payment/{remember_token}', 'verifyPayment')->name('order.verify');
    });
    Route::get('/approve/engineer', 'approveEngineer')->name('approve.engineer');
    Route::get('/approve/engineer/{remember_token}', 'approveEngineerView')->name('approveView.engineer');
    Route::put('/approve/update/{remember_token}', 'approveEngineerUpdate')->name('approveEngineerUpdate');
    Route::get('newOrders/', 'allPending')->name('allPendings');
    // Route::put('/Approved/order/{remember_token}', 'aprroveOrder')->name('Approve');
    // Route::put('/delete/order/{remember_token}', 'deleteOrder')->name('deleteOrder');

});

Route::controller(EngineerController::class)->prefix('/engineers')->group(function () {
    Route::name('engineer.')->group(function () {
        Route::get('/dashboard', 'index')->name('index');
        Route::get('/orders', 'orders')->name('orders');
        Route::get('/new_orders', 'newOrders')->name('newOrders');
        Route::get('/engineers/orderdetails', 'orderdetails')->name('orderdetails');
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/Mannage_All_Orders', 'customers')->name('customers');
        Route::get('/view/customerorder/{remember_token}', 'singlePages')->name('viewSingle');
        Route::get('/all_done_order', 'doneOrders')->name('doneOrders');

    });

    Route::get('/Pending/', 'allPending')->name('allPending');
    Route::get('/Done/{engineerToken}', 'allDone')->name('allDone');
    Route::get('/awaitingResponse/', 'allAwaitingResponse')->name('allAwaiting');
    Route::put('/Verifying_Payment/{remember_token}', 'verifyPayment')->name('order.verify');
    Route::put('/Approved/order/{remember_token}', 'aprroveOrder')->name('Approve');
    Route::put('/delete/order/{remember_token}', 'deleteOrder')->name('deleteOrder');
    Route::put('/fixingdone/{remember_token}', 'fixingDone')->name('fixingDone');
});



// To Rider Index
Route::get('/rider/dashboard', [RiderController::class, 'index'])->name('rider.index');

// To Rider Order Details
Route::get('/riders/orderdetails', [RiderController::class, 'orderdetails'])->name('rider.orderdetails');

// To Rider Profile
Route::get('/rider/profile', [RiderController::class, 'profile'])->name('rider.profile');

// ->middleware('alreadyLoggedIn')
// ->middleware('alreadyLoggedIn')


Route::controller(CustomAuthController::class)->group(function () {
    Route::name('auth.')->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::get('/login/engineer', 'loginAsEngineer')->name('engineer');
        Route::post('/signing/engineer', 'loginEngineer')->name('engineer.login');
        Route::post('/register-user', 'registerUser')->name('register-user');
        Route::get('/forgotten/password/reset/{token}', 'showResetForm')->name('reset.password.form');
        Route::post('password/forgotten/reset', 'sendResetLink')->name('reset.pwrds.link');
    Route::get('/signup', 'registration')->name('registration');
    Route::get('/forgot_password', 'forgotPassword')->name('forgotpassword');

    });
    Route::get('engineer/signup', 'engineerSignup')->name('engineer.signup');
    Route::post('password/reset', 'resetPassword')->name('user.reset.password');
    Route::post('/login-user', 'loginUser')->name('login-user');
    // To Add Engineer Store
    Route::post('/admin/add_engineer_Store', 'addEngineerStore')->name('addEngineerStore');
    Route::get('/logout', 'logout')->name('logout');
});

