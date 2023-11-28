<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Enum\IssueStatusEnum;
use App\Enum\IssuePriorityEnum;

class Issue extends Model
{
    use HasFactory;
    

    protected $fillable = [
    ];
    
    protected $casts = [
      'status' => IssueStatusEnum::class,       
      'priority' => IssuePriorityEnum::class
    ];
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->using(IssueUser::class)
            ->withPivot('role');
    }

    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function files() 
    {

    }

    public function comments()
    {

    }

    public function tags()
    {

    }

public function scopeMyIssues($query)
    {

        $user = auth()->user();

        return $query->where(function($query) use ($user) {
            $query->whereHas('users', function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->whereIn('role', ['creator', 'fixer', 'tester']);
            });
        });

    }

    public function priorityClass($priority) {
        return strtolower($priority->value);
    }

    public function updated_status() {
        return is_null($this->updated_at) ? "Created {$this->created_at->diffForHumans()} by {$this->creator()->name }" : "Updated {$this->updated_at->diffForHumans()} by {$this->updatedBy->name}"; 
    }

    public function creator()
    {
        return $this->users()->wherePivot('role', 'creator')->first();
    }

    public function fixer()
    {
        return $this->users()->wherePivot('role', 'fixer')->first();
    }

    public function tester()
    {
        return $this->users()->wherePivot('role', 'tester')->first();
    }


}
