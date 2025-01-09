<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;
    protected $table='avatars';
    protected $guarded=[];
    public function users()
    {
        return $this->belongsToMany(User::class, 'transactions');
    }
}