<meta charset="utf-8">
<meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no" />
<meta http-equiv="X-UA-Compatible"
    content="IE=Edge">
<meta name="robots"
    content="noindex,nofollow" />
<meta name="csrf-token"
    content="{{ csrf_token() }}">

<title>{{ dashboard_ui()->title(__($attributes->get('title', 'Dashboard'))) }}</title>

<link href="{{ asset('assets/dashboard/abstract/css/dashboard.css') }}"
    rel="stylesheet"
    type="text/css" />
@livewireStyles

<link rel="stylesheet"
    type="text/css"
    href="{{ '/assets/dashboard/abstract/laravel-notify/css/notify.css' }}" />
