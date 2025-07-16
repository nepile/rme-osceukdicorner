<x-header :title="$title" />

@if (session('user.role') === 'mentor')
    <x-navbar-tester />

    @if (request()->routeIs('examination') || request()->routeIs('diagnosis') || request()->routeIs('theraphy'))
        <x-navbar-exam :active="$active ?? 'pemeriksaan'" />
    @endif

@elseif (request()->routeIs('examination') || request()->routeIs('diagnosis') || request()->routeIs('theraphy'))
    {{-- Non-mentor masuk ke halaman khusus pemeriksaan --}}
    <x-navbar-exam :active="$active ?? 'pemeriksaan'" />
@else
    {{-- Default peserta biasa --}}
    <x-navbar-participant />
@endif


<x-content>
    {{ $slot }}
</x-content>

<x-footer />
