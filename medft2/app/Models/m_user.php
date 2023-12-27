<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Database\Factories\m_userFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class m_user extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'm_users';
    public $timestamps = false;
    protected $fillable = [
        'biodata_id',
        'role_id',
        'email',
        'password',
        'login_attempt',
        'is_locked',
        'last_login',
        'created_by',
        'created_on',
        'modified_by',
        'modified_on',
        'deleted_by',
        'deleted_on',
        'is_deleted',
    ];

    protected static function newFactory()
    {
        return m_userFactory::new();
    }

    public function role()
    {
        return $this->belongsTo(m_role::class, 'role_id', 'id');
    }

    public function biodata()
    {
        return $this->belongsTo(m_biodata::class, 'biodata_id', 'id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    // Tata -> relation user to biodata
    // public function biodata():BelongsTo{
    //     return $this->belongsTo(m_biodata::class);
    // }
    public function customer()
    {
        return $this->hasOne(m_customer::class, 'biodata_id', 'biodata_id');
    }
}
