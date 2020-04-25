@component('mail::message')
# Hi News Admin,

This message has been sent to you from santonamedia.com esteemeed reader.

Name: <p> {!! $name !!} </p>

E-mail: <p> <i>{!! $email !!}</i> </p>

Message: <p style="color: blue"> {!! $message !!} </p>

@component('mail::button', ['url' => 'https://santonamedia.com'])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
