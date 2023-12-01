<div>
    <!-- Start Section-->
    <div class="container mx-auto">
        <h2 class="text-4xl mx-auto text-center mb-10 ">
            <span class="border-y-2 border-red-600 px-12">
                {{ __('Portafolio') }}
            </span>

        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4  gap-2">
            @foreach($projects as $project)
            <div class="group rounded w-full md:h-72 lg:h-72 2xl:h-96 h-96 relative bg-no-repeat bg-cover" style="background-image: url('{{ $project->image }}')" >

                <div class="absolute inset-0 group-hover:bg-pink-700/80 dark:group-hover:bg-slate-900/90 transition duration-500 z-0 rounded-md"></div>
                <div class="content transition-all duration-500 text-white">
                    <div class="absolute z-10 opacity-0 group-hover:opacity-100 h-full w-full transition-all duration-500 p-3">
                        <div class="border-white w-full h-full border-2 p-3">
                            <h3 class="text-xl font-medium">{{ $project->name }}</h3>
                            <div class="prose lg:prose-xl max-w-none m-auto text-white">
                                {!! $project->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- BEGIN: Pagination -->
        <div class="w-full mt-5">{{ $projects->links() }}</div>
        <!-- END: Pagination -->
    </div>
    <!-- End Section-->
</div>
