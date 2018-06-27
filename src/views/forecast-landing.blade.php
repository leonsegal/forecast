@extends('forecast::layouts.app')

@section('content')
    <div class="content">
        <form method="POST" action="/forecast">
            @csrf

            <div class="form-group row">
                <label for="ip_address" class="col-md-4 col-form-label text-md-right">
                    {{ __('IP Address') }}
                </label>

                <div class="col-md-6">
                    <input id="ip_address"
                           class="form-control"
                           name="ip_address"
                           autofocus>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Forecast') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection()