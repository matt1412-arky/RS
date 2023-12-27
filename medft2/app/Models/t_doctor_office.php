<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class t_doctor_office extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "t_doctor_offices";  
    protected $fillable = ['doctor_id',
                          'medical_facility_id',
                          'specialization',
                          'start_date',
                          'end_date',
                          'create_by','create_on'];

    public function doctor():BelongsTo{
        return $this->belongsTo(m_doctor::class);
    }
    public function medicalFacility():BelongsTo{
        return $this->belongsTo(m_medical_facility::class);
    }

    // public function officeTreatment(){
    //     return $this->hasMany(t_doctor_office_treatment::class);
    // } // belum
}
