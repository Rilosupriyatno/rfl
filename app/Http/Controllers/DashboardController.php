<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.superadmin');
    }

    public function administrator()
    {
        $sessionData = session()->all();
        $sessionData['role_id'] = 2;
        $sessionData['role_name'] = 'Administrator';
        $sessionData['role_url'] = '/dashboard/administrator';
        Session::put($sessionData);

        $data['greeting'] = $this->getGreetingMessage();
        return view('pages.dashboard.administrator', $data);
    }

    public function admin_apotek()
    {
        return view('pages.dashboard.admin-apotek');
    }

    public function admin_klinik()
    {
        return view('pages.dashboard.admin-klinik');
    }

    public function admin_lab()
    {
        return view('pages.dashboard.admin-lab');
    }

    public function patient()
    {
        return view('pages.dashboard.patient');
    }

    public function nurse()
    {
        return view('pages.dashboard.nurse');
    }

    public function doctor()
    {
        return view('pages.dashboard.doctor');
    }

    public function laborant()
    {
        return view('pages.dashboard.laborant');
    }

    public function pharmacist()
    {
        return view('pages.dashboard.pharmacist');
    }

    public function cashier()
    {
        return view('pages.dashboard.cashier');
    }

    public function finance()
    {
        return view('pages.dashboard.finance');
    }

    function getGreetingMessage()
    {
        date_default_timezone_set('Asia/Jakarta'); // Set your timezone here

        $hour = date('H');
        if ($hour >= 5 && $hour < 12) {
            return "Selamat pagi!";
        } else if ($hour >= 12 && $hour < 15) {
            return "Selamat siang!";
        } else if ($hour >= 15 && $hour < 18) {
            return "Selamat sore!";
        } else {
            return "Selamat malam!";
        }
    }
}
