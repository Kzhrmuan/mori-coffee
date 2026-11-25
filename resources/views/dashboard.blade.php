@extends('layouts.app')

@section('title', 'Dashboard - Mori Coffee')

@section('content')
    <h3>Halo, {{ auth()->user()->name }}</h3>
    <p class="text-muted">Selamat datang di sistem penjualan Mori Coffee.</p>
@endsection