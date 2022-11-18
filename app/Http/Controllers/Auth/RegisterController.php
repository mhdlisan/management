<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Staff;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:company');
        $this->middleware('guest:staff');
    }

    public function showRegistrationForm ()
    {
        return view('auth.register', ['url' => 'admin']);
    }
    public function showAdminRegistrationForm ()
    {
        return view('auth.register', ['url' => 'admin']);
    }
    public function showCompanyRegisterForm()
    {
        return view('auth.register', ['url' => 'company']);
    }
    public function showStaffRegisterForm()
    {
        return view('auth.register', ['url' => 'staff']);
    }
    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');
    }
    protected function createCompany(Request $request)
    {
        $this->validator($request->all())->validate();
        $company = Company::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/company');
    }
    protected function createStaff(Request $request)
    {
        $this->validator($request->all())->validate();
        $staff = Staff::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/staff');
    }

    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');


    }

    protected function Companyregister(Request $request)
    {
        $this->validator($request->all())->validate();
        $company = Company::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/company');

  
    }
    protected function Staffregister(Request $request)
    {
        $this->validator($request->all())->validate();
        $staff = Staff::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/staff');


    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
