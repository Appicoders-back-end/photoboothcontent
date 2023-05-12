<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Services\StripeService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\RequiredIf;
use Illuminate\Validation\ValidationException;
use mysql_xdevapi\Exception;
use Illuminate\Http\Request;
use function Ramsey\Uuid\Generator\timestamp;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:150'],
            'last_name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_number' => ['required', 'numeric', 'digits:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        try {
            $stripeService = new StripeService();

            $user = User::create([
                'name' => sprintf("%s %s", $data['first_name'], $data['last_name']),
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'contact_no' => $data['contact_number'],
                'role' => User::ROLE_CUSTOMER,
                'password' => Hash::make($data['password']),
                'status' => User::ACTIVE,
            ]);

            $user->update([
                'stripe_customer_id' => $stripeService->createCustomer($user)->id
            ]);

            return $user;
        } catch (\Exception $exception) {
            throw ValidationException::withMessages([
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function ajaxRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:150'],
            'last_name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_number' => ['required', 'numeric', 'digits:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $stripeService = new StripeService();
        $user = User::create([
            'name' => sprintf("%s %s", $request->first_name, $request->last_name),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact_no' => $request->contact_number,
            'role' => User::ROLE_CUSTOMER,
            'password' => Hash::make($request->password),
            'status' => User::ACTIVE,
            'email_verified_at' => Carbon::now(),
        ]);

        $user->update([
            'stripe_customer_id' => $stripeService->createCustomer($user)->id
        ]);

        return response()->json(['status' => true, 'message' => "Your account has been created successfully", 'data' => $user]);
    }
}
