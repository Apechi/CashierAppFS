@php $editing = isset($booking) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="bookers_name"
            label="Nama Pemesan"
            :value="old('bookers_name', ($editing ? $booking->bookers_name : ''))"
            maxlength="255"
            placeholder="Nama Pemesan"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date"
            label="Tanggal Booking"
            value="{{ old('date', ($editing ? optional($booking->date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="table_id" label="Meja" required>
            @php $selected = old('table_id', ($editing ? $booking->table_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>SIlahkan Pilih Meja yang Ingin Di Pesan</option>
            @foreach($tables as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="start_time"
            label="Jam Mulai"
            :value="old('start_time', ($editing ? $booking->start_time : ''))"
            maxlength="255"
            placeholder="Start Time"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="end_time"
            label="Jam Akhir"
            :value="old('end_time', ($editing ? $booking->end_time : ''))"
            maxlength="255"
            placeholder="End Time"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="total_customer"
            label="Total Pelanggan"
            :value="old('total_customer', ($editing ? $booking->total_customer : ''))"
            max="255"
            placeholder="Total Pelanggan"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
