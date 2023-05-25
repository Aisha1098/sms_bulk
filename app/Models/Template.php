<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'name',
        'context'
    ];

    public function accounts(){
        return $this->belongsTo(Account::class);
    }
}
