<div class="flex items-center justify-center relative">
    <button wire:click="toggleSelect" class="flex items-center">Issues: All Projects<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
    </button>

    <div class="{{ !$this->isOpen ? 'hidden': '' }} bg-white p-6 border mt-6 absolute top-6">
        <div><p>Switch Project</div>

        <input wire:model.live="filter" type="text" />
   
        <ul>
            <li><a href="{{ route('dashboard') }}">All projects</a></li>
            
            @foreach ($filteredProjects as $project)

                <li><a href="{{ route('projects.show', ['id' => $project->id]) }}">{{ $project->name }}</a></li>

            @endforeach
        </ul>
    </div>

</div>
