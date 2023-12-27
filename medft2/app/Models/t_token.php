<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_token extends Model
{
    use HasFactory;
    protected $table = 't_tokens';
    public $timestamps = false;
    protected $fillable = [
        'email',
        'user_id',
        'token',
        'expired_on',
        'is_expired',
        'used_for',
    ];
}
