<?php

namespace App\Http\Controllers;

use App\Category; //File Model
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $data = Category::all();
        return response($data);
    }
    public function show($id_category)
    {
        $data = Category::where('id_category', $id_category)->get();
        return response($data);
    }
    public function store(Request $request)
    {
        $data = new Category();
        $data->category = $request->input('category');
        $data->save();

        return response('Berhasil Tambah Data');
    }
    public function update(Request $request, $id_category)
    {
        $data = Category::where('id_category', $id_category)->first();
        $data->category = $request->input('category');
        $data->save();

        return response('Berhasil Merubah Data');
    }

    public function destroy($id_category)
    {
        $data = Category::where('id_category', $id_category)->first();
        $data->delete();

        return response('Berhasil Menghapus Data');
    }
}
