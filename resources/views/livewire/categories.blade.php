<div>
    <div class="container">
        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <input class="w-100" wire:model.live="search" type="text" placeholder="Search">
                </div>
                <div class="col-md-2">
                    @can('create', App\Models\Category::class)
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#createCategories">
                            Tambah
                        </button>
                    @endcan
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="card-title">@lang('crud.categories.index_title')</h4>
                </div>

                <div class="table-responsive">
                    <table id="tableKategori" class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th class="text-left">
                                    @lang('crud.categories.inputs.name')
                                </th>
                                <th class="text-left">
                                    @lang('crud.categories.inputs.icon')
                                </th>
                                <th class="text-center">
                                    @lang('crud.common.actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr wire:key="anjay-{{ $category->id }}">
                                    <td>{{ $category->name ?? '-' }}</td>
                                    <td>
                                        <button type="none" class="btn btn-light">
                                            <i class="{{ $category->icon ?? '-' }}"></i>
                                        </button>
                                    </td>
                                    <td class="text-center" style="width: 134px;">
                                        <div role="group" aria-label="Row Actions" class="btn-group">
                                            @can('update', $category)
                                                <button wire:click= "edit('{{ $category->id }}')" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#editCategories"
                                                    class="btn btn-light">
                                                    <i class="icon ion-md-create"></i>
                                                </button>
                                                @endcan @can('view', $category)
                                                <a href="{{ route('categories.show', $category) }}">
                                                    <button type="button" class="btn btn-light">
                                                        <i class="icon ion-md-eye"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('delete', $category)
                                                <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                                    onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-light text-danger">
                                                        <i class="icon ion-md-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
        @include('livewire.categories-form')
        @include('livewire.categories-edit')
    </div>
</div>