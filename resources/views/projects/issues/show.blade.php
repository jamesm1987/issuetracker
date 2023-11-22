<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $issue->fixer()->name }} and {{ $issue->tester()->name }} are working on this issue.
            </h2>
        </div>
    </x-slot>

    <div class="pt-1 pb-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                   <p class="font-bold uppercase text-{{ $issue->priorityClass($issue->priority) }}">#<span>{{ $issue->issue_number }}</span> <span>{{ $issue->priority }}</span> <span>{{ $issue->status }}</span><p>
                   <h1 class="font-bold text-3xl text-{{ $issue->priorityClass($issue->priority) }}">{{ $issue->title }}</h1>
                    <div class="pt-6">{{ $issue->description }}</div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                  
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
