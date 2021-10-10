@extends('layouts.app')

@section('content')
</div>
<div class="container-fluid">
    @include('users.partials.action-buttons', ['user' => $user])
    <h2 class="page-header">
        {{ $user->name }} <small>@yield('subtitle')</small>
    </h2>
    @yield('user-content')
@endsection
