<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillables = [
        'user_id',
        'is_individual',
        'is_corporate',
        'is_enterprise',
        'is_monthly_invoice',
        'senderID',
        'sms_rate_lim',
        'price'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function packages(){
        return $this->belongsToMany(Package::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function templates(){
        return $this->hasMany(Template::class);
    }
}
