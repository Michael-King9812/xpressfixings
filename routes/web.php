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


// ============================================================================
// ============================================================================
// Main Index Section Start
// ============================================================================
// ============================================================================

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


// ============================================================================
// ============================================================================
// Main Index Section End
// ============================================================================
// ============================================================================


// ============================================================================
// ============================================================================
// Customer Section Section Start
// ============================================================================
// ============================================================================

// To Customer Index

Route::get('/customer/dashboards', [CustomerController::class, 'indexs'])->name('customer.indexs');

Route::get('/customer/paystack/payment', [CustomerController::class, 'paystackPayment'])->name('customer.payment');

// Route::get('payment-page', [PaymentPage::class]);
Route::get('/customer/verify-payment/{remember_token}/{reference}', [CustomerController::class, 'verify']);




// To Customer Order Details
Route::get('/view/{orderdetails:remember_token}', [CustomerController::class, 'orderdetailss'])->name('customer.orderdetails');

// To Customer State Details
Route::get('/views/{engineers}', [CustomerController::class, 'getEngineersByState'])->name('engineer.orderdetails');

// To Customer State Details
Route::get('/views/engineer/{engineers}', [CustomerController::class, 'getEngineerDetails'])->name('customer.currentCity');

// To Customer Profile
Route::get('/customer/profile', [CustomerController::class, 'profile'])->name('customer.profile');

// To Customer assign Engineer
Route::put('/customer/assign/{engineer}', [CustomerController::class, 'assignEngineer'])->name('customer.assignEngineer');

// Store customer details
Route::post("/customer/orderfix", [CustomerController::class, 'orderfixStore'])->name('customer.orderfixStore');

// Upload proof of payment
Route::put('/upload_payment_proof/{remember_token}', [CustomerController::class, 'uploadProofOfPayment'])->name('customer.uploadProof');

// To Cancle Order request
Route::put('/cancleorder/{cancleOrder}', [CustomerController::class, 'cancleOrderFix'])->name('cancle.order');

// To Order Approval request
Route::put('/approveOrder/{approveFixOrderToken}', [CustomerController::class, 'approveFixOrder'])->name('approve.fixOrder');

// To Cancle Ride request
Route::put('/cancleorder/{approveOrder}', [CustomerController::class, 'approveRide'])->name('approve.order');

// To Cancle Ride request
Route::put('/orderride/', [CustomerController::class, 'orderRide'])->name('order..ride');

// To Cancle Ride request
Route::put('/cancleorder/{cancleRide}', [CustomerController::class, 'cancleRide'])->name('cancle.ride');

// ============================================================================
// ============================================================================
// Customer Section Section End
// ============================================================================


// ============================================================================
// ============================================================================
// Admin Section Section Start
// ============================================================================
// ============================================================================

// To admin Index
// Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');

// To admin Order Details
Route::get('/admins/dashboard', [AdminController::class, 'customers'])->name('admin.customers');

// To admin Order Details
Route::get('/admins/engineers', [AdminController::class, 'engineers'])->name('admin.engineers');

// To admin Order Details
Route::get('/admins/riders', [AdminController::class, 'riders'])->name('admin.riders');

// To admin Approve Engineer Table
Route::get('/admins/approve/engineer', [AdminController::class, 'approveEngineer'])->name('approve.engineer');

// To admin Approve Engineer Details
Route::get('/admins/approve/engineer/{remember_token}', [AdminController::class, 'approveEngineerView'])->name('approveView.engineer');

// To admin Approve Engineer Update
Route::put('/admins/approve/update/{remember_token}', [AdminController::class, 'approveEngineerUpdate'])->name('approveEngineerUpdate');

// // To admin Profile
// Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

// // To Done fixing and Approval
// Route::post('/admin/fixingdone/{remember_token}', [AdminController::class, 'fixingDone'])->name('fixingDone');

// To All Pending
Route::get('Admin/Pending/', [AdminController::class, 'allPending'])->name('allPendings');

// To admin Profile
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

// // To All Done
// Route::get('/Done/', [AdminController::class, 'allDone'])->name('allDone');

