@extends('layouts.master')
@section('content')
<point-index  :points={{$points}} ></point-index>

@endsection
@push('scripts')
    
    <script src="{{asset('backend/js/app-ecommerce-customer-all.js')}}"></script>
@endpush