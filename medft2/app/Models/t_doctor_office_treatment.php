<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class t_doctor_office_treatment extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "t_doctor_office_treatments";  
    protected $fillable = ['doctor_treatment_id',
                          'doctor_office_id',
                          'create_by','create_on'];

    public function doctorTreatment():BelongsTo{
        return $this->belongsTo(t_doctor_treatment::class);
    }
    public function doctorOffice():BelongsTo{
        return $this->belongsTo(t_doctor_office::class);
    }
    // public function officeTreatmentPrice(){
    //     return $this->hasMany(t_doctor_office_treatment_price::class);
    // } // belum
}
