<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\ClientRepository;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function getUserAccount(Request $request)
    {
        $user = $request->user();
        return response()->json(
            $user->load(
                'profile.province',
                'role',
                'profile.city',
                'profile.district',
                'banner'
            )
                ->loadCount(
                    'posts',
                    'events',
                    'books'
                )
        );
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Passport\ClientRepository  $clients
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request, ClientRepository $clients)
    {
        // Validate the login request
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|exists:users',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'invalid_grant',
                'error_description' => 'The user credentials were incorrect.',
                'message' => 'The user credentials were incorrect.'
            ], 401);
        }

        // Get the client credentials
        $client = $clients->find(env('PASSPORT_CLIENT_ID', 2));

        try{
            // Get the access token
            $token = $this->performLogin($request, $client);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'invalid_grant',
                'error_description' => 'The user credentials were incorrect.',
                'message' => 'The user credentials were incorrect.'
            ], 401);
        }
        $user = User::where('email', $request->input('email'))->first();
        $data = [
            'user_id'=>$user->id,
            'kta_id'=>$user->kta_id,
            'name'=>$user->name,
            'email'=>$user->email,
            'user_activated_at'=>$user->user_activated_at,
            'email_activated_at'=>$user->email_activated_at,
            'avatar'=>$user->avatar,
            'age'=>$user->age,
            'profile_id'=>$user->profile->id,
            'nip'=>$user->profile->nip,
            'nik'=>$user->profile->nik,
            'contact'=>$user->profile->contact,
            'nip'=>$user->profile->nip,

            
        ];
        
        // Return the access token response
        return response()->json([
            'message'=>'Login success, welcome ' . $user->name,
            'data' => $user,
            'token_type' => 'Bearer',
            'expires_in' => $token['expires_in'],
            'access_token' => $token['access_token'],
            
           
        ]);
    }

    /**
     * Perform the login and return the access token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Passport\Client  $client
     * @return array
     */
    protected function performLogin(Request $request, $client)
    {
        // Get the user credentials
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Create a new personal access token
            $token = $request->user()->createToken($client->name);

            // Return the access token
            return [
                'access_token' => $token->accessToken,
                'expires_in' => $token->token->expires_at->diffInSeconds(now()),
            ];
        }

        // If authentication fails, throw an error
        throw new \Exception('Invalid login details');
    }

    public function register(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|min:6',
        //     'password_confirmation' => 'required|same:password',
        // ]);

        // $user = new User;
        // $user->fill($request->all());
        // $user->password = bcrypt($request->password);
        // $user->save();
        // $profile = new Profile();
        // if ($request->has('profile')) {
        //     $profile->fill($request->profile);
        // }
        // $user->profile()->save($profile);
        // $success['access_token'] = $user->createToken('AGPAII DIGITAL')->accessToken;
        // $success['token_type'] = 'Bearer';
        // return response()->json($success);
        try {
            if (User::where('email', $request->email)->exists()) {
                return response()->json(['error' => 'Gagal mendaftarkan akun.','message' => 'Email sudah pernah digunakan. Silahkan login atau klik reset password jika Anda lupa dengan password Anda.'], 400);
            }
    
            $user = new User;
            $user->fill($request->all());
            $user->password = bcrypt($request->password);
            $user->save();
    
            $profile = new Profile();
            if ($request->has('profile')) {
                $profile->fill($request->profile);
            }
            $user->profile()->save($profile);
            $data = [
                'user_id'=>$user->id,
                'kta_id'=>$user->kta_id,
                'name'=>$user->name,
                'email'=>$user->email,
                'user_activated_at'=>$user->user_activated_at,
                'email_activated_at'=>$user->email_activated_at,
                'avatar'=>$user->avatar,
                'age'=>$user->age,
                'profile_id'=>$user->profile->id,
                'nip'=>$user->profile->nip,
                'nik'=>$user->profile->nik,
                'contact'=>$user->profile->contact,
                'nip'=>$user->profile->nip,
    
                
            ];
            $success['data'] = $data;
            $success['access_token'] = $user->createToken('AGPAII DIGITAL')->accessToken;
            $success['token_type'] = 'Bearer';
    
            return response()->json($success);
        } catch (\Exception $e) {
            // Handle the exception here
            return response()->json(['error' => 'Registration Failed', 'message' =>'Failed to register. Please try again.'], 500);
        }
    }
}
