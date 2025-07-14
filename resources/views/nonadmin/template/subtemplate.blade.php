<x-header :title="$title" />

@if (request()->routeIs('examination') || request()->routeIs('diagnosis') || request()->routeIs('theraphy'))
    <x-navbar-exam :active="$active ?? 'pemeriksaan'" />
@else
    <x-navbar-participant />
@endif

<x-content>
    {{ $slot }}
</x-content>

<x-footer />
