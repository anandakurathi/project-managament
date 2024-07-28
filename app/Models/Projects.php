<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Projects extends Model
{
    use HasFactory;

    /**
     * Table name
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string, string, string, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'start_date',
        'end_date',
    ];

    /**
     * Values can be casted
     * @return array<integer, string,string>
     */
    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'start_date' => 'date',
            'end_date'=> 'date',
        ];
    }

    /**
     * User table relation
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
