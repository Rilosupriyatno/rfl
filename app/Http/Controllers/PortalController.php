<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Master\Category;
use App\Models\User;

class PortalController extends Controller
{
    public function index()
    {
        return view('pages.welcome');
    }
    public function index_menu()
    {
        $data['category'] = Category::where('id', '>', '1')->get();

        return view('pages.user.menu', $data);
    }

    public function signin()
    {
        return view('pages.user.auth.sign-in');
    }

    public function signup_phone()
    {
        return view('pages.user.auth.sign-up-phone');
    }

    public function signup_verify_code()
    {
        return view('pages.user.auth.sign-up-verify-code');
    }

    public function signup_verify_fullname()
    {
        return view('pages.user.auth.sign-up-verify-fullname');
    }

    public function signup_verify_pin()
    {
        return view('pages.user.auth.sign-up-verify-pin');
    }

    public function signup_verify_pin_confirm()
    {
        return view('pages.user.auth.sign-up-verify-pin-confirm');
    }

    public function auth(Request $request)
    {
        $formFields = $request->validate([
            'username' => ['required', 'string', 'max:128'],
            'password' => 'required'
        ]);
        // dd($formFields);


        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            $user = auth()->user();

            if ($user->user_role_id == "6") {
                $User = User::where('id', $user->id)->first();
                $session = $this->createSessionArray($user);
                if ($User->verif == 'No') {
                    $this->invalidate_session($request);
                    return back()->withErrors(['username' => 'Oops, Akun anda belom terferifikasi!'])->onlyInput('username');
                } else {

                    Session::put($session);
                    return redirect('/')->with('message', 'Anda berhasil login!');
                }
            } else {
                // Create session
                $session = $this->createSessionArray($user);

                // dd($session);
                Session::put($session);
            }
        }
        return back()->withErrors(['username' => 'Username atau password salah!'])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        if (session()->get('role_name') == "Petani") {
            $this->invalidate_session($request);
            return redirect('/sign-in')->with('message', 'You have been logged out!');
        } else {
            $this->invalidate_session($request);
            return redirect('/')->with('message', 'You have been logged out!');
        }
    }

    private function invalidate_session($request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();
    }

    private function createSessionArray($user)
    {
        return array(
            'id' => $user->id,
            'name' => $user->name,
            'role_id' => $user->user_role_id,
            'role_name' => $user->user_roles->name,
            'role_description' => $user->user_roles->description,
            'role_url' => $user->user_roles->dashboard_url
        );
    }
}
