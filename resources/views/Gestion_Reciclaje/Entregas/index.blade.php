@extends('Layouts.layouts')
@section('title', 'Entregas')
@section('content')

    <livewire:entregas />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            @if (Session::has('Limpiar'))
                localStorage.clear();
            @endif
        });
    </script>
@endsection
