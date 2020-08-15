<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>{{ trans('contacts.email-title') }}</h1>
        <p><b>{{ trans('contacts.full-name') }}</b><br> {{ $name }}</p>
        <p><b>{{ trans('contacts.email') }}</b><br> {{ $email }}</p>
        <p><b>{{ trans('contacts.subject') }}</b><br> {{ $subject }}</p>
        <p><b>{{ trans('contacts.message') }}</b><br> {{ $body }}</p>
    </body>
</html>