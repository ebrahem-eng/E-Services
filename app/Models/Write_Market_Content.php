<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Write_Market_Content extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'user_id',
        'About_Of_Content'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
