<x:notify-messages />

<script src="{{ asset('assets/dashboard/abstract/js/dashboard.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@livewireScripts
@livewireSweetalertScripts
<script type="text/javascript"
src="{{ '/assets/dashboard/abstract/laravel-notify/js/notify.js' }}"></script>

<form id="logout-form"
    action="{{ config('dashboard-ui.url.logout') }}"
    method="POST"
    class="hidden">
    {{ csrf_field() }}
</form>

<script>
    window.addEventListener('windowReload', function(event) {
        location.reload()
    });
</script>
