<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'name',
        'number'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function groups(){
        return $this->belongsToMany(Group::class);
    }
}
