@extends('layouts.app')

@section('content')
    <div class="row banner login">
        <div class="col-md-3 offset-md-8">
            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf

                <div class="form-group row">
                    <input id="first_name" placeholder="name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                    @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <input id="last_name" placeholder="surname" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required>

                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <input id="email" placeholder="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <input id="password" placeholder="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <input id="password-confirm" placeholder="confirm password" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <div class="form-group row mb-0">
                    <button type="submit" class="btn btn-primary offset-md-7 col-md-5">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
