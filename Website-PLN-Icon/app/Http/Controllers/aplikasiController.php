<?php

namespace App\Http\Controllers;

use App\Models\aplikasi;
use Illuminate\Http\Request;

class aplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aplikasi',[
            'apps' => aplikasi::latest()->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aplikasi-tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = [
            'nama' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required'
        ];

        $data = $request->validate($validasi);

        if($request->hasFile('gambar')){
            $files = $request->file('gambar');
            // return $files;
            $image_name = $files->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'img/';
            $image_url = $upload_path.$image_full_name;
            $files->move($upload_path, $image_full_name);
            $image = $image_url;
            $data['gambar'] = $image;
        }

        aplikasi::create($data);

        return redirect('/aplikasi')->with('success','Aplikasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function show(aplikasi $aplikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(aplikasi $aplikasi)
    {
        return view('aplikasi-ubah',[
            'app' => $aplikasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aplikasi $aplikasi)
    {
        $validasi = [
            'nama' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable'
        ];

        // return $aplikasi;

        $data = $request->validate($validasi);

        if($request->hasFile('gambar')){
            $files = $request->file('gambar');
            // return $files;
            $image_name = $files->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'img/';
            $image_url = $upload_path.$image_full_name;
            $files->move($upload_path, $image_full_name);
            $image = $image_url;
            $data['gambar'] = $image;
        }

        aplikasi::where('id',$aplikasi->id)->update($data);

        return redirect('/aplikasi')->with('success','aplikasi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(aplikasi $aplikasi)
    {
        aplikasi::destroy($aplikasi->id);
        return redirect('/aplikasi')->with('success', 'aplikasi telah dihapus');
    }
}
