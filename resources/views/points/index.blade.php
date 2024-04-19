@extends('layouts.master')
@section('content')

<points-index :points="{{ $points_data }}" ></points-index>

@endsection
@push('scripts')

<script src="{{asset('backend/js/app-ecommerce-customer-all.js')}}"></script>
@endpush
