@extends('layouts.app')

@section('page_title')
    @parent Home
@endsection

@section('page_navbar')
    @parent

    <p>This is appended to the master left sidebar.</p>
@endsection

@section('page_content')
    <p>This is the body content.</p>
@endsection
