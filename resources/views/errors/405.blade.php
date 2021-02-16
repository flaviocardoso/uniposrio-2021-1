@extends('layout.layout')

@section('content')
<p>Página não encontrada</p>
<a href="{{ url()->previous() }} ">Voltar</a>
@endsection