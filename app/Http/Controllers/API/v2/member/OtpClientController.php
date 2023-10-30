<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\OtpClient;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
class OtpClientController extends Controller
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
    // public function store(Request $request)
    // {
    //     //
    //     // create a new otp client for the user with 4 digit code
    //     // and 5 minutes expired_at
    //     // return response()->json($otpClient);

    //     $request->validate([
    //         'phone_number' => 'required',
    //         'user_id' => [
    //             'exists:users,id',
    //             'required',
    //             function ($attribute, $value, $fail) {
    //                 $otpClient = OtpClient::where('user_id', $value)
    //                     ->where('expired_at', '>', now())
    //                     ->where('is_active', true)
    //                     ->exists();
    //                 if ($otpClient) {
    //                     // return $fail('User already has an active OTP client.');
    //                 }
    //             },
    //         ]
    //     ]);

    //     $otpClient = new OtpClient();
    //     $otpClient->user_id = $request->user_id;
    //     $otpClient->code = rand(1000, 9999);
    //     $otpClient->expired_at = now()->addMinutes(5);
    //     $otpClient->save();

    //     // return response()->json($otpClient);
    //     // send otp client code to user phone number with guzzle

    //     $client = new \GuzzleHttp\Client();
    //     $response = $client->request(
    //         'POST',
    //         'https://sendtalk-api.taptalk.io/api/v1/message/send_whatsapp',
    //         [
    //             'headers' => [
    //                 'API-Key' => env('TAPTALK_API_KEY', 'e76558b14f95cc32bea7aec24c9fbd7cc8166706b9e3a7757e2bba729d21e8ae'),
    //                 'Content-Type' => 'application/json',
    //                 'User-Agent' => 'taptalk.io',
    //             ],
    //             'json' => [
    //                 'phone' => $request->phone_number,
    //                 'messageType' => 'otp',
    //                 'body' => "Kode OTP ({$otpClient->code}). Pesan otomatis dari AGPAII DIGITAL [Tidak dapat membalas pesan]. Harap jangan memberikan kode ini kepada siapapun.",
    //             ]
    //         ]
    //     );
    //     $response = json_decode($response->getBody()->getContents(), true);

    //     if ($response['status'] != 200) {
    //         return response()->json([
    //             'message' => 'Failed to send OTP to your phone number',
    //             'status' => 'failed',
    //             'error' => $response
    //         ], 500);
    //     }

    //     return response()->json([
    //         'message' => 'OTP sent to your phone number',
    //         // 'otp_client' => $otpClient,
    //         'status' => 'success'
    //     ]);
    // }


    public function store(Request $request)
{
    // $request->validate([
    //     'email' => 'required|email',
    //     'user_id' => [
    //         'exists:users,id',
    //         'required',
    //         function ($attribute, $value, $fail) {
    //             $otpClient = OtpClient::where('user_id', $value)
    //                 ->where('expired_at', '>', now())
    //                 ->where('is_active', true)
    //                 ->exists();
    //             if ($otpClient) {
    //                 return response(["error"=>["message"=>"Anda masih memiliki kode OTP yang masih aktif. Periksa kembali inbox email Anda."]], 403);
    //             }
    //         },
    //     ]
    // ]);

    // $request->validate([
    //     'email' => 'required|email',
    //     'user_id' => [
    //         'exists:users,id',
    //         'required',
    //         function ($attribute, $value, $fail) {
    //             // Check if there is an active OTP for the user
    //             $activeOtp = OtpClient::where('user_id', $value)
    //                 ->where('expired_at', '>', now())
    //                 ->where('is_active', true)
    //                 ->first();
    
    //             if ($activeOtp) {
    //                 // An active OTP exists, return an error response
    //                 return response()->json([
    //                     'error' => [
    //                         'message' => 'Anda masih memiliki kode OTP yang masih aktif. Periksa kembali inbox email Anda.'
    //                     ]
    //                 ], 403);
    //             }
    //         },
    //     ]
    // ]);

    $activeOtp = OtpClient::where('user_id', $request->user_id)
                ->where('expired_at', '>', now())
                ->where('is_active', true)
                ->first();

    if($activeOtp){
        
        $message = 'Anda masih memiliki kode OTP yang masih aktif. Periksa inbox email Anda.';
     
        return response()->json([
            'message' => $message,
            'status' => 'failed'
                            ], 403);
    }


    $otpCode = rand(1000, 9999);

    // Create an OTPClient instance and save it to the database
    $otpClient = new OtpClient();
    $otpClient->user_id = $request->user_id;
    $otpClient->code = $otpCode;
    $otpClient->expired_at = now()->addMinutes(5);
    $otpClient->save();

    // Send the OTP code via email
    $user = User::findOrFail($request->user_id);
    $email = $user->email; // Define the $email variable here
    $emailBody = "Kode OTP untuk reset password : $otpCode";
    Mail::raw( $emailBody, function ($message) use ($email) {
        $message->to($email);
        $message->subject('AGPAII DIGITAL - Kode OTP');
        $message->from(env('MAIL_USERNAME'), 'SISTEM AGPAII');
    });
    

    return response()->json([
        'message' => 'Kode OTP telah dikirim ke alamat email.',
        'status' => 'success'
    ]);
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OtpClient  $otpClient
     * @return \Illuminate\Http\Response
     */
    public function show(OtpClient $otpClient)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OtpClient  $otpClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OtpClient $otpClient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OtpClient  $otpClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtpClient $otpClient)
    {
        //
    }

    // public function searchUser($phoneNumber)
    // {
    //     $users = User::with('profile')
    //         ->where('expired_at', '!=', null)
    //         ->whereHas('profile', function ($query) use ($phoneNumber) {
    //             $query->where('contact', $phoneNumber);
    //         })->get();

    //     return response()->json($users);
    // }

    public function searchUserName($name)
    {
        $users = User::with('profile')
            ->where('name', 'LIKE', "$name%")
            ->select('name', 'email')
            ->take(10)
            ->get();

        return response()->json($users);
    }

    public function searchUserByEmail($email)
    {
        $user = User::
             where('email', '=', $email)
            ->where('expired_at', '!=', null)
            ->first();

        if (!$user) {
            // User not found, return a custom response
            return response()->json(['message' => 'User dengan email tersebut tidak ditemukan.'], 404);
        }

        // User found, return the user(s)
        return response()->json($user);
    }



    public function verify(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'code' => 'required|numeric',
        ]);

        $otpClient = OtpClient::where('user_id', $request->user_id)
            ->where('code', $request->code)
            ->where('expired_at', '>', now())
            ->where('is_active', true)
            ->first();

        if (!$otpClient) {
            return response()->json([
                'message' => 'Kode OTP tidak valid',
                'status' => 'failed'
            ], 400);
        }

        return response()->json([
            'message' => 'Kode OTP valid',
            'status' => 'success'
        ]);
    }

    public function changePassword(Request $request)
    {
        // $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'code' => 'required|numeric',
        //     'password' => 'required|min:8',
        // ]);

        $otpClient = OtpClient::where('user_id', $request->user_id)
            ->where('code', $request->code)
            ->where('expired_at', '>', now())
            ->where('is_active', true)
            ->first();

        if (!$otpClient) {
            return response()->json([
                'message' => 'Kode OTP tidak valid',
                'status' => 'failed'
            ], 400);
        }

        $otpClient->is_active = false;
        $otpClient->save();

        $user = User::find($request->user_id);
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'message' => 'Password telah diubah',
            'status' => 'success'
        ]);
    }
}
