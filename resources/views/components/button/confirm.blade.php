<x-dashboard::alert.confirm :id="$id"
    :options="$options">
    <x-dashboard-button :id="$id">
        {!! $slot !!}
    </x-dashboard-button>
</x-dashboard::alert.confirm>
