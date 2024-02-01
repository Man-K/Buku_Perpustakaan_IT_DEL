<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengunjungController extends Controller
{
    public function index()
    {
        $data = User::all();

        return view('Admin.Pengunjung.index', compact('data'));
    }

    public function formTambah()
    {
        return view('Admin.Pengunjung.formTambah');
    }

    public function simpanData(Request $request)
    {
        $nama = $request->nama;
        $telepon = $request->telepon;
        $nim = $request->nim;
        $email = $request->email;

        $data = new user;
        $data->nama = $nama;
        $data->telepon = $telepon;
        $data->nim = $nim;
        $data->email = $email;
        $data->password = Hash::make('rahasia');

        $data->save();

        return redirect('admin/pengunjung')->with('status', 'Data Berhasil Disimpan');
    }

    public function formEdit($id)
    {
        $data = User::find($id);
        return view('Admin.Pengunjung.formEdit', compact('data'));
    }

    public function updatePengunjung(Request $request)
    {
        $id = $request->id;
        $nama = $request->nama;
        $telepon = $request->telepon;
        $nim = $request->nim;
        $email = $request->email;

        $data = User::find($id);
        $data->nama = $nama;
        $data->telepon = $telepon;
        $data->nim = $nim;
        $data->email = $email;
        $data->update();
        return redirect('admin/pengunjung')->with('status', 'Data Berhasil DiUpdate');
    }

    public function hapusPengunjung(Request $request)
    {
        $id = $request->id;
        $data = User::find($id);
        $data->delete();
        return redirect('admin/pengunjung')->with('status', 'Data Berhasil DiHapus');
    }
}
