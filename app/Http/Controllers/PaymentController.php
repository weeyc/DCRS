<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestService;
use App\Models\Payment;


class PaymentController extends Controller
{
   //Function to display at /cusmanagepayment Page – Dispay customer to pay and to upload list
   public function ViewToPayC_ViewToUploadProofC()
   {
       //get the logged customer id to display it request
       $data['ToPay'] = RequestService::where('cust_id',session('LoggedUser'))
       ->where('repair_status','Completed')
       ->where('payment_status','Unpaid')
       ->get();

        //get the logged customer payment that using cod
       $data['Cod'] = Payment::where('cust_id',session('LoggedUser'))
       ->where('payment_status','COD Progress')
       ->get();

       //count the number of row of customer request
       $data['CountToPay'] = RequestService::where('cust_id',session('LoggedUser'))
       ->where('repair_status','Completed')
       ->where('payment_status','Unpaid')
       ->count();

        //count the number of row of customer using cod
       $data['CountCod'] = Payment::where('cust_id',session('LoggedUser'))
       ->where('payment_status','COD Progress')
        ->count();

        //go to cusmanagepayment page to display stored data in $data
       return view('ManagePayment.CusManagePayment', ['data'=>$data]);
   }

   //function to display the selected request for payment
   public function ViewOrderSummaryC(Request $request_id)
   {
       //get the customer selected request before payment
       $data = RequestService::where('request_id',$request_id->request_id)
                            ->where('payment_status','Unpaid')
                            ->get();

        //go to cuscheckout page to display stored data in $data
       return view('ManagePayment.CusCheckOut', ['data'=>$data]);

   }

   //function to update customer address
   public function UpdateAddressC(Request $request)
   {
        //update the customer address based on $request parameter
        $data = RequestService::where('request_id',$request ->request_id)
                                ->update([
                                    'delivery_address' => $request ->add
                                ]);

         //redirect to checkout page
        if($data){
            return back()->with('success','Update address success!');
        }else{
            return back()->with('fail','Something went wrong, try again later');
            }

   }

    //function to add customer order using cod
   public function AddCoDOrderC(Request $request)
   {
        //return $request->input();
        $payment = new Payment;
        $payment -> cust_id = session('LoggedUser');
        $payment -> request_id = $request ->req_id;
        $payment -> total_cost = $request ->cost;
        $payment -> payment_method = $request ->payment_method;
        $payment -> payment_status = "Cod progress";
        $payment->save();

         //update the customer request order payment status to cod
        $updatePaymentStatus = RequestService::where('request_id',$request ->req_id)
        ->update([
            'payment_status' => "COD Progress"
        ]);

        //redirect to cod notification page after alert user
        if($updatePaymentStatus){
            echo '<script type="text/JavaScript">
                    alert("You Order Using Cash On Delivery is Successful!");
                    window.location.href = "/codnotification";
                </script>';

        }else{
            echo '<script type="text/JavaScript">
                    alert("Your Order failed to placed!");
                </script>';
        }

    }

      //function to upload customer proof of payment
    public function  UploadProofC(Request $request)
    {
        //image file path
        $image = $request->file('file');
        $imageName= time().'.'.$image->extension();
        $image->move(public_path('Images/ManagePayment/Proofs'),$imageName);

         //update the customer uploaded proof in payment table
         $uploadProof = Payment::where('payment_id',$request ->id)
         ->update([
             'proof_of_payment' => $imageName
         ]);

          //update the customer payment status to validating
         $updatePaymentStatus = Payment::where('payment_id',$request ->id)
         ->update([
             'payment_status' => "Validating"
         ]);

         //redirect to cod notification page with alert
         if($uploadProof){
             echo '<script type="text/JavaScript">
                     alert("Proof has been uploaded");
                     window.location.href = "/cusmanagepayment";
                 </script>';

         }else{
             echo '<script type="text/JavaScript">
                     alert("Your proof is failed to upload");
                 </script>';
         }

     }

    //function to for staff to view customers uploaded proofs
     public function ViewCustProofC(){

        //get the list of proof of payment that needed approval
        $photos = Payment::where('payment_status','Validating')->get();

        //redirect to staffmanagepayment page
        return view('ManagePayment.StaffManagePayment',compact('photos'));

     }

     //function for staff to approve customer uploaded proof
     public function ApproveProofC(Request $request)
     {
         //update the customer payment status to completed in payment table
          $approve = Payment::where('payment_id',$request ->payment_id)
                                  ->update([
                                      'payment_status' => 'Completed'
                                  ]);
        //update the customer payment status to completed in request_service table
        $updateStatus = RequestService::where('request_id',$request ->request_id)
                                ->update([
                                    'payment_status' => 'Completed'
                                ]);

        //redirect to staffmanagepayment page with alert
        if($approve){
        echo '<script type="text/JavaScript">
                alert("Approved success");
                window.location.href = "/staffmanagepayment";
            </script>';
        }
        else{
            echo '<script type="text/JavaScript">
                    alert("Approved fail");
                </script>';
        }
     }

    //function for staff to reject customer uploaded proof
     public function RejectProofC(Request $request)
     {
       //update the customer payment status to Cod progress in payment table
          $reject = Payment::where('payment_id',$request ->payment_id)
                                  ->update([
                                      'payment_status' => 'Cod progress'
                                  ]);
    //update the customer payment status to Cod progress in request_service table
        $updateStatus = RequestService::where('request_id',$request ->request_id)
                                ->update([
                                    'payment_status' => 'Cod progress'
                                ]);

        //redirect to staffmanagepayment page
        if($reject){
            echo '<script type="text/JavaScript">
                    alert("Reject success");
                    window.location.href = "/staffmanagepayment";
                </script>';
         } else{
            echo '<script type="text/JavaScript">
                    alert("Reject fail");
                </script>';
        }

     }

    //function to diplay success notification for customer after online payment
     public function displayNotification(Request $request_id)
     {
         $data = RequestService::where('request_id',$request_id->request_id)
                              ->where('payment_status','Unpaid')
                              ->get();

        //redirect to cuspaymentnotification page
         return view('ManagePayment.CusPaymentNotification', ['data'=>$data]);

     }



     //function to add customer payment detail after online payment
     public function AddPaymentC(Request $request)
     {
          //insert the neccesary online payment info
          $payment = new Payment;
          $payment -> cust_id = session('LoggedUser');
          $payment -> request_id = $request ->req_id;
          $payment -> total_cost = $request ->cost;
          $payment -> payment_method = "Online Banking";
          $payment -> payment_status = "Completed";
          $payment->save();

           //update the customer payment status in request table to completed
          $updatePaymentStatus = RequestService::where('request_id',$request ->req_id)
          ->update([
              'payment_status' => "Completed"
          ]);

          //redirect to cusmanagepayment page
          return redirect('/cusmanagepayment');


      }












}
