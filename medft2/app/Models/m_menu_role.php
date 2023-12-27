<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_menu_role extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'm_menu_roles';
    protected $fillable = [
        'menu_id',
        'role_id'
    ];

    public function role()
    {
        return $this->belongsTo(m_role::class, 'role_id', 'id');
    }

    public function menu()
    {
        return $this->belongsTo(m_menu::class, 'menu_id', 'id');
    }
}
