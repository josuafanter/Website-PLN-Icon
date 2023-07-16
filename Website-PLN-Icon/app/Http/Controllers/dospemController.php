<?php

namespace App\Http\Controllers;

use App\Models\dospem;
use Illuminate\Http\Request;

class dospemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dospem',[
            'dos'=>dospem::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dospem-tambah');
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
            'nidn' => 'required|unique:dospems',
        ];

        $data = $request->validate($validasi);

        dospem::create($data);

        return redirect('/dospem')->with('success','dospem berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dospem  $dospem
     * @return \Illuminate\Http\Response
     */
    public function show(dospem $dospem)
    {
        return view('dospem-ubah',[
            'dos' => $dospem
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \dos\Models\dospem  $dospem
     * @return \Illuminate\Http\Response
     */
    public function edit(dospem $dospem)
    {
        return view('dospem-ubah',[
            'dos' => $dospem
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dospem  $dospem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dospem $dospem)
    {
        $validasi = [
            'nama' => 'required',
            'nidn' => 'required|unique',
        ];

        if($request->nidn != $dospem->nidn){
            $validasi = [
                'nama' => 'required',
                'nidn' => 'required|unique:dospems',
            ];
        }

        $data = $request->validate($validasi);

        dospem::where('id',$dospem->id)->update($data);

        return redirect('/dospem')->with('success','Dosen pembimbing berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dospem  $dospem
     * @return \Illuminate\Http\Response
     */
    public function destroy(dospem $dospem)
    {
        dospem::destroy($dospem->id);
        return redirect('/dospem')->with('success', 'Dosen pembimbing telah dihapus');
    }
}
