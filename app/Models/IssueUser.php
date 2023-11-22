<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class IssueUser extends Pivot
{

    protected $table = 'issue_user';

    protected $fillable = [
        'issue_id',
        'user_id',
        'role',
    ];

    protected $casts = [
        'role' => IssueRoleEnum::class,
    ];

    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;


    public function scopeRole($query, $role)
    {
        return $query->where('role', $role);
    }

    public function scopeWithRoles($query, $roles)
    {
        return $query->whereIn('role', $roles);
    }

    public function scopeWaitingOn($query)
    {
        $user = auth()->user();

        return $query->where(function($query) use ($user) {
            $query->where('user_id', $user->id)
                ->where('role', 'fixer');
        });
    }

    public function scopeMyIssues($query)
    {

        $user = auth()->user();

        return $query->where(function($query) use ($user) {
            $query->where('user_id', $user->id)
                ->whereIn('role', ['creator', 'fixer', 'tester']);

        });
    }
}
