<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class m_location extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "m_locations";
    protected $fillable = ['name','parent_id','location_level_id','created_by','created_on'];

    public function level()
    {
        return $this->belongsTo(m_location_level::class, 'location_level_id');
    }

    public function biodataAddresses()
    {
        return $this->hasMany(m_biodata_address::class, 'location_id');
    }

}
