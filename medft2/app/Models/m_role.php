<?php

namespace App\Models;

use Database\Factories\m_roleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class m_role extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "m_roles";
    protected $fillable = ['name', 'code', 'create_by', 'create_on'];
    protected static function newFactory()
    {
        return m_roleFactory::new();
    }
}
