@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset



{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
{{trans('emailConfirm::auth.regards')}},<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
    {{trans('emailConfirm::auth.ifYouAreHavingTroubleClickingThe')}} "{{ $actionText }}" {{trans('emailConfirm::auth.button')}},
    {{trans('emailConfirm::auth.copyAndPasteTheURLBelowIntoYourWebBrowser')}}<br>
    [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endisset
@endcomponent
