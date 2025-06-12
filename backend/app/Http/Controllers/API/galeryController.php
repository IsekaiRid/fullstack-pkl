<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\galeryResource;
use App\Models\galeryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class galeryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return galeryModel::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        Storage::makeDirectory('galery');
        $image = $request->file('gambar');
        $image->storeAs('galery', $image->hashName());

        // Simpan data ke database
        $data = galeryModel::create([
            'gambar' => $image->hashName(),
            'deskripsi' => $request->deskripsi
        ]);

        // Kembalikan response menggunakan Resource
        return new galeryResource(true, 'Data berhasil ditambahkan', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(galeryModel $galery)
    {
        return $galery;
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string'

        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find news by ID
        $galery = galeryModel::find($id);

        //check if image is not empty
        if ($request->hasFile('gambar')) {

            //delete old image
            Storage::delete('galery/' . basename($galery->gambar));

            //upload image
            $image = $request->file('gambar');
            $image->storeAs('galery', $galery->hashName());

            //update news with new image
            $galery->update([
                'gambar' => $image->hashName(),
                'deskripsi' => $request->deskripsi

            ]);
        } else {

            //update news without image
            $galery->update([

                'deskripsi' => $request->deskripsi
            ]);
        }

        //return response
        return new galeryResource(true, 'Data Schools Berhasil Diubah!', $galery);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
