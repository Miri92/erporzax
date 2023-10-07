@extends('panel.layout.app')
@section('title', 'Doc create')


@section('content')
    <form method="post" action="{{ route('panel.doc.store') }}" enctype="multipart/form-data">

        <input type="text" name="name" placeholder="name">
        <br>
        <input type="text" name="status" placeholder="status">
        <br>
        <input type="text" name="title" placeholder="title">
        <br>
        <input type="file" name="doc" placeholder="doc">
        <br>
        <button>Create</button>

        @csrf
    </form>
@endsection
