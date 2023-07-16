<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\aplikasi;

class ubah_aplikasiController extends Controller
{
    public function index(){
        return view('user_aplikasi');
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

        return redirect('/user_aplikasi')->with('success','Aplikasi berhasil ditambahkan');
    }

}
