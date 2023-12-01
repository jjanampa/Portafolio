<div>
    <x-dialog-modal wire:model="openModal">
        <x-slot name="title">
            {{ __('Project') }}
        </x-slot>

        <x-slot name="content">
            <div class="">
                <label class="form-label" for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                <input id="name" type="text" class="form-control" wire:model="form.name">
                <x-input-error for="form.name" class="mt-1" />
            </div>
            <div class="mt-3">
                <label class="form-label" for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                <div wire:ignore>
                    <textarea id="description" rows="5" class="form-control h-[250px]"></textarea>
                </div>
                <x-input-error for="form.description" class="mt-1" />
            </div>
            <div class="mt-3">
                <label class="form-label" for="status">{{ __('Publish') }} <span class="text-danger">*</span></label>
                <div class="form-check form-switch">
                    <input id="status" wire:model="form.status"  class="form-check-input" type="checkbox" >
                </div>
                <x-input-error for="form.status" class="mt-1" />
            </div>
            <div class="mt-3">
                <label class="form-label" for="image">{{ __('Image') }}</label>
                <div class="w-full border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                    <div class="h-44 relative image-fit cursor-pointer zoom-in mx-auto">
                        @if ($form->image)
                            <img class="rounded-md" src="{{ $form->image->temporaryUrl() }}">
                        @elseif ($project->image)
                            <img class="rounded-md" src="{{ $project->image }}" >
                        @else
                            <img src="https://via.placeholder.com/600x300?text=600x300" class="rounded-md">
                        @endif
                    </div>
                    <div class="mx-auto cursor-pointer relative mt-5">
                        <button type="button" class="btn btn-primary w-full">{{ __('Change Image') }}</button>
                        <input accept="image/*" wire:model="form.image" type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                        <div wire:loading wire:target="form.image">Uploading...</div>
                    </div>
                </div>
                <x-input-error for="form.image" class="mt-1" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('openModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    @assets
        <script src="{{ asset('build/ckeditor-classic/ckeditor.js') }}"></script>
    @endassets
    @pushOnce('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                var editor = ClassicEditor.create(document.querySelector('#description'), {
                    mediaEmbed:{
                        previewsInData:true
                    },
                    ckfinder: {
                        uploadUrl: '{{route('upload.image').'?_token='.csrf_token()}}',
                    }
                });
                window.addEventListener('openModal-{{ $this->getId() }}', event => {
                    editor
                        .then(function(editor){
                            if (event.detail.project.description) {
                                editor.setData(event.detail.project.description);
                            }

                            editor.model.document.on('change:data', () => {
                                console.log(editor.getData());
                            @this.set('form.description', editor.getData());
                            })
                        })
                        .catch((error) => {
                            console.error(error);
                        });
                })
            })
        </script>
    @endPushOnce
</div>
