@extends('layouts.app')

@section('content')
    <div class="row banner login">
        <div class="col-md-3 offset-md-8">
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf

                <div class="form-group row">

                    <input id="email" placeholder="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">

                    <input id="password" placeholder="password"  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <button type="submit" class="btn btn-primary offset-md-7 col-md-5">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
