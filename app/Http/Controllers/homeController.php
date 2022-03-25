<?php

namespace App\Http\Controllers;

use App\Models\obatalkes;
use App\Models\pesanan;
use App\Models\signa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function __construct()
    {
        $this->obat = new obatalkes();
        $this->signa = new signa();
    }

    public function index()
    {
        $data = [
            'title' => 'Hospital - Dashboard',
            // 'jumlah_obat' => $this->obat->count("obatalkes_id"),
            // 'jumlah_resep' => $this->signa->count("signa_id"),
            'data_obat' => $this->obat->paginate(15)
        ];

        return view('user.home.index', $data);
    }

    public function obat()
    {
        $data = [
            'title' => "Beli Resep - Hospital",
            'data_obat' => $this->obat->all()
        ];

        return view("user.obat.obat", $data);
    }

    public function obat_racikan()
    {
        $data = [
            'title' => "Beli Resep - Hospital",
            'data_obat' => pesanan::join("obatalkes_m", "obatalkes_m.obatalkes_id", "=", "pesan.id_obat")->where(['id_user' => Auth::user()->id_user])->paginate(5),
            'data_obat_all' =>  $this->obat->paginate(20)
        ];

        return view("user.obat.racikan", $data);
    }
}
