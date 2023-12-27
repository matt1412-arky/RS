<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_customer_relation extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "m_customer_relations";
    protected $fillable =['name','create_by','create_on'];
}
