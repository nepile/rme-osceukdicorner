<x-header title="{{ $title }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</x-header>

<x-content>
    @include('admin.template.sidebar')
    <div class="container-fluid">
        @include('admin.template.navbar')
        {{ $slot }}
    </div>
</x-content>

<x-footer>
    <script src="{{ asset('js/admin.js') }}"></script>
</x-footer>