<?php

namespace App\Models;

use Database\Factories\m_biodataFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_biodata extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "m_biodatas";
    protected $fillable = ['fullname', 'mobile_phone', 'image', 'image_path', 'created_by', 'created_on'];
    protected static function newFactory()
    {
        return m_biodataFactory::new();
    }

    // Tata
    public function user()
    {
        return $this->hasOne(m_user::class, 'id', 'biodata_id');
    }
    public function customer(){
        return $this->hasOne(m_customer::class, 'id', 'biodata_id');
    }
}
