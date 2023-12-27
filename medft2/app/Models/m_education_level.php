<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_education_level extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "m_education_levels";  
    protected $fillable = ['name','create_by','create_on'];
}
