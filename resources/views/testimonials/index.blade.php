@extends('welcome')

@section('content')
<x-testimonials :testimonials="$testimonials" :showAll="true" />
@endsection
