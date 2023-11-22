<div>
    @foreach ($issues as $issue)
        <div class="flex py-3">
            <p><a href="{{ route('project.issue.show', ['project_id' => $issue->project->id, 'issue_number' => $issue->issue_number]) }}"><span class="py-3 px-12 uppercase text-white bg-{{ $issue->priorityClass($issue->priority) }}">{{ $issue->status }}</span></a></p>
            <p class="text-{{ $issue->priorityClass($issue->priority) }}"><a href="{{ route('project.issue.show', ['project_id' => $issue->project->id, 'issue_number' => $issue->issue_number]) }}">#{{ $issue->issue_number }}: {{ $issue->title }}</a></p>
            <p><a href="{{ route('projects.show', ['id' => $issue->project->id])}}">{{ $issue->project->name }}</a> - <small> {{$issue->updated_status() }}</small></p>
            <p>Fixer: {{$issue->fixer()->name }}</p>
            <p>Tester: {{ $issue->tester()->name }}</p>
        </div>
    @endforeach
</div>