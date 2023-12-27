<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_location_level extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "m_location_levels";
    protected $fillable = ['name','abbreviation','created_by','created_on'];

    public function lokasi() {
        return $this->hasMany(m_location::class, 'location_level_id');
    }
}
