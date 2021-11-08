<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestService;

class RequestServiceController extends Controller
{
    //
    public function AddRequestC(Request $request)
    {
    //return $request->input();
     $service = new RequestService;
     $service -> cust_id = session('LoggedUser');
     $service -> product_name = $request ->product_name;
     $service -> dmg_info = $request ->dmg_info;
     $service -> pickup_address = $request ->pickup_address;
     $service -> delivery_address = $request ->delivery_address;
     $service -> pickup_time = $request ->pickup_time;
     $service -> pickup_date = $request ->pickup_date;
     $service->save();


     return view('ManageRequestService.AddRequest');
    }

    public function ViewRequestStatusC(Request $request){
        
        $data = RequestService::where('cust_id',session('LoggedUser'))
                                ->get();
                            
        return view('ManageRequestService.ViewRequestStatus', ['data'=>$data]);
    }

    public function ViewList(){
        $data = RequestService:: where('request_status', '=', 'Unapproved')
        ->get();
        
                                
        return view('ManageRequestService.ApproveOrReject', ['data'=>$data]);
    }

    public function ApproveC(Request $request){ 
        $data = RequestService::where('request_id',  $request -> request_id)
                                ->update(['request_status'=>'Approved']);
        return redirect()->back();
    }

    public function RejectC(Request $request){
        $data = RequestService::where('request_id',  $request -> request_id)
                                ->update(['request_status'=>'Reject']);
        return redirect()->back();
    }
}
