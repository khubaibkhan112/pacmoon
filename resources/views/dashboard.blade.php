@extends('layouts.master')
@section('content')

<dashboard :users_count="{{ $users_count }}" :quests="{{ $quests }}" :tweetts_like_count="{{ $tweetts_like_count }}" :mentions_count="{{ $mentions_count }}" :leaderboard="{{$user_leader_board}}"></dashboard>

@endsection
