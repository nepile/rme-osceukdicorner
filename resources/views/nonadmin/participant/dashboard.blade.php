@extends('admin.template.subtemplate')

@section('admin-template')
    <form action="{{ route('handle-logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger">LOGOUT</button>
    </form>
@endsection