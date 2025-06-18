@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hello From Our App using The Great Framework Laravel') }}

                    <div>
                        <p> Hello </p>
                        <p> This is a simple Laravel application to demonstrate the use of Blade templates and authentication. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
