<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        //$projek = Project::latest()->paginate(5);
        $projek = Project::latest();
        if(request('cari'))
        {
            $projek->where('nama','like','%'. request('cari') . '%');
        }
        //if($request['cari']){
            //Project::where('nama','like','%'.$request['cari']. '%')
            //->where('user_id',Auth::user()->id)->paginate(5);
        //}

        

        return view('Home',[
            'proj' => $projek->paginate(6)
        ]);
    }
}
