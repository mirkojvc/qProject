@extends('layouts.dashboard')

@section('title', 'Dashboard Page')

@section('content')
    WELCOME {{ $user->first_name }} {{ $user->last_name }}
@endsection