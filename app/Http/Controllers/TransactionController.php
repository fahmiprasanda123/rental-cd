<?php

namespace App\Http\Controllers;

use App\Transaction; //File Model Transaction
use App\Cd; //File Model CD
use Carbon\Carbon;
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

        $tanggal_awal = $request->input('tanggal_awal');
        $tanggal_akhir = $request->input('tanggal_akhir');
        
        
        $date_awal = Carbon::parse($tanggal_awal);
        $durasi = $date_awal->diffInDays($tanggal_akhir);
        
        $idcd = $request->input('id_cd');
        $query = Cd::where('id_cd', $idcd)->get('harga');
        $harga = $query;

        $decode = json_decode($harga);
        // var_dump($decode);

        foreach($decode as $decode_harga){
        $harga_cd = $decode_harga->harga;
        $data->total = $durasi*$harga_cd;
    }
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
