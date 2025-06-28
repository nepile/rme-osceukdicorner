<x-nonadmin-template title="{{ $title }}">
    <form action="{{ route('handle-logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger">LOGOUT</button>
    </form>
</x-nonadmin-template>