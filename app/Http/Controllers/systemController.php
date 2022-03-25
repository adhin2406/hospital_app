<?php

namespace App\Http\Controllers;

use App\Models\obatalkes;
use App\Models\pesanan;
use App\Models\signa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class systemController extends Controller
{
    public function __construct()
    {
        $this->obat = new obatalkes();
        $this->signa = new signa();
    }

    public function index(Request $request)
    {
        $id_obat = pesanan::join("obatalkes_m", "obatalkes_m.obatalkes_id", "=", "pesan.id_obat")->first();
        if ($id_obat === null) {
            pesanan::create([
                "id_obat" => $request->id_obat,
                'qty_obat' => 1,
                'id_user' => Auth::user()->id_user
            ]);
            return redirect("obat");
        } else {
            if ($request->id_obat ==  $id_obat["id_obat"]) {
                $qty_obat = $id_obat['qty_obat'] + 1;
                $pesanan  = pesanan::findOrFail($id_obat['id_pesan']);
                $pesanan->id_obat = $request["id_obat"];
                $pesanan->qty_obat = $qty_obat;
                $pesanan->save();
                return redirect("obat");
            } else {
                pesanan::create([
                    "id_obat" => $request->id_obat,
                    'qty_obat' => 1,
                    'id_user' => Auth::user()->id_user
                ]);
                return redirect("obat");
            }
        }
    }

    public function obatRacikan(Request $request)
    {
        $id_obat = pesanan::join("obatalkes_m", "obatalkes_m.obatalkes_id", "=", "pesan.id_obat")->first();
        if ($id_obat === null) {
            pesanan::create([
                "id_obat" => $request->id_obat,
                'qty_obat' => 1,
                'id_user' => Auth::user()->id_user
            ]);
            return redirect("racikan");
        } else {
            if ($request->id_obat ==  $id_obat["id_obat"]) {
                $qty_obat = $id_obat['qty_obat'] + 1;
                $pesanan  = pesanan::findOrFail($id_obat['id_pesan']);
                $pesanan->id_obat = $request["id_obat"];
                $pesanan->qty_obat = $qty_obat;
                $pesanan->save();
                return redirect("racikan");
            } else {
                pesanan::create([
                    "id_obat" => $request->id_obat,
                    'qty_obat' => 1,
                    'id_user' => Auth::user()->id_user
                ]);
                return redirect("racikan");
            }
        }
    }

    public function ajax(Request $request)
    {
        $data  = $request->data;
        dd($data);
    }
}
