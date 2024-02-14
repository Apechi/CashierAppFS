@php $editing = isset($category) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text name="name" wire:model="name" label="Nama" :value="old('name', $editing ? $category->name : '')" maxlength="255"
            placeholder="Nama Tipe" required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-5">
        <x-inputs.text name="icon" wire:model="icon" label="Icon" :value="old('icon', $editing ? $category->icon : '')" maxlength="255"
            placeholder="font-awesome/bootstrap icon" required></x-inputs.text>
    </x-inputs.group>
</div>
