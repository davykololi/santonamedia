@component('mail::message')
# Hi News Admin,

This message has been sent to you from news.com esteemeed reader.

Name: {!! $name !!}

E-mail: {!! $email !!}

Message: {!! $message !!}

@component('mail::button', ['url' => 'http://localhost:8888',])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
