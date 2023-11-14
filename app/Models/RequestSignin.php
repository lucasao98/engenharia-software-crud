<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSignin extends Model
{
    use HasFactory;

    protected $table = 'request';

    protected $fillable = [
        'email',
        'status',
    ];
}
