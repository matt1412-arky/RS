<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class t_doctor_office_treatment_price extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "t_doctor_office_treatment_prices";  
    protected $fillable = [
                          'doctor_office_treatment_id',
                          'price',
                          'price_start_from',
                          'price_until_from',
                          'create_by','create_on'];

    public function officeTreatment():BelongsTo{
        return $this->belongsTo(t_doctor_office_treatment::class, 'medical_doctor_office_id', 'id');
    }
}
