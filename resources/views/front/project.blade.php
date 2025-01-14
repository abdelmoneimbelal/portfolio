@extends('front.master')

@section('title', 'Project')

@section('header')
    @include('front.partials.sub-header', ['pageName' => 'Project'])
@endsection

@section('content')
    <!-- Projects Start -->
    @livewire('front.components.projects-component')
    <!-- Projects End -->
@endsection
