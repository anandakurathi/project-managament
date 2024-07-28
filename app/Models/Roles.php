<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Roles extends Model
{
    use HasFactory;

    /**
     * Table name
     * @var string
     */
    protected $table = 'roles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */
    protected $fillable = [
        'name',
        'status'
    ];

    /**
     * User table relation
     */
    public function users(): HasOne
    {
        return $this->hasOne(User::class, 'role_id', 'id');
    }
}
