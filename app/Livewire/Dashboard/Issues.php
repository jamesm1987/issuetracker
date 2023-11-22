<?php

namespace App\Livewire\Dashboard;
use Livewire\Component;

use App\Models\Issue;

class Issues extends Component
{
    public $issues = [];

    public function render()
    {
        
        $this->issues = Issue::myIssues()->get();

        return view('livewire.dashboard.issues');
    }
}
