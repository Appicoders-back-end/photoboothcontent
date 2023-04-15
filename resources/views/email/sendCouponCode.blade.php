@component('mail::message')
    # Membership Purchased

    Dear {{ $user->name }},

    Please use the below code to download the content from Photo Booth Content.

    Your Code is {{ $code }}

    If you did not buy any membership, no further action is required.

    Thanks
    {{ config('app.name') }}
@endcomponent
