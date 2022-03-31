<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\Employees;
use App\Models\Companies;

class MainController extends Controller
{
    public function index(){
        return view('login');
    }

    public function checklogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->email,
            'password' => $request->password
        );

        if(Auth::attempt($user_data)){
            return redirect('main/dashboard');
        }
        else{
            return back()->with('error', 'These credentials do not match our records');
        }

    }

    public function dashboard(){
        $company_det = Companies::latest()->paginate(10);
        return view('admin.dashboard',compact('company_det'));
    }
    public function employee_dashboard(){
        $employee_det = Employees::latest()->join('companies','companies.id','employees.company')->select('employees.*','companies.name as company_name')->paginate(10);
        $company_det = Companies::latest()->get();
        return view('admin.employee',compact('employee_det','company_det'));
    }
    public function create_employee(Request $request){
        
        $this->validate($request, [
            '_token'  =>'required',
            'email'   => 'email|max:255',
            'firstname'  => 'required|max:255|unique:employees',
            'lastname'  => 'required|max:255',
            'phone'  => 'max:255',
            'company'  => 'required|integer',
        ]);
        
        Employees::create([
            'firstname' =>strip_tags($request->firstname), 
            'email' =>strip_tags($request->email), 
            'lastname' =>strip_tags($request->lastname),
            'phone' =>strip_tags($request->phone),
            'company' =>strip_tags($request->company),
        ]);  

        return back()->with('success', 'Created Successfully');
    }
    public function update_employee(Request $request){
        
        $this->validate($request, [
            '_token'  =>'required',
            'email'   => 'email|max:255',
            'firstname'  => 'required|max:255|unique:employees,firstname,' . $request->id,
            'lastname'  => 'required|max:255',
            'phone'  => 'max:255',
            'company'  => 'required|integer',
        ]);
        
        $employee_details = Employees::findOrFail($request->id);
        $employee_details->firstname = strip_tags($request->firstname);
        $employee_details->lastname = strip_tags($request->lastname);
        $employee_details->email = strip_tags($request->email);
        $employee_details->phone = strip_tags($request->phone);
        $employee_details->company = strip_tags($request->company);
        $employee_details->save();
        return back()->with('success', 'Updated Successfully');
    }
    public function store(Request $request){
        
        $this->validate($request, [
            '_token'  =>'required',
            'email'   => 'required|email|max:255',
            'name'  => 'required|max:255|unique:companies',
            //'savefile' => 'mimes:png,jpeg,jpg,svg|dimensions:min_width=100,max_width=100', //commented for testing
            'savefile' => 'mimes:png,jpeg,jpg,svg',
        ]);
        
        if($request->has('savefile')){
            $file = request()->file('savefile'); 
            $destinationPath = storage_path("app/public"); 
            $filename = time() . '.' . $file->getClientOriginalName();
            $upload_success = $file->move($destinationPath, $filename);
        }
        Companies::create([
            'name' =>strip_tags($request->name), 
            'email' =>strip_tags($request->email), 
            'logo' =>isset($filename) ? $filename : null,
            'webiste' =>strip_tags($request->website),
            'address' =>strip_tags($request->address),
        ]);  

        return back()->with('success', 'Created Successfully');
    }
    public function Update_company(Request $request){
        
        $this->validate($request, [
            '_token'  =>'required',
            'id'      =>'required',
            'email'   => 'required|email|max:255',
            'name'  => 'required|max:255|unique:companies,name,' . $request->id,
            //'savefile' => 'mimes:png,jpeg,jpg,svg|dimensions:min_width=100,max_width=100', //commented for testing
            'savefile' => 'mimes:png,jpeg,jpg,svg',
            'webiste'  => 'max:255'
        ]);

        $company_details = Companies::findOrFail($request->id);
        $company_details->name = strip_tags($request->name);
        $company_details->email = strip_tags($request->email);
        $company_details->webiste = strip_tags($request->webiste);
        $company_details->address = strip_tags($request->address);
        if($request->has('savefile')){
            $file = request()->file('savefile'); 
            $destinationPath = storage_path("app/public"); 
            $filename = time() . '.' . $file->getClientOriginalName();
            $upload_success = $file->move($destinationPath, $filename);
            $company_details->logo = $filename;
        }
        $company_details->save();
        return back()->with('success', 'Updated Successfully');
    }
    public function Delete_company($id){
        Companies::findOrFail($id)->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    public function Delete_Employee($id){
        Employees::findOrFail($id)->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    public function logout(){
        Auth::logout();
        return redirect('main');
    }
}

?>
