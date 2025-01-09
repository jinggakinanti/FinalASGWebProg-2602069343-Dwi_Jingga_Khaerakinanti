<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Field extends Model
{
    use HasFactory;
    protected $table='user_fields';
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function field(){
        return $this->belongsTo(Field::class);
    }
}
