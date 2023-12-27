<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_reset_password extends Model
{
    use HasFactory;
    protected $table = 't_reset_passwords';
    public $timestamps = false;
    protected $fillable = [
        'old_password',
        'new_password',
        'reset_for'
    ];
}
