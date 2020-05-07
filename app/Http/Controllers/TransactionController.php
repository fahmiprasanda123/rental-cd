<?php

namespace App\Http\Controllers;

use App\Transaction; //File Model
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { }

    public function index()
    {
        $data = Transaction::all();
        return response($data);
    }
    public function show($id_transaksi)
    {
        $data = Transaction::where('id_transaksi', $id_transaksi)->get();
        return response($data);
    }
    public function store(Request $request)
    {
        $data = new Transaction();
        $data->id_user = $request->input('id_user');
        $data->id_cd = $request->input('id_cd');
        $data->tanggal_awal = $request->input('tanggal_awal');
        $data->tanggal_akhir = $request->input('tanggal_akhir');
        $data->total = $request->input('total');
        $data->save();

        return response('Berhasil Tambah Data');
    }
    public function update(Request $request, $id_transaksi)
    {
        $data = Transaction::where('id_transaksi', $id_transaksi)->first();
        $data->id_user = $request->input('id_user');
        $data->id_cd = $request->input('id_cd');
        $data->tanggal_awal = $request->input('tanggal_awal');
        $data->tanggal_akhir = $request->input('tanggal_akhir');
        $data->total = $request->input('total');
        $data->save();

        return response('Berhasil Merubah Data');
    }

    public function destroy($id_transaksi)
    {
        $data = Transaction::where('id_transaksi', $id_transaksi)->first();
        $data->delete();

        return response('Berhasil Menghapus Data');
    }
}
