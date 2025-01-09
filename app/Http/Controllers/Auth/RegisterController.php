<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_Field;
use App\Models\Field;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/payment';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'age' => ['required', 'integer'],
            'profession' => ['required', 'string', 'max:255'],
            'field' => ['required', 'string',
            function ($attribute, $value, $fail) {
                $fields = array_map('trim', explode(',', $value));
    
                if (count($fields) < 3) {
                    $fail('The ' . $attribute . ' must contain at least 3 fields.');
                }
            },
            ],
            'linkedin' => ['required', 'string', 'regex:/^https:\/\/www\.linkedin\.com\/in\/[a-zA-Z0-9_-]+$/'],
            'mobile' => ['required', 'string', 'regex:/^08[0-9]{8,13}$/'],
            'location' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            'profession' => $data['profession'],
            'linkedin' => $data['linkedin'],
            'mobile' => $data['mobile'],
            'location' => $data['location'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'coin' => 100,
        ]);
        $fields = array_map('trim', explode(',', $data['field'])); 
        foreach ($fields as $fieldName) {
            $field = Field::firstOrCreate(['field' => $fieldName]);

            User_Field::create([
            'user_id' => $user->id,
            'field_id' => $field->id,
            ]);
        }

    return $user;
    }
}
