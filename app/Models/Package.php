<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_custom',
        'name',
        'totla_sms',
        'additional_sms'
    ];

    public function accounts(){
        return $this->belongsToMany(Account::class);
    }
}