// // To All Awaiting Response
// Route::get('/awaitingResponse/', [AdminController::class, 'allAwaitingResponse'])->name('allAwaiting');


// To admin Single Page
Route::get('/admin/view/customerorder/{remember_token}', [AdminController::class, 'singlePages'])->name('admin.viewSingle');

// // To admin Send Price
// Route::put('/admin/view/customerorder/fixprice/{fixpricetoken}', [AdminController::class, 'updatePrice'])->name('admin.deviceFixPrice');

// To list of All Customers
Route::get('/admin/allcustomers', [AdminController::class, 'allCustomers'])->name('admin.allCustomers');

// To list of All Engineers
Route::get('/admin/allengineers', [AdminController::class, 'allEngineers'])->name('admin.allEngineers');

// To list of All Riders
Route::get('/admin/allriders', [AdminController::class, 'allRiders'])->name('admin.allRiders');

// // To Verify Payment Manually
// Route::put('/Verifyiny_Payment/{remember_token}', [AdminController::class, 'verifyPayment'])->name('order.verify');

// To Admin Profile
Route::get('/admin/profiles', [AdminController::class, 'profile'])->name('admin.profile');

// To Admin Add Possible Problems
Route::get('/admin/posible_problems', [AdminController::class, 'addProblems'])->name('admin.addProblems');
Route::get('/admin/edit_problem/{problem}/{remember_token}', [AdminController::class, 'editProblem'])->name('admin.editProblem');

// To Admin Add Engineer
Route::get('/admin/add_engineer', [AdminController::class, 'addEngineer'])->name('admin.addEngineer');

// To Edit Added Engineer
Route::get('/admin/edit_add_engineer/{engineerToken}/{engineersName}', [AdminController::class, 'editAddEngineer'])->name('admin.editAddEngineer');

// / To Admin Add Engineer Store
Route::post('/admin/add_engineer_Store', [AdminController::class, 'addEngineerStore'])->name('admin.addEngineerStore');


// To admin Send Price
Route::put('/approve/customerorder/fixprice/{fixpricetoken}', [AdminController::class, 'updatePrice'])->name('engineer.deviceFixPrice');

// To Deleting Engineer From List
Route::delete('/admin/deletingEngineer/{engineerToken}/{engineersName}', [AdminController::class, 'deleteEngineer'])->name('admin.deleteEngineer');

// To Admin Add Possible Problems Store
Route::post('/admin/add_possible_problems', [AdminController::class, 'storePossibleProblem'])->name('admin.addProblemsStore');
Route::put('/admin/update_possible_problems/{problem}/{token}', [AdminController::class, 'updatePossibleProblem'])->name('admin.updateProblemsStore');

// To Admin Delete Possible Problems
Route::delete('/admin/{add_possible_problems}/{item}', [AdminController::class, 'deleteProblem'])->name('admin.deleteProblem');

// To Admin Add States
Route::get('/admin/state', [AdminController::class, 'addStates'])->name('admin.addStates');



// To Admin Add States Store
Route::post('/admin/add_state', [AdminController::class, 'storeState'])->name('admin.addStateStore');


// To Admin Delete States
Route::post('/admin/Delete_State/{state}', [AdminController::class, 'deleteState'])->name('admin.deleteState');


// To main Details / Components
Route::get('/admin/Components', [AdminController::class, 'orderdetails'])->name('admin.orderdetails');

// // To Approve Order
// Route::put('/admin/Approved/order/{remember_token}', [AdminController::class, 'aprroveOrder'])->name('Approve');

// // To Delete Order
// Route::put('/admin/delete/order/{remember_token}', [AdminController::class, 'deleteOrder'])->name('deleteOrder');

// ============================================================================
// ============================================================================
// Admin Section Section End
// ============================================================================
// ============================================================================



// ============================================================================
// ============================================================================
// Engineer Section Section Start
// ============================================================================
// ============================================================================

// To Signup Engineer
Route::get('engineer/signup', [CustomAuthController::class, 'engineerSignup'])->name('engineer.signup');

