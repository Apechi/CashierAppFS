@php $editing = isset($type) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Nama"
            :value="old('name', ($editing ? $type->name : ''))"
            maxlength="255"
            placeholder="Nama Tipe"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-5">
        <x-inputs.text
            name="icon"
            label="Icon"
            :value="old('icon', ($editing ? $type->icon : ''))"
            maxlength="255"
            placeholder="font-awesome icom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="category_id" label="Kategori" required>
            @php $selected = old('category_id', ($editing ? $type->category_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Silahkan Pilih Kategorinya</option>
            @foreach($categories as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
