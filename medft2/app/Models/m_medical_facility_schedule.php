<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class m_medical_facility_schedule extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "m_medical_facility_schedules";  
    protected $fillable = ['name',
                          'medical_facility_id',
                          'day',
                          'time_schedule_start',
                          'time_schedule_end',
                          'create_by','create_on'];
    public function schedule(){
        return $this->hasMany(m_medical_facility::class);
    }
}
