<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Power_Point extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'Title',
        'Language',
        'Secound_Title'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
