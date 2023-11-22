<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

use App\Enum\IssueActionEnum;

class IssueHistory extends Pivot
{

    protected $table = 'issue_histories';

    protected $fillable = [
        'issue_id',
        'user_id',
        'role',
    ];

    protected $casts = [
        'action' => IssueActionEnum::class,
    ];

    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;


    
}
