<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class m_medical_facility extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $table = "m_medical_facilities";  
    protected $fillable = ['name',
                          'medical_facility_category_id',
                          'location_id',
                          'full_address',
                          'email',
                          'phone_code',
                          'phone',
                          'fax',
                          'create_by','create_on'];

    public function medicalFacilityCategory():BelongsTo{
        return $this->belongsTo(m_medical_facility_category::class);
    }
    public function location():BelongsTo{
        return $this->belongsTo(m_location::class);
    }
    public function schedule(){
        return $this->hasMany(m_medical_facility_schedule::class,'medical_facility_id','id');
    }
}
