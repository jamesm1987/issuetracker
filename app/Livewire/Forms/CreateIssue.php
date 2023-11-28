<?php

namespace App\Livewire\Forms;

use Livewire\Component;


class CreateIssue extends Component
{

    public $currentProject = '';
    public $projects = [];
    public $show = false;

    #[On('IssueModalToggled')]
    public function toggleIssueModal()
    {
        $this->show = !$this->show;
        dd($this->show());
    }


    public function getCurrentProject()
    {

        $pattern = '~^.*/projects/(\d+).*?$~';
        
        // Perform the regular expression match
        if (preg_match($pattern, request()->fullUrl(), $matches)) {
            // $matches[0] contains the entire matched string
            // $matches[1] contains the project ID
            return $matches[1];
        }
     

        return null;

    }


    public function render()
    {
    
        $this->projects = auth()->user()->projects()->get();
        $this->currentProject = $this->getCurrentProject();

        return view('livewire.forms.create-issue');
    }
}
