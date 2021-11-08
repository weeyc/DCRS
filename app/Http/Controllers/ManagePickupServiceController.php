<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RepairStatus;

class ManagePickupServiceController extends Controller
{
    //Customer tracking page
    public function ViewDeliveryStatusC()
    {
        # code...
         $data = RepairStatus::where('cust_id',session('LoggedUser'))
            ->select(['request_services.*'])
            ->get();
        return view('ManagePickupService.TrackingInterface', ['data'=>$data]);
    }

    //Customer click on received button means item has received
    public function updateDeliveryStatusC(Request $request,$request_id){
        $request_id = $request->request_id;
        $delivery_status = $request->delivery_status = 'Received';
        $request = RepairStatus::where('request_id', '=' ,$request_id)
            ->update(['delivery_status'=>$delivery_status]);

            return redirect()->back()->with('alert', 'Item Received!!');
    }

    //rider view available job
    public function ViewPickupOrderC()
    {
        $data = RepairStatus::join('customers','customers.cust_id', '=', 'request_services.cust_id')
        ->where('request_status', '=' , 'Approved')
        ->select(['request_services.*','customers.cust_name', 'customers.cust_phone', 'customers.cust_address'])
        ->where('rider_id', '=', null)
        ->get();
    return view('ManagePickupService.PickupOrderInterface', ['data'=>$data]);
    }

    //rider accept the job
    public function updatePickupStatusC(Request $request,$request_id){
        $request_id = $request->request_id;

        $pickup_status = 'Accepted';
        $request = RepairStatus::where('request_id', '=' ,$request_id)
                    ->update(['rider_id'=>session('LoggedUser'), 'pickup_status'=>$pickup_status]);
                  return redirect()->back()->with('alert','Job Accepted!!');
    }

    //rider view thier accepted job
    public function ViewAcceptedOrderC()
    {
        $data = RepairStatus::join('customers','customers.cust_id', '=', 'request_services.cust_id')
        ->where('request_status', '=' , 'Approved')
        ->where('pickup_status', '=', 'Accepted')
        ->select(['request_services.*','customers.cust_name', 'customers.cust_phone', 'customers.cust_address'])
        ->where('rider_id', '=', session('LoggedUser'))
        ->get();
    return view('ManagePickupService.AcceptedOrderInterface', ['data'=>$data]);
    }

    //rider view to update the progress of his job
    public function ViewDeliveryStatusFormC(Request $request){
        $request_id = $request->request_id;
        $data = RepairStatus::where('request_id','=',$request_id)
                                ->join('customers','customers.cust_id', '=', 'request_services.cust_id')
                                ->get(['request_services.*','customers.cust_name','customers.cust_phone', 'customers.cust_address']);
        return view('ManagePickupService.UpdateDeliveryService', ['data'=>$data]);
    }

    //rider update the progress of his job
    public function UpdateDeliveryStatusFormC(Request $request,$request_id)
    {
        $request_id = $request->request_id;
        $delivery_status = $request->delivery_status;
        $request = RepairStatus::where('request_id', '=' ,$request_id)
            ->update(['delivery_status'=>$delivery_status]);

            return redirect()->back()->with('alert', 'Successfully update');
    }
}
