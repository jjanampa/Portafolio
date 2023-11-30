<div>

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ __('My projects') }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button class="btn btn-sm btn-primary shadow-md mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="plus" data-lucide="plus" class="lucide lucide-plus w-4 h-4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                {{ __('Add New') }}
            </button>
        </div>
    </div>

    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Blog Layout -->
        @foreach($projects as $project)
        <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-4">
                <div class="mr-auto">
                    <a href="" class="font-medium">{{ $project->name }}</a>
                    <div class="flex text-slate-500 truncate text-xs mt-0.5">
                        {{ $project->created_at->diffForHumans() }}
                    </div>
                </div>
                <div>
                    <!-- Dropdown button -->
                    <button id="dropdownButton-project-{{ $project->id }}" data-dropdown-toggle="dropdownContent-project-{{ $project->id }}" data-dropdown-offset-skidding="-30" class="btn btn-outline-secondary px-1 py-1" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-more-vertical w-5 h-5"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownContent-project-{{ $project->id }}" class="dropdown-menu hidden">
                        <ul class="dropdown-content">
                            <li>
                                <button class="dropdown-item" wire:click="$dispatchTo('projects.detail', 'show', { project: {{ $project->id }} } )" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pen-square w-4 h-4 mr-1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>
                                    {{ __('Edit') }}
                                </button>
                            </li>
                            <li>
                                <button  class="dropdown-item text-danger" wire:click="$dispatchTo('projects.detail', 'delete', { project: {{ $project->id }} } )">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash" data-lucide="trash" class="lucide lucide-trash w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path></svg>
                                    {{ __('Delete') }}
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <div class="h-40 2xl:h-56 image-fit">
                    <img alt="Midone - HTML Admin Template" class="rounded-md" src="{{ $project->image }}">
                </div>
                <div class="text-slate-600 dark:text-slate-500 mt-2">
                    {{ str($project->description)->limit(120)  }}
                </div>
            </div>

            <div class="flex items-center px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400">
                <a class="flex items-center text-primary mr-auto" href="" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="eye" data-lucide="eye" class="lucide lucide-eye w-4 h-4 mr-1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    {{ __('Preview') }}
                </a>
                @if($project->status)
                    <div class="flex items-center justify-center text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg>
                        {{ __('Published')  }}
                    </div>
                @else
                    <div class="flex items-center justify-center text-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg>
                        {{ __('Not Published')  }}
                    </div>
                @endif
            </div>
        </div>
        @endforeach

        <!-- END: Blog Layout -->
        <!-- BEGIN: Pagination -->
        <div class="col-span-12">{{ $projects->links() }}</div>
        <!-- END: Pagination -->
    </div>
    <livewire:projects.detail />
</div>
