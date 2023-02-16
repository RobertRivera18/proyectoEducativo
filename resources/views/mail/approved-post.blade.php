@component('mail::message')
Hola {{$post->user['name']}} el post que has solicitado la revision con nombre {{$post['name']}} ha sido aprobado con exito.
@component('mail::panel')
Gracias por formar parte de esta comunidad de educadores.
Correo de contacto:{{$post->user['email']}}.
@endcomponent
@endcomponent