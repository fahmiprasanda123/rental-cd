<?php

namespace App\Http\Controllers;

use App\Cd; //File Model
use Illuminate\Http\Request;

class CdController extends Controller
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
        // $data = Cd::all();
        // return response($data);
        $cd = Cd::with(['category:id_category,category'])->orderBy('created_at', 'DESC')->get();
        return response()->json(['data' => $cd]);
    }

    public function show($id_cd)
    {
        $cd = Cd::with(['category:id_category,category'])->where('id_cd',$id_cd)->orderBy('created_at', 'DESC')->get();
        return response()->json(['data' => $cd]);
        // $data = Cd::where('id_cd', $id_cd)->get();
        // return response($data);
    }
    public function store(Request $request)
    {
        $data = new Cd();
        $data->judul = $request->input('judul');
        $data->deskripsi = $request->input('deskripsi');
        $data->id_category = $request->input('id_category');
        $data->jumlah = $request->input('jumlah');
        $data->harga = $request->input('harga');
        $data->save();

        return response('Berhasil Tambah Data');
    }
    public function update(Request $request, $id_cd)
    {
        $data = Cd::where('id_cd', $id_cd)->first();
        $data->judul = $request->input('judul');
        $data->deskripsi = $request->input('deskripsi');
        $data->id_category = $request->input('id_category');
        $data->jumlah = $request->input('jumlah');
        $data->harga = $request->input('harga');
        $data->save();

        return response('Berhasil Merubah Data');
    }

    public function destroy($id_cd)
    {
        $data = Cd::where('id_cd', $id_cd)->first();
        $data->delete();

        return response('Berhasil Menghapus Data');
    }
}
