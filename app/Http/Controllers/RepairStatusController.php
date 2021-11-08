<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RepairStatus;

class RepairStatusController extends Controller
{
    //Staff view all the repair service from customer
    public function viewRepairServiceListC(){
        $data = RepairStatus::join('customers','customers.cust_id', '=', 'request_services.cust_id')
                                ->where('request_status', '=' , 'Approved')
                                ->where('pickup_status', '=' , 'Accepted')
                                ->select(['request_services.*','customers.cust_name'])
                                ->get();
        return view('ManageRepairStatus.staffRepairStatusList', ['data'=>$data]);
    }

    public function searchServiceC(Request $request){
        $cust_name = $request->cust_name;
        $data = RepairStatus::where('cust_name', 'like' , "%{$cust_name}%")
                                ->where('request_status', '=' , 'Approved')
                                ->where('pickup_status', '=' , 'Accepted')
                                ->join('customers','customers.cust_id', '=', 'request_services.cust_id')
                                ->select(['request_services.*','customers.cust_name'])
                                ->get();
        return view('ManageRepairStatus.staffRepairStatusList', ['data'=>$data]);
    }

    //Display the information to the update form
    public function viewStatusFormC(Request $request){
        $request_id = $request->request_id;
        $data = RepairStatus::where('request_id','=',$request_id)
                                ->join('customers','customers.cust_id', '=', 'request_services.cust_id')
                                ->get(['request_services.*','customers.cust_name']);
        return view('ManageRepairStatus.updateStatusForm', ['data'=>$data]);
    }

    //Staff update the repair status, reason and cost of repair service
    public function updateStatusFormC(Request $request,$request_id){
        $request_id = $request->request_id;
        $repair_status = $request->repair_status;
        $reason = $request->reason;
        $cost = $request->cost;
        $request = RepairStatus::where('request_id', '=' ,$request_id)
            ->update(['repair_status'=>$repair_status, 'reason'=>$reason, 'cost'=>$cost]);
        return redirect()->back()->with('alert', 'Updated Successfully!');
    }

    //Customer view the repair service make
    public function viewCustomerServiceListC(){
        $data = RepairStatus::where('cust_id',session('LoggedUser'))
                                ->where('request_status', '=' , 'Approved')
                                ->where('pickup_status', '=' , 'Accepted')
                                ->get();
        return view('ManageRepairStatus.customerRepairStatusList', ['data'=>$data]);
    }

    public function viewRepairStatusDetailsC(Request $request, $request_id){
        $request_id = $request->request_id;
        $data = RepairStatus::where('cust_id',session('LoggedUser'))
                                ->where('request_id', '=' ,$request_id)
                                ->where('request_status', '=' , 'Approved')
                                ->where('pickup_status', '=' , 'Accepted')
                                ->get();
        return view('ManageRepairStatus.customerRepairStatusDetails', ['data'=>$data]);


    }
}
