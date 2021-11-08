<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Rider;
use Illuminate\Support\Facades\DB;

class AccController extends Controller
{
    //Staff view all customer account
    function staffViewAccC()
    {
        $data = Customer::paginate(5);
        return view('ManageAccount.staffViewAcc',['cust'=>$data]);
    }
    //Staff edit customer account
    function staffEditC($cust_id)
    {
        $data = Customer::find($cust_id);
        return view('ManageAccount.editStaffAcc',['customer'=>$data]);
    }
    //Staff update customer account
    function staffUpdateC(Request $request, $cust_id)
    {
        $data = Customer::find($cust_id);
        $data->cust_name = $request->cust_name;
        $data->cust_phone = $request->cust_phone;
        $data->cust_email = $request->cust_email;
        $data->cust_address = $request->cust_address;
        $data->save();
        return redirect('staffViewAcc');
    }
    //Staff delete customer account
    function deleteCustAccC($cust_id)
    {
        $data = Customer::find($cust_id)->delete();
        return redirect('staffViewAcc');
    }
    //Staff ban customer account
    function banCustAccC($cust_id)
    {
        $data = Customer::find($cust_id);
        $data->cust_status = 'Ban';
        $data->save();
        return redirect('staffViewAcc');
    }

    //Customer view own profile
    function custViewAccC()
    {
        $data = Customer::find(session('LoggedUser'));
        return view('ManageAccount.custViewAcc',['cust'=>$data]);
    }
    //Customer edit own profile
    function custEditC(Request $request)
    {
        $data = Customer::find(session('LoggedUser'));
        return view('ManageAccount.editCustAcc',['cust'=>$data]);
    }
    //Customer update own profile
    function custUpdateC(Request $request)
    {
        $data = Customer::find(session('LoggedUser'));
        $data->cust_name = $request->cust_name;
        $data->cust_phone = $request->cust_phone;
        $data->cust_email = $request->cust_email;
        $data->cust_address = $request->cust_address;
        $data->save();
        return redirect('custViewAcc');
    }

    //Rider view own profile
    function riderViewAccC()
    {
        $data = Rider::find(session('LoggedUser'));
        return view('ManageAccount.riderViewAcc',['rider'=>$data]);
    }
    //Rider edit own profile
    function riderEditC(Request $request)
    {
        $data = Rider::find(session('LoggedUser'));
        return view('ManageAccount.editRiderAcc',['rider'=>$data]);
    }
    //Rider update own profile
    function riderUpdateC(Request $request)
    {
        $data = Rider::find(session('LoggedUser'));
        $data->rider_name = $request->rider_name;
        $data->rider_phone = $request->rider_phone;
        $data->rider_email = $request->rider_email;
        $data->rider_address = $request->rider_address;
        $data->save();
        return redirect('riderViewAcc');
    }
}
