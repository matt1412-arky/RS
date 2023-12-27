<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class m_doctor_education extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "m_doctor_educations";  
    protected $fillable = ['doctor_id',
                          'education_level_id',
                          'institution_name',
                          'major',
                          'start_year',
                          'end_year',
                          'create_by','create_on'];

    public function doctor():BelongsTo{
        return $this->belongsTo(m_doctor::class);
    }
    public function educationLevel():BelongsTo{
        return $this->belongsTo(m_education_level::class);
    }
}
