@extends('admin.master')

@section('title', 'Subscribers')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Subscribers</h4>
        <!-- Basic Bootstrap Table -->
        <div class="card mb-4">
            <div class="card-body">
                @livewire('admin.subscribers.subscribers-data')
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        @livewire('admin.subscribers.subscribers-delete')
    </div>
    <!-- / Content -->
@endsection
