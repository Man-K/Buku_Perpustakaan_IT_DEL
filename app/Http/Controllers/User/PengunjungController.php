<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class PengunjungController extends Controller
{
    public function simpanPengunjung(Request $request)
    {
        $name = $request->nama;
        $telepon = $request->telepon;
        $nim = $request->nim;
        $email = $request->email;



        $data = new User();
        $data->nama = $name;
        $data->telepon = $telepon;
        $data->nim = $nim;
        $data->email = $email;
        $data->password = Hash::make('rahasia');
        $data->save();

        return redirect('/')->with('status', 'Data Berhasil Disimpan');
    }
}
