@component('mail::message')
    # {{$purchasedType}}

    Dear {{ $user->name }},

    Please use the below code to download the content from Photo Booth Content.

    Your Code is {{ $code }}

    Thanks
    {{ config('app.name') }}
@endcomponent
