<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    use HasFactory;

    protected $fillable=[
        'group_id',
        'contact_id'
    ];

    public function messages(){
        return $this->belongsToMany(Message::class);
    }
}
