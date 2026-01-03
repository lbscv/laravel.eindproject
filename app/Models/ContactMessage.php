<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name', 'email', 'subject', 'message', 'answered_at',
    ];

    protected $casts = [
        'answered_at' => 'datetime',
    ];
}
