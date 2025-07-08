@extends('admin.master')

@section('title', 'Our Clients')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Our Clients</h4>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bx bx-plus"></i> Add new client
        </button>
        @livewire('admin.our-clients.our-clients-create')
        <!-- Basic Bootstrap Table -->
        <div class="card mb-4">
            <div class="card-body">
                @livewire('admin.our-clients.our-clients-data')
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        @livewire('admin.our-clients.our-clients-update')

        @livewire('admin.our-clients.our-clients-delete')
    </div>
    <!-- / Content -->
@endsection 