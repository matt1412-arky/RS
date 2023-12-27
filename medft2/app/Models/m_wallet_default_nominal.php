<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_wallet_default_nominal extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "m_wallet_default_nominals";  
    protected $fillable = ['nominal','create_by','create_on'];
}
