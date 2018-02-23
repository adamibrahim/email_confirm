@extends('emailConfirm::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{ trans('emailConfirm::auth.login') }}</div>

                <div class="card-body">
                    @include('emailConfirm::layouts.partials.alerts')
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ trans('emailConfirm::auth.emailAddress') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" name="email" value="{{ old('email') }}"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ trans('emailConfirm::auth.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"  name="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{ trans('emailConfirm::auth.rememberMe') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('emailConfirm::auth.login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ trans('emailConfirm::auth.forgotYourPassword') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
