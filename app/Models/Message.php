<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'template_id',
        'messsage',
        'send_at'
    ];

    public function accounts(){
        return $this->belongsTo(Account::class);
    }

    public function recipients(){
        return $this->belongsToMany(Recipient::class);
    }
}
