<div>
    <div class="modal fade" wire:ignore.self id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <x-form method="POST" action="{{ route('types.store') }}" class="mt-4">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="title">
                            <a class="mr-4"><i class=""></i></a>
                            Tambah Type
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <x-inputs.group class="col-sm-12">
                                <x-inputs.text name="name" label="Nama" placeholder="Nama Tipe"
                                    required></x-inputs.text>
                            </x-inputs.group>

                            <x-inputs.group class="col-sm-12 col-lg-5">
                                <x-inputs.text name="icon" label="Icon" placeholder="font-awesome icom"
                                    required></x-inputs.text>
                            </x-inputs.group>

                            <x-inputs.group class="col-sm-12">
                                <x-inputs.select name="category_id" label="Kategori" required>

                                    <option disabled {{ empty($selected) ? 'selected' : '' }}>Silahkan Pilih Kategorinya
                                    </option>
                                    @foreach ($categories as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}
                                        </option>
                                    @endforeach
                                </x-inputs.select>
                            </x-inputs.group>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
</div>
</div>
