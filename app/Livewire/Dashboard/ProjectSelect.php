<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithDebounce;


class ProjectSelect extends Component
{

    public $filter = '';
    public $isOpen = false;
    public $projects = [];
    public $filteredProjects = [];


    public function mount()
    {
        $this->projects = auth()->user()->projects()->get();
        $this->filteredProjects = $this->projects;
    }

    public function toggleSelect()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function closeSelect()
    {
        $this->isOpen = false;
    }

    public function updatedFilter()
    {
        $this->filteredProjects = $this->filterProjects($this->filter);
    }

    public function filterProjects($filter)
    {
        $filter = strtolower($filter);

        return $this->projects->filter(function ($project) use ($filter) {
            return stristr($project->name, $filter) !== false;
        });
    }

    public function render()
    {
        return view('livewire.dashboard.project-select');
    }
}
