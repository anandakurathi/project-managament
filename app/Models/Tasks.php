<?php

namespace App\Models;

use App\Enum\Priority;
use App\Enum\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Tasks extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    /**
     * These are mass assignment
     * @var array<int, string, string, string, string, string>
     */
    protected $fillable = [
        'project_id',
        'name',
        'description',
        'due_date',
        'status',
        'priority'
    ];

    protected $casts = [
        'due_date' => 'date',
        'status' => Status::class,
        'priority' => Priority::class
    ];


    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
