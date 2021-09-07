<h4> Hey {{ $user->name  }}</h4>
<p>To finish registration click on the link</p>
<a href="{{ env('APP_FRONT_URL', 'http://localhost:8080/verify')."/$user->email"."/$token"}}">Link</a>
