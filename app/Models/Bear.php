<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bear extends Model
{
    use HasFactory;
    protected $table='bears';
    protected $guarded=[];
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
