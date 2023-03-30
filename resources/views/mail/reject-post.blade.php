@component('mail::message')
Hola {{$post->user['name']}} el post que has solicitado la revision con nombre {{$post['name']}} ha sido reprobado porque no cumple con los requisitos necesarios para ser publicado en la Plataforma de Recursos Educativos.
@component('mail::panel')
Motivo de Rechazo.
{!!$post->observation['body']!!}
Gracias por formar parte de esta comunidad de educadores.
Correo de contacto:{{$post->user['email']}}.
@endcomponent
@endcomponent