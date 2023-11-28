<div>
    @if ($show)
        <div class="p-6 text-gray-900">
            
            <label class="block uppercase text-gray-700 text-sm font-bold mb-2" for="project">Project</label>
            <select id="project" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                @foreach ($projects as $project)
                    <option {{ $currentProject == $project->id ? 'selected' : '' }} value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="p-6 text-gray-900">
            <label class="block uppercase text-gray-700 text-sm font-bold mb-2" for="issue-title">Title for issue <sup>*</sup></label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="text" name="issue_title" required />
        </div>

        <div class="p-6 text-gray-900">
            <label class="block uppercase text-gray-700 text-sm font-bold mb-2" for="issue-description">Description of issue</label>
            <input type="hidden" id="issue-description" />
            <trix-editor input="issue-description"></trix-editor>

        </div>      

        <div class="p-6 text-gray-900">
            <label class="block uppercase text-gray-700 text-sm font-bold mb-2">Priority</label>
            
            <div class="flex items-center">

                <span class="bg-low p-2"><input id="issue-priority-low" type="radio" name="issue_priority" value="low"></span>
                <label class="bg-low text-white py-2 pr-3 mr-4" for="issue-priority-low">Low</label>
                <span class="bg-medium p-2"><input id="issue-priority-medium" type="radio" name="issue_priority" value="medium"></span>
                <label class="bg-medium text-white py-2 pr-3 mr-4" for="issue-priority-medium">Medium</label>
                <span class="bg-high p-2"><input id="issue-priority-high" type="radio" name="issue_priority" value="high"></span>
                <label class="bg-high text-white py-2 pr-3 mr-4" for="issue-priority-high">High</label>
                <span class="bg-critical p-2"><input id="issue-priority-critical" type="radio" name="issue_priority" value="critical"></span>
                <label class="bg-critical text-white py-2 pr-3 mr-4" for="issue-priority-critical">Critical</label>
            </div>

        </div>   




        <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 p-6 text-gray-900">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="issue-fixer">
                Who will fix the issue?
                </label>
                <select class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="issue-fixer" name="issue_tester">
                <option value="1">Admin</option>
                <option value="2">User</option>
            </select>
            </div>
            <div class="w-full md:w-1/2 p-6 text-gray-900">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                Who will verify the issue is fixed?
                </label>
                <select class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="issue-fixer" name="issue_tester">
                <option value="1">Admin</option>
                <option value="2">User</option>
            </select>
            </div>
            </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
            <div class="p-6 text-gray-900">
                <label class="block uppercase text-gray-700 text-sm font-bold mb-2" for="issue-due-date">Due date</label>
                <input id="issue-due-date" class="w-full" type="text" name="issue_due_date" />
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
            <div class="p-6 text-gray-900">
                <label class="block uppercase text-gray-700 text-sm font-bold mb-2" for="issue-tags">Tags</label>
                <input id="issue-tags" class="w-full" type="text" name="issue_tags" />
            </div>
        </div>  

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
            <div class="p-6 text-gray-900">
                <label class="block uppercase text-gray-700 text-sm font-bold mb-2" for="issue-observers">Notify these people of issue updates</label>
                <input id="issue-observers" class="w-full" type="text" name="issue_observers" />
            </div>
        </div>    

        <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Submit Issue"/>

    @endif
</div>
