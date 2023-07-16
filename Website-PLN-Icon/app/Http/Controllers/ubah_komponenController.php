<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Komponen;

use function Ramsey\Uuid\v1;

class ubah_komponenController extends Controller
{
    public function index(){
        return view('user_komponen');
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
            'nama_komponen' => 'required',
            'link_komponen' => 'required',
            'deskripsi_komponen' => 'required',
            'gambar_komponen' => 'required'
        ];

        $data = $request->validate($validasi);

        if($request->hasFile('gambar_komponen')){
            $files = $request->file('gambar_komponen');
            // return $files;
            $image_name = $files->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'img/';
            $image_url = $upload_path.$image_full_name;
            $files->move($upload_path, $image_full_name);
            $image = $image_url;
            $data['gambar_komponen'] = $image;
        }

        Komponen::create($data);

        return redirect('/user_komponen')->with('success','komponen berhasil ditambahkan');
    }
}
