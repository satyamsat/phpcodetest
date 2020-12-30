@extends('layout.app')

@section('title') User Card - {{ $user->name }} @endsection

@section('content')
	<section id="main">
        <header>
            <span class="avatar"><img src="images/users/{{ $user->id }}.jpg" alt="" /></span>
            <h1>{{ $user->name }}</h1>
            <p>{!! $user->comments !!}</p>
        </header>
    </section>
@endsection