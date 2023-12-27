<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class m_doctor extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $table = "m_doctors";  
    protected $fillable = ['biodata_id',
                          'str',
                          'create_by','create_on'];

    public function biodata():BelongsTo{
        return $this->belongsTo(m_biodata::class);
    }
}
