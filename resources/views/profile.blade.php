@extends('layouts.app')

@section('content')
    <div class="row banner profile">
        <div class="col-sm-12">
            <h3 class="text-right">User Profile</h3>
        </div>
    </div>

    <div class="row form profile">
        <div class="col-md-5">
            <form id="save-profile" method="POST" action="{{ route('profile') }}" aria-label="{{ __('Save Profile') }}" novalidate>
                @csrf

                <div class="form-group">
                    <ul id="form-errors"></ul>
                </div>

                <div class="form-group">
                    <label for="first_name">Name</label>

                    <input id="first_name" placeholder="name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ Auth::user()->first_name }}" required autofocus>

                </div>

                <div class="form-group">
                    <label for="last_name">Surname</label>

                    <input id="last_name" placeholder="surname" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ Auth::user()->last_name }}" required>

                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" placeholder="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary col-md-4">
                        {{ __('Submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
