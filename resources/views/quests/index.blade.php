@extends('layouts.master')
@section('content')

<quests-index :points="{{ $quests_data }}"></quests-index>

@endsection
@push('scripts')

<script src="{{asset('backend/js/app-ecommerce-customer-all.js')}}"></script>
@endpush