@extends('canvas')

@section('title', 'Liste des étudiants')
@section('description', 'Groupe')
@section('content')

<div>
    @foreach($students as $student)
    <li>{{$student->first_name}}</li>
    <li>{{$student->last_name}}</li>
    @endforeach
</div>

@endsection