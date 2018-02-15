@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{ trans('auth.emailConfirmation') }}</div>

                <div class="card-body">
                    @include('layouts.partials.alerts')
                    <p>{{ trans('auth.anEmailHasBeenSentTo') }}</p>
                    <p>{{ $user->email }}</p>
                    <p>{{ trans('auth.pleaseCheckAndClickTheConfirmationLink') }}</p>
                    <form method="POST" action="{{route('confirm.resend')}}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$user->id}}" name="id">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('auth.resendConfirmationEmail') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
