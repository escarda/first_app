<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'student_id' => [
                'required',
                'string',
                'max:255',
                'unique:users,student_id',
            ],

            'address' => [
                'nullable',
                'string',
                'max:255',
            ],

            'contact_no' => [
                'nullable',
                'string',
                'max:50',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);
    }

    protected function create(array $data)
    {
        $user = new User();

        $user->name = $data['name'];
        $user->student_id = $data['student_id'];
        $user->address = $data['address'] ?? null;
        $user->contact_no = $data['contact_no'] ?? null;
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);

        $user->save();

        return $user;
    }
}
