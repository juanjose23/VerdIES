@extends('Layouts.layouts')
@section('title', 'Promociones')
@section('content')
@php
    $idUsuario = session('IdUser');
    $roleUsuario = App\Models\RolesUsuarios::where('users_id',$idUsuario)->first()
@endphp

@if (  $roleUsuario ->roles_id == 6)
    <livewire:canjes />
@else
<livewire:listaadmin />
@endif

@endsection
