<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Write_Artical extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Title',
        'user_id',
        'Type',
        'Secound_Title'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
