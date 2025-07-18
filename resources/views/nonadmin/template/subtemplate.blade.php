<x-header :title="$title" />

@if (session('user.role') === 'mentor')
    <x-navbar-tester />

    @if (
        request()->routeIs('examination') ||
        request()->routeIs('diagnosis') ||
        request()->routeIs('theraphy') ||
        request()->routeIs('assessment-tester')
    )
        <x-navbar-exam :active="$active ?? 'pemeriksaan'" :tester="$tester" />
    @endif

@elseif (
    request()->routeIs('examination') ||
    request()->routeIs('diagnosis') ||
    request()->routeIs('theraphy') ||
    request()->routeIs('assessment-tester')
)
    <x-navbar-exam :active="$active ?? 'pemeriksaan'"  :tester="$tester" />

@else
    <x-navbar-participant />
@endif

<x-content>
    {{ $slot }}
</x-content>

<x-footer />
