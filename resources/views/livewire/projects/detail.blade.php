<div>
    <div wire:ignore.self id="modal-{{ $this->getId() }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                @if($project)
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            {{ $project->name }}
                        </h3>
                        <button wire:click="$dispatch('closeModal')" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body py-1 px-2 flex flex-grow overflow-auto">

                    </div>
                @endif
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button class="btn btn-outline-secondary ml-auto" wire:click="$dispatch('closeModal')"> {{ __('Cancel') }}</button>
                    <button class="btn btn-primary" wire:click="save">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
    </div>

    @pushOnce('scripts')
        <script>
            document.addEventListener('livewire:navigated', () => {
                const $targetEl = document.getElementById('modal-{{ $this->getId() }}');
                if (!$targetEl) return;

                let modal = new Modal($targetEl, {closable: false});
                window.addEventListener('openModal-{{ $this->getId() }}', event => {
                    modal.show();
                })
            });
        </script>
    @endPushOnce
</div>
