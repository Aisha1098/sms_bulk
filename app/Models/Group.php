<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function contacts(){
        return $this->belongsToMany(Contact::class);
    }
}
