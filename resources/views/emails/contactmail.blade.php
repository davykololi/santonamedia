@component('mail::message')
# Hi Admin,

This message has been sent to you from <span style="margin: 5px;">{!! $name !!} </span> whose email address is 
<i style="margin: 5px;">{!! $email !!}</i>.

Subject: <p style="color: green;text-align: center;"> <b>{!! $subject !!}</b> </p>

Message: <p style="color: blue"> {!! $message !!} </p>

@component('mail::button', ['url' => 'https://santonamedia.com','color'=>'success'])
	View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