// To Engineer Index
Route::get('/engineer/dashboard', [EngineerController::class, 'index'])->name('engineer.index');

// To engineer Order Details
Route::get('/engineers/orderdetails', [EngineerController::class, 'orderdetails'])->name('engineer.orderdetails');

// To engineer Profile
Route::get('/engineer/profile', [EngineerController::class, 'profile'])->name('engineer.profile');

// To Done fixing and Approval
Route::put('/engineer/fixingdone/{remember_token}', [EngineerController::class, 'fixingDone'])->name('fixingDone');

Route::get('/engineer/Mannage_All_Orders', [EngineerController::class, 'customers'])->name('engineer.customers');

// To All Pending
Route::get('/Pending/', [EngineerController::class, 'allPending'])->name('allPending');

// To All Done
Route::get('/Done/', [EngineerController::class, 'allDone'])->name('allDone');

// To All Awaiting Response
Route::get('/awaitingResponse/', [EngineerController::class, 'allAwaitingResponse'])->name('allAwaiting');

// To admin Single Page
Route::get('/engineer/view/customerorder/{remember_token}', [EngineerController::class, 'singlePages'])->name('engineer.viewSingle');

// To View Orders
Route::get('/engineer/Neworders', [EngineerController::class, 'newOrders'])->name('engineer.newOrders');

// To View Orders
Route::get('/engineer/all_done_order', [EngineerController::class, 'doneOrders'])->name('engineer.doneOrders');

// To Verify Payment Manually
Route::put('/Verifying_Payment/{remember_token}', [EngineerController::class, 'verifyPayment'])->name('order.verify');
// To Approve Order
Route::put('/engineer/Approved/order/{remember_token}', [EngineerController::class, 'aprroveOrder'])->name('Approve');

// To Delete Order
Route::put('/engineer/delete/order/{remember_token}', [EngineerController::class, 'deleteOrder'])->name('deleteOrder');

// ============================================================================
// ============================================================================
// Engineer Section Section End
// ============================================================================
// ============================================================================


// ============================================================================
// ============================================================================
// Rider Section Section Start
// ============================================================================
// ============================================================================


// To Rider Index
Route::get('/rider/dashboard', [RiderController::class, 'index'])->name('rider.index');

// To Rider Order Details
Route::get('/riders/orderdetails', [RiderController::class, 'orderdetails'])->name('rider.orderdetails');

// To Rider Profile
Route::get('/rider/profile', [RiderController::class, 'profile'])->name('rider.profile');


// ============================================================================
// ============================================================================
// Rider Section Section End
// ============================================================================
// ============================================================================


// ============================================================================
// ============================================================================
// Custom Authentication Section Section Start
// ============================================================================
// ============================================================================
// ->middleware('alreadyLoggedIn')
// ->middleware('alreadyLoggedIn')

Route::get('/login', [CustomAuthController::class, 'login'])->name('auth.login');
Route::get('/login/engineer', [CustomAuthController::class, 'loginAsEngineer'])->name('auth.engineer');
Route::get('/signup', [CustomAuthController::class, 'registration'])->name('auth.registration');
Route::get('/forgot_password', [CustomAuthController::class, 'forgotPassword'])->name('auth.forgotpassword');
Route::get('/forgotten/password/reset/{token}', [CustomAuthController::class, 'showResetForm'])->name('auth.reset.password.form');
Route::post('password/forgotten/reset', [CustomAuthController::class, 'sendResetLink'])->name('auth.reset.pwrds.link');
Route::post('password/reset', [CustomAuthController::class, 'resetPassword'])->name('user.reset.password');
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('auth.register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::post('/signing/engineer', [CustomAuthController::class, 'loginEngineer'])->name('auth.engineer.login');
// To Add Engineer Store
Route::post('/admin/add_engineer_Store', [CustomAuthController::class, 'addEngineerStore'])->name('addEngineerStore');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');



// ============================================================================
// ============================================================================
// Custom Authentication Section Section End
// ============================================================================
// ============================================================================

// require __DIR__.'/auth.php';
