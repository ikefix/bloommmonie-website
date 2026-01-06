<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration
     */
    protected $redirectTo = '/welcome';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Validate the registration data
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'company_phone' => ['required', 'string', 'max:20'],
            'company_name' => ['required', 'string', 'max:255'],

            'num_employees' => ['required', 'string'],
            'annual_revenue' => ['required', 'string'],

            'industry' => ['required', 'string'],
            'custom_industry' => ['nullable', 'string'],

            'current_inventory_system' => ['required', 'string'],
            'current_inventory_system_other' => ['nullable', 'string'],

            // Location (Nigeria only)
            'country' => ['required', 'in:Nigeria'],
            'state' => ['required', 'string', 'max:100'],
        ]);
    }

    /**
     * Create a new user instance after registration
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            'company_phone' => $data['company_phone'],
            'company_name' => $data['company_name'],
            'num_employees' => $data['num_employees'],
            'annual_revenue' => $data['annual_revenue'],

            'industry' => $data['industry'],
            // 'custom_industry' => $data['custom_industry'] ?? null,m                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            m    m m                 m                            

            'current_inventory_system' => $data['current_inventory_system'],

            // Force Nigeria
            'country' => 'Nigeria',
            'state' => $data['state'],

            // Defaults
        
            
        ]);
    }
}
