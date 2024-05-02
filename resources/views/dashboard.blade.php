@extends('layouts.master')
@section('content')

<dashboard :users_count="{{ $users_count }}" :quests="{{ $quests }}" :tweetts_like_count="{{ $tweetts_like_count }}" :mentions_count="{{ $mentions_count }}"></dashboard>

@endsection
@push('scripts')

<script src="{{asset('backend/js/app-ecommerce-customer-all.js')}}"></script>
@endpush