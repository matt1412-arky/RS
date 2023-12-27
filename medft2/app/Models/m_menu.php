<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_menu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'm_menus';
    protected $fillable = [
        'name',
        'url',
        'parent_id',
        'big_icon',
        'small_icon'
    ];

    public function children()
    {
        return $this->hasMany(m_menu::class, 'parent_id', 'id');
    }
}
