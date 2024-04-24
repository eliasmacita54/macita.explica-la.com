@component('mail::message')

Viva {{$user->name}},

<p>Nos entendemos o que se passou</p>

@component('mail::button', ['url' => url('reset/' . $user->remember_token)])
    reset password
@endcomponent

<p>Se tiver problemas a effetuar o mesmo por favor nos contacte.</p>
Obrigado!
<p>Atensiosamente Escola Secundaria São Gabriel</p>
{{config('app.name')}}
@endcomponent
