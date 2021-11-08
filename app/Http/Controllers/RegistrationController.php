<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Staff;
use App\Models\Rider;
use App\Models\RequestService;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{

    function login(){
        return view('ManageRegister.login');
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }

    function cusregister(){
        return view('ManageRegister.CusRegistration');
    }


    function staffregister(){
        return view('ManageRegister.StaffRegistration');
    }

    function riderregister(){
        return view('ManageRegister.RiderRegistration');
    }

    function saveCus(Request $request){
      // return $request ->input();

       $request->validate([
        'CusName' =>'required',
        'CusPhoneNo' =>'required',
        'CusAddress' =>'required',
        'cust_email' =>'required|email|unique:customers',
        'CusPassword' =>'required|min:4|max:12'
       ]);

       $customer = new Customer();
       $customer->cust_name = $request ->CusName;
       $customer->cust_email = $request ->cust_email;
       $customer->cust_password = Hash::make($request ->CusPassword); //PASSWORD HASHED
       $customer->cust_phone = $request ->CusPhoneNo;
       $customer->cust_address = $request ->CusAddress;
       $save = $customer->save();

       if($save){
           return back()->with('success','User has successfully register');

       }else{
        return back()->with('fail','Something went wrong, try again later');
       }


    }

    function saveStaff(Request $request){
        // return $request ->input();

         $request->validate([
          'sName' =>'required',
          'sPhoneNo' =>'required',
          'sAddress' =>'required',
          'staff_email' =>'required|email|unique:staff',
          'sPassword' =>'required|min:4|max:12'
         ]);

         $staff = new Staff();
         $staff->staff_name = $request ->sName;
         $staff->staff_email = $request ->staff_email;
         $staff->staff_password = Hash::make($request ->sPassword); //PASSWORD HASHED
         $staff->staff_phone = $request ->sPhoneNo;
         $staff->staff_address = $request ->sAddress;
         $save = $staff->save();

         if($save){
             return back()->with('success','User has successfully register');

         }else{
          return back()->with('fail','Something went wrong, try again later');
         }


      }


    function saveRider(Request $request){
        // return $request ->input();

         $request->validate([
          'rName' =>'required',
          'rPhoneNo' =>'required',
          'rAddress' =>'required',
          'rider_email' =>'required|email|unique:riders',
          'rPassword' =>'required|min:4|max:12'
         ]);

         $rider = new Rider();
         $rider->rider_name = $request ->rName;
         $rider->rider_email = $request ->rider_email;
         $rider->rider_password = Hash::make($request ->rPassword); //PASSWORD HASHED
         $rider->rider_phone = $request ->rPhoneNo;
         $rider->rider_address = $request ->rAddress;
         $save = $rider->save();

         if($save){
             return back()->with('success','User has successfully register');

         }else{
          return back()->with('fail','Something went wrong, try again later');
         }

      }

    function check(Request $request){
       // return $request->input();

       $request->validate([
        'userEmail' =>'required|email',
        'userpassword' =>'required|min:4|max:12'
       ]);

        if($request ->role == "Customer"){
            $cusInfo = Customer::where('cust_email','=', $request->userEmail)->first();

            if(!$cusInfo){
                return back()->with('fail','email not recognized');
            }else{

                if(Hash::check($request->userpassword, $cusInfo->cust_password)){
                    $request->session()->put('LoggedUser',$cusInfo->cust_id);
                    return redirect('cushomepage');
                }else{
                    return back()->with('fail','Incorrect Password');
                }
            }
        }else if($request ->role == "Staff"){
            $staffInfo = Staff::where('staff_email','=', $request->userEmail)->first();

            if(!$staffInfo){
                return back()->with('fail','email not recognized');
            }else{

                if(Hash::check($request->userpassword, $staffInfo->staff_password)){
                    $request->session()->put('LoggedUser',$staffInfo->staff_id);
                    return redirect('staffhomepage');
                }else{
                    return back()->with('fail','Incorrect Password');
                }
            }

        }else if($request ->role == "Rider"){
            $riderInfo = Rider::where('rider_email','=', $request->userEmail)->first();

            if(!$riderInfo){
                return back()->with('fail','email not recognized');
            }else{

                if(Hash::check($request->userpassword, $riderInfo->rider_password)){
                    $request->session()->put('LoggedUser',$riderInfo->rider_id);
                    return redirect('riderhomepage');
                }else{
                    return back()->with('fail','Incorrect Password');
                }
            }

        }
    }


    function directToCusHome(){
        $data = ['LoggedUserInfo'=>Customer::where('cust_id','=',session('LoggedUser'))->first()];
        //print_r(RequestService::all()->count());
       // print_r(RequestService::where('cust_id',session('LoggedUser'))->count());
        return view('ManageRegister.CusHomepage',$data);
    }

    function directToStaffHome(){
        $data = ['LoggedUserInfo'=>Staff::where('staff_id','=',session('LoggedUser'))->first()];
        return view('ManageRegister.StaffHomepage',$data);
    }

    function directToRiderHome(){
        $data = ['LoggedUserInfo'=>Rider::where('rider_id','=',session('LoggedUser'))->first()];
        return view('ManageRegister.RiderHomepage',$data);
    }




}
