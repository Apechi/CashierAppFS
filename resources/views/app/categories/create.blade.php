@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ route('categories.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                    @lang('crud.categories.create_title')
                </h4>

                <x-form method="POST" action="{{ route('categories.store') }}" class="mt-4">
                    @include('app.categories.form-inputs')

                    <div class="mt-4">
                        <a href="{{ route('categories.index') }}" class="btn btn-light">
                            <i class="icon ion-md-return-left text-primary"></i>
                            @lang('crud.common.back')
                        </a>


                    </div>
                </x-form>
            </div>
        </div>
    </div>
@endsection
