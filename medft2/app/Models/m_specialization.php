<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_specialization extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'm_specializations';
    protected $fillable = ['name', 'created_by', 'created_on'];
}