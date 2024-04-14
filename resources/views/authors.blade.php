@extends('layouts.dashboard')

@section('title', 'Authors Page')

@section('content')

    @php
        $actions = [
            ['label' => 'Open', 'type' => 'link', 'route' => 'authors.show', 'class' => 'text-blue-500 hover:text-blue-600 px-4'],
        ];
    @endphp
    <x-dynamic-table :models="$authors" :currentPage=$current_page :totalPages=$total_pages :actions=$actions />
@endsection