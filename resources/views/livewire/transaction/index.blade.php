<div>
    <div class="container p-3">
        <div class="row">
            <div class="left col-lg-8">
                <h2>
                    Menu yang ada
                </h2>
                <hr>
                <div class="dropdown" wire:ignore.self>
                    <button class="btn btn-primary dropdown-toggle" type="button" id="filtersDropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filters
                    </button>
                    <div class="dropdown-menu w-100" wire:ignore.self aria-labelledby="filtersDropdown">
                        <div class="p-4">
                            <div class="kategori">
                                <p style="line-height: 0">Kategori Menu</p>
                                <div class="list Kategori overflow-auto d-flex gap-2">
                                    @foreach ($categories as $category)
                                        <span wire:click="changeTipe(0)">
                                            <button wire:key='category-{{ $category->id }}'
                                                wire:click="changeKategori({{ $category->id }})" type="button"
                                                class="btn btn-{{ $kategori_id == $category->id ? 'primary' : 'light' }}"
                                                onclick="event.stopPropagation()">{{ $category->name }}</button>
                                        </span>
                                    @endforeach

                                </div>
                            </div>

                            <div class="tipe mt-4">
                                <p style="line-height: 0">Tipe Menu</p>
                                <div class="list-tipe  overflow-auto d-flex gap-2">
                                    @if ($types)
                                        @if ($types->isEmpty())
                                            <p>Tipe tidak ada</p>
                                        @else
                                            @foreach ($types as $type)
                                                <button wire:key='type-{{ $type->id }}' type="button"
                                                    wire:click="changeTipe({{ $type->id }})"
                                                    class="btn btn-{{ $type_id == $type->id ? 'primary' : 'light' }}"
                                                    onclick="event.stopPropagation()">{{ $type->name }}</button>
                                            @endforeach
                                        @endif
                                    @else
                                        <p class="text-muted">Pilih Kategori</p>
                                    @endif
                                </div>
                            </div>

                            <div class="input-group mt-3">
                                <span class="input-group-text bi bi-search"></span>
                                <input wire:model.live='search' type="text" class="form-control" placeholder="Search"
                                    aria-label="Search" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-list mt-3">
                    <div class="row">

                        @if ($produk->isEmpty())
                            <div class="d-flex gap-3 justify-content-center text-center">
                                <span class="bi bi-search"></span>
                                <p>Produk Tidak ada</p>
                            </div>
                        @else
                            @foreach ($produk as $item)
                                <div wire:key='menu-{{ $item->id }}' class="col-md-12  col-lg-4 mb-4 mb-lg-3">
                                    <div class="card h-100 ">

                                        <img src="{{ $item->image ? \Storage::url($item->image) : '' }}"
                                            class="card-img-top p-3" style="border-radius: 2em"
                                            alt="{{ $item->name }}" />
                                        <div class="card-body">
                                            <div class="d-flex gap-1">
                                                <span class="{{ $item->type->icon }}"></span>
                                                <p class="small"><a href="#!"
                                                        class="text-muted">{{ $item->type->name }}</a></p>
                                            </div>

                                            <div class=" mb-3">
                                                <div class="d-flex justify-content-between flex-wrap">
                                                    <h5 class="mb-2">{{ $item->name }}</h5>
                                                    <p>Stok: {{ $item->stocks->first()->quantity ?? '0' }}</p>
                                                </div>
                                                <h5 class="text-primary mb-0">Rp.{{ $item->price }}</h5>
                                            </div>

                                            <div class="d-flex justify-content-between mb-2">
                                                <p class="text-muted mb-0">{{ $item->description }}</p>

                                            </div>


                                        </div>
                                        @if (is_null($item->stocks->first()->quantity ?? null) || $item->stocks->first()->quantity <= 0)
                                            <div class="card-footer">
                                                <button type="button" disabled class="btn btn-light w-100">
                                                    Stok Habis
                                                </button>
                                            </div>
                                        @else
                                            <div class="card-footer">
                                                <button wire:click='pilihMenu({{ $item->id }})' type="button"
                                                    class="btn btn-warning w-100">
                                                    Pilih Produk
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="tes">
                        {{ $produk->links() }}
                    </div>
                </div>
            </div>
            <div class="right col-lg-4 ">
                <div class="card vh-100">
                    <div class="m-3 d-flex justify-content-start align-items-center gap-2">
                        <i class="fa fa-receipt text-center"></i>
                        <h5 class="m-0">Pesanan Anda</h5>
                        @if (count($produk_detail) != 0)
                            <button data-bs-toggle="modal" data-bs-target="#ClearTransactionModal" type="button"
                                class="ms-auto btn btn-danger">
                                <i class="bi bi-trash">

                                </i>
                            </button>
                        @endif
                    </div>
                    <hr class="m-0">
                    <div class="product-detail h-100 p-3">
                        @foreach ($produk_detail as $item)
                            <div wire:key='product_detail-{{ $item['id'] }}' class="card mb-2 p-2">
                                <div class="produk d-flex align-items-center">
                                    <img class="m-2 img-thumbnail"
                                        src="{{ $item['image'] ? \Storage::url($item['image']) : '' }}"
                                        style="width:50px; height: 100%; object-fit: cover"
                                        alt="{{ $item['name'] }}" />
                                    <div class="detail w-100 d-flex justify-content-between align-items-center">
                                        <div class="info">
                                            <p class="text-primary m-0" style="font-weight: bold">{{ $item['name'] }}
                                            </p>
                                            <p class="text-muted m-0">Rp.{{ $item['sub_total'] }}</p>
                                        </div>
                                        <div class="qtyControl d-md-flex gap-md-1">

                                            <a type="button" wire:click='decreaseQuantity({{ $item['id'] }})'
                                                class="bi bi-dash-circle-fill">
                                            </a>
                                            <p class="text-muted m-0">{{ $item['qty'] }}</p>
                                            <a type="button" wire:click='increaseQuantity({{ $item['id'] }})'
                                                class="bi bi-plus-circle-fill ">

                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if (count($produk_detail) != 0)
                        <div class="checkout m-3">
                            <button data-bs-toggle="modal" wire:click='setupCheckout()'
                                data-bs-target="#CheckoutModal" type="button" class="btn btn-success w-100">
                                Checkout
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ClearTransactionModal" tabindex="-1" aria-labelledby="ClearTransactionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ClearTransactionModalLabel">Yakin ingin menghapus semua pesanan
                        anda?
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" data-bs-dismiss="modal" wire:click='clearOrder()'
                        class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.transaction.checkout')
</div>
