<div>
    <div class="modal fade" wire:ignore.self id="editType" tabindex="-1" aria-labelledby="editTypeLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <x-form method="PUT" action="{{ route('types.update', $type) }}" class="mt-4">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editTypeLabel">Edit Tipe Menu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('app.types.form-inputs')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
</div>
