<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AccController;
use App\Http\Controllers\RequestServiceController;
use App\Http\Controllers\RepairStatusController;
use App\Http\Controllers\ManagePickupServiceController;
use App\Http\Controllers\PaymentController;



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


//------------------------Manage Register------------------------------//

Route::get('/',[RegistrationController::class, 'login'])->name('ManageRegistrationUsers.homepage');
Route::get('/logout',[RegistrationController::class, 'logout'])->name('ManageRegister.Logout');
Route::post('/savecus',[RegistrationController::class, 'saveCus'])->name('ManageRegister.SaveCus');
Route::post('/check',[RegistrationController::class, 'check'])->name('ManageRegister.Check');
Route::get('/cusregister',[RegistrationController::class, 'cusregister'])->name('ManageRegister.CusRegistration');
Route::get('/staffregister',[RegistrationController::class, 'staffregister'])->name('ManageRegister.StaffRegistration');
Route::post('/saveStaff',[RegistrationController::class, 'saveStaff'])->name('ManageRegister.SaveStaff');
Route::get('/riderregister',[RegistrationController::class, 'riderregister'])->name('ManageRegister.RiderRegistration');
Route::post('/saveRider',[RegistrationController::class, 'saveRider'])->name('ManageRegister.SaveRider');

//------------------------End Manage Register------------------------------//


//Login Authorization Check
Route::group(['middleware'=>['AuthCheck']],function(){

    //Users homepage
    Route::get('/cushomepage',[RegistrationController::class, 'directToCusHome']);
    Route::get('/riderhomepage',[RegistrationController::class, 'directToRiderHome']);
    Route::get('/staffhomepage',[RegistrationController::class, 'directToStaffHome']);


        //------------------------Manage Account------------------------------//
         //--Staff--//
         Route::get('/staffViewAcc', function () {
            return view('ManageAccount.staffViewAcc');
        });
        Route::get('/staffViewAcc',[AccController::class, 'staffViewAccC']);
        Route::get('/editStaffAcc/{id}', [AccController::class, 'staffEditC']);
        Route::post('/editStaffAcc/{id}', [AccController::class, 'staffUpdateC']);
        Route::get('/deleteCustAcc/{id}', [AccController::class, 'deleteCustAccC']);
        Route::get('/banCustAcc/{id}', [AccController::class, 'banCustAccC']);

        //--Customer--//
        Route::get('/custViewAcc', [AccController::class, 'custViewAccC']);
        Route::get('/editCustAcc', [AccController::class, 'custEditC']);
        Route::post('/editCustAcc', [AccController::class, 'custUpdateC']);

        //--Rider--//
        Route::get('/riderViewAcc', [AccController::class, 'riderViewAccC']);
        Route::get('/editRiderAcc', [AccController::class, 'riderEditC']);
        Route::post('/editRiderAcc', [AccController::class, 'riderUpdateC']);



        //------------------------End Manage Account------------------------------//






        //------------------------Manage Request Service------------------------------//
        //--Staff--//
        Route::get('/ApproveOrReject', [RequestServiceController::class, 'ViewList']);
        Route::post('/Approve', [RequestServiceController::class, 'ApproveC']) ->name('ManageRequestService.Approve');
        Route::post('/Reject', [RequestServiceController::class, 'RejectC']) ->name('ManageRequestService.Reject');

        //--Customer--//
        Route::get('/AddRequest', function () {
            return view('ManageRequestService.AddRequest');
        });
        Route::post('/AddRequest', [RequestServiceController::class, 'AddRequestC']);
        Route::get('/ViewRequestStatus', [RequestServiceController::class, 'ViewRequestStatusC']);


        //------------------------End Manage Request Service------------------------------//





        //------------------------Manage Pick-up Service------------------------------//
        //---customer---//
        Route::get('/TrackingInterface', [ManagePickupServiceController::class, 'ViewDeliveryStatusC']);
        Route::get('/TrackingInterface/{request_id}', [ManagePickupServiceController::class, 'updateDeliveryStatusC']);
        //---rider---//
        Route::get('/PickupOrderInterface', [ManagePickupServiceController::class, 'ViewPickupOrderC']);
        Route::get('/PickupOrderInterface/{request_id}', [ManagePickupServiceController::class, 'updatePickupStatusC']);
        Route::get('/AcceptedOrderInterface', [ManagePickupServiceController::class, 'ViewAcceptedOrderC']);
        Route::get('/UpdateDeliveryService/{request_id}', [ManagePickupServiceController::class, 'ViewDeliveryStatusFormC']);
        Route::post('/UpdateDeliveryService/{request_id}', [ManagePickupServiceController::class, 'UpdateDeliveryStatusFormC']);

        //------------------------End Manage Pick-up Service------------------------------//







        //------------------------Manage Repair Status------------------------------//

            //--Staff--//
            Route::get('/staffRepairStatusList', [RepairStatusController::class, 'viewRepairServiceListC']);
            Route::get('/updateStatusForm/{request_id}', [RepairStatusController::class, 'viewStatusFormC']);
            Route::post('/searchService', [RepairStatusController::class, 'searchServiceC']);
            Route::post('/updateStatusForm/{request_id}', [RepairStatusController::class, 'updateStatusFormC']);

            //--Customer--//
            Route::get('/customerRepairStatusList', [RepairStatusController::class, 'viewCustomerServiceListC']);
            Route::get('/customerRepairStatusDetails/{request_id}', [RepairStatusController::class, 'viewRepairStatusDetailsC']);

        //------------------------End Manage Repair Status------------------------------//





        //------------------------Manage Payment------------------------------//

            //--Customer--//
            Route::get('/cusmanagepayment',[PaymentController::class, 'ViewToPayC_ViewToUploadProofC']);
            Route::get('/checkout/request_id/{request_id}',[PaymentController::class, 'ViewOrderSummaryC']);
            Route::post('/update_address',[PaymentController::class, 'UpdateAddressC'])->name('ManagePayment.UpdateAddress');
            Route::post('/add/cod_order',[PaymentController::class, 'AddCoDOrderC'])->name('ManagePayment.AddCoDOrder');
            Route::post('/upload_proof',[PaymentController::class, 'UploadProofC'])->name('ManagePayment.UploadProof');
            Route::get('/paymentnotification/{request_id}',[PaymentController::class, 'displayNotification']);
            Route::post('/add_payment',[PaymentController::class, 'AddPaymentC'])->name('ManagePayment.AddPayment');
            Route::get('/codnotification', function () {
                return view('ManagePayment.CusCoDNotification');
            });

            //--Staff--//
            Route::get('/staffmanagepayment',[PaymentController::class, 'ViewCustProofC']);
            Route::post('/approving_proof',[PaymentController::class, 'ApproveProofC'])->name('ManagePayment.Approve');
            Route::post('/rejecting_proof',[PaymentController::class, 'RejectProofC'])->name('ManagePayment.Reject');


        //------------------------End Manage Payment------------------------------//


});










