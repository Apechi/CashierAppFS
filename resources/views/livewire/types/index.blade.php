<div>
    <div class="container">
        <div class="searchbar mt-0 mb-4">
            <div class="d-flex justify-content-end">
                <div class="text-right">
                    @can('create', App\Models\Type::class)
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">
                            <i class="icon ion-md-add"></i> Tambah
                        </button>
                    @endcan
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="card-title">@lang('crud.types.index_title')</h4>
                </div>

                <div class="table-responsive" wire:ignore>
                    <table id="tableType" class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th class="text-left">
                                    @lang('crud.types.inputs.name')
                                </th>
                                <th class="text-left">
                                    @lang('crud.types.inputs.icon')
                                </th>
                                <th class="text-left">
                                    @lang('crud.types.inputs.category_id')
                                </th>
                                <th class="text-center">
                                    @lang('crud.common.actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($types as $type)
                                <tr>
                                    <td>{{ $type->name ?? '-' }}</td>
                                    <td>
                                        <button type="none" class="btn btn-light">
                                            <i class="{{ $type->icon ?? '-' }}"></i>
                                        </button>
                                    </td>
                                    <td>
                                        {{ optional($type->category)->name ?? '-' }}
                                    </td>
                                    <td class="text-center" style="width: 134px;">
                                        <div role="group" aria-label="Row Actions" class="btn-group">
                                            @can('update', $type)
                                                <a data-bs-toggle="modal" data-bs-target="#editType"
                                                    wire:click='edit({{ $type->id }})'>
                                                    <button type="button" class="btn btn-light">
                                                        <i class="icon ion-md-create"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('view', $type)
                                                <a href="{{ route('types.show', $type) }}">
                                                    <button type="button" class="btn btn-light">
                                                        <i class="icon ion-md-eye"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('delete', $type)
                                                <form action="{{ route('types.destroy', $type) }}" method="POST"
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
                            @empty
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        @include('app.types.create')
        @include('app.types.edit')
    </div>
</div>
@script
    <script>
        $(document).ready(function() {
            $('#tableType').DataTable();
        });
    </script>
@endscript
