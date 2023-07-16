<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function komponen(){
        $this->hasMany(komponen::class);
    }
    public function aplikasi(){
        $this->hasMany(aplikasi::class);
    }
    // public function dospem(){
    //     $this->belongsTo(dospem::class);
    // }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
