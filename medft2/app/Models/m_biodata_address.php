<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_biodata_address extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "m_biodata_addresses";
    protected $fillable = ['created_by','created_on'];

    public function level() {
        return $this->belongsTo(m_location::class, 'location_id');
    }
}
