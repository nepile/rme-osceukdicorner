<x-header title="{{ $title }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</x-header>

<x-content>
    @include('admin.template.sidebar')
    <div class="container-fluid">
        <div class="content">
            <div class="container" style="margin-top: 60px;">
                @include('admin.template.navbar')
                {{ $slot }}
            </div>
        </div>
    </div>
</x-content>

<x-footer>
    <script src="{{ asset('js/admin.js') }}"></script>
</x-footer>