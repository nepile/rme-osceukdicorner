<x-header title="{{ $title }}" />

<x-navbar-participant />

<x-content>
    {{ $slot }}
</x-content>

<x-footer />