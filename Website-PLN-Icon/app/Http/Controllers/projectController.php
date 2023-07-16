<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\mahasiswa;
use App\Models\komponen;
use App\Models\aplikasi;
use App\Models\dospem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('project',[
            'project' => Project::where('user_id',Auth::user()->id)->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('tambah_projek',[
            'dospem' => dospem::latest()->get(),
            'mahasiswa' => mahasiswa::latest()->get(),
            'aplikasi' => aplikasi::latest()->get(),
            'komponen' => komponen::latest()->get(),
            'project' => Project::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // return $request;
        $validasi = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'user_id' => 'required',
            'kelompok' => 'required',
            'dospem' => 'required',
            'komponen_id' => 'required',
            'app_id' => 'required',
            'cara_membuat' => 'required',
            'kode' => 'required',
            'laporan' => 'required',
            'refrensi' => 'nullable'
        ];

        $data = $request->validate($validasi);

        $kelompok = array();
        $kelompoks = $request['kelompok'];
        foreach ($kelompoks as $k){
            $kelompok[] = $k;
        }
        $data['kelompok'] = strval(implode('|',$kelompok));
       
        $app = array();
        $apps = $request['app_id'];
        foreach ($apps as $apk){
            $app[] = $apk;
        }
        $data['app_id'] = implode('|',$app);

        $komponen = array();
        $komponens = $request['komponen_id'];
        foreach ($komponens as $ko){
            $komponen[] = $ko;
        }
        $data['komponen_id'] = implode('|',$komponen);
        
        if($request['refrensi'] != null){
            $refrensi = array();
            $refrensis = $request['refrensi'];
            foreach ($refrensis as $ref){
                $refrensi[] = $ref;
            }
            $data['refrensi'] = implode('|',$refrensi);
        }
      
     

    


        if($request->file('gambar') || $request->file('kode') || $request->file('laporan')){
            $data['gambar'] = $request->file('gambar')->store('post-gambar');
            $data['kode'] = $request->file('kode')->store('post-gambar');
            $data['laporan'] = $request->file('laporan')->store('post-gambar');
        }

        Project::create($data);

        return redirect('/project')->with('success','proyekl berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('project-details',[
            'pro' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('ubah_projek',[
            'dospem' => dospem::latest()->get(),
            'mahasiswa' => mahasiswa::latest()->get(),
            'aplikasi' => aplikasi::latest()->get(),
            'komponen' => komponen::latest()->get(),
            'pro' => $project,
            'projek' => Project::latest()->get()
        ]);
    }

        
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $validasi = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'kelompok' => 'required',
            'dospem' => 'required',
            'komponen_id' => 'required',
            'app_id' => 'required',
            'cara_membuat' => 'required',
            'kode' => 'required',
            'laporan' => 'required',
            'refrensi' => 'nullable'
        ];

        $data = $request->validate($validasi);

        $kelompok = array();
        $kelompoks = $request['kelompok'];
        foreach ($kelompoks as $k){
            $kelompok[] = $k;
        }
        $data['kelompok'] = strval(implode('|',$kelompok));
       
        $app = array();
        $apps = $request['app_id'];
        foreach ($apps as $apk){
            $app[] = $apk;
        }
        $data['app_id'] = implode('|',$app);

        $komponen = array();
        $komponens = $request['komponen_id'];
        foreach ($komponens as $ko){
            $komponen[] = $ko;
        }
        $data['komponen_id'] = implode('|',$komponen);

        $refrensi = array();
        $refrensis = $request['refrensi'];
        foreach ($refrensis as $ref){
            $refrensi[] = $ref;
        }
        $data['refrensi'] = implode('|',$refrensi);

        if($request->file('gambar') || $request->file('kode') || $request->file('laporan')){
            $data['gambar'] = $request->file('gambar')->store('post-gambar');
            $data['kode'] = $request->file('kode')->store('post-gambar');
            $data['laporan'] = $request->file('laporan')->store('post-gambar');
        }

        Project::where('id',$project->id)->update($data);

        return redirect('/project')->with('success','proyek berhasil ditambahkan');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Project::destroy($project->id);
        return redirect('/project')->with('success', 'proyek telah dihapus');
    }
}
