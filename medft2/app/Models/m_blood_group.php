<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class m_blood_group extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "m_blood_groups";
    protected $fillable = ['code','description','created_by','created_on']; //

    public function user():BelongsTo {
        return $this->belongsTo(m_user::class);
    }
}
