<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone'
    ];
}
