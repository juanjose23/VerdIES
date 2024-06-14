@extends('Layouts.layout1')
@section('title', 'Inicio')
@section('seccion', 'Materiales que aceptamos')
@section('content')
    <section id="portfolio" class="portfolio">
        <div class="container">

            <livewire:lista-materiales />
        </div>
    </section>
@endsection
