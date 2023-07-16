<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komponen;

class alatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #return Komponen::all();
        return view('komponen',[
            'komponen' => Komponen::latest()->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah_komponen');
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function komponen()
    {
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

        return redirect('/komponen')->with('success','komponen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Komponen $komponen)
    {
        return view('edit_komponen',[
            'komponen' => $komponen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = [
            'nama_komponen' => 'required',
            'link_komponen' => 'required',
            'deskripsi_komponen' => 'required',
            'gambar_komponen' => 'nullable'
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

        Komponen::where('id',$id)->update($data);

        return redirect('/komponen')->with('success','komponen berhasil diubah');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Komponen::destroy($id);
        return redirect('/komponen')->with('success', 'Komponen telah dihapus');
    }


}
