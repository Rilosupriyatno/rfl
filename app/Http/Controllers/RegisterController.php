<?php

namespace App\Http\Controllers;

use App\Models\Setting\User;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request as Psr7Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.register');
    }

    public function verify()
    {
        return view('pages.user.auth.verify');
    }

    public function verify_otp(Request $request)
    {
        // $formFields = $request->validate([
        //     'otp' => 'required',
        // ]);
        $user_id = $request->session()->get('user_id_key');
        $otp = $request->input('otp');
        $User = User::where('id', $user_id)->where('otp', $otp)->count();
        if ($User > 0) {
            $formFields['verif'] = "Yes";
            User::find($user_id)->update($formFields);
            return redirect('/sign-in')->with('status', 'Akun berhasil terverifikasi, Silahkan Login');
        } else {
            return redirect('/verify')->with([
                'error' => 'Otp tidak sesuai masukan kembali.',
                'user_id' => $user_id,
            ]);
        }
    }

    public function store_seller(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'phone' => 'required'
        ]);
        // dd($request['pin']);

        $formFields['category_specification'] = $request['category_specification'];
        $formFields['username'] = $request['phone'];
        // $formFields['password'] = $request['pin'];
        $formFields['user_role_id'] = 1;
        $formFields['city_id'] = 1;
        $formFields['address'] = "";
        $formFields['picture'] = "-";
        $phone = $formFields['phone'];
        $otp = $this->generateOTP($phone);
        // $formFields['verif'] = "No";
        $formFields['password'] = bcrypt($request['pin']);
        $formFields['otp'] = $otp;

        $this->sendOTPViaWhatsApp($phone, $otp);

        $user = User::create($formFields);
        $request->session()->put('user_id_key', $user->id);
        return redirect('/verify');
    }


    private function generateOTP($phone)
    {
        // Generate kode OTP secara acak (misalnya dengan panjang 6 digit).
        $otp = rand(100000, 999999);

        // Simpan kode OTP ke dalam basis data atau cache sesuai kebutuhan (agar bisa divalidasi nanti).
        // Misalnya menggunakan cache Laravel:
        $expiresAt = now()->addMinutes(10); // Contoh: Set expire time 10 menit dari sekarang.
        Cache::put('otp_' . $phone, $otp, $expiresAt);
        Cache::put('otp_' . $phone, $otp, $expiresAt);

        return $otp;
    }


    private function sendOTPViaWhatsApp($phone, $otp)
    {
        // mengubah 08xxx menjadi 628xxx
        $phone = preg_replace('/^0/', '62', $phone);

        // saungwa admin

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://app.saungwa.com/api/create-message',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'appkey' => 'd266a809-ea4e-4fe6-a393-f6577ef3f0db',
        'authkey' => 'KE03yBIk87Eab9QfqyFJcU18nf3BgohaikcJq794Xgim2IDX0U',
        'to' => $phone,
        'message' => 'OTP anda adalah: ' . $otp,
        'sandbox' => 'false'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        //  Wafiq

        // $apiBaseUrl = 'https://wa.srv5.wapanels.com';
        // $apiEndpoint = '/send-message';
        // $apiKey = '4JZm8elWjUYnN1Ef61NlVwp2RjH8FN';
        // // $sender = '6282246903455';
        // $sender = '628112402780';
        // // $sender = '588';

        // $data = [
        //     'api_key' => $apiKey,
        //     'sender' => $sender,
        //     'number' => $phone,
        //     'message' => 'Your OTP is: ' . $otp,
        // ];

        // $url = $apiBaseUrl . $apiEndpoint;

        // $client = new Client();
        // $response = $client->post($url, [
        //     'headers' => [
        //         'Content-Type' => 'application/json',
        //     ],
        //     'json' => $data,
        // ]);


        // // Tambahkan log atau handle respons dari WhatsApp Blast API jika diperlukan.
        // Log::info('WhatsApp Blast Response: ' . $response->getBody());
        // // \Log::info('WhatsApp Blast Response: ' . $response->getBody());
    }
}
