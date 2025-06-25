@extends('admin.master')

@section('title', 'Sliders')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Sliders</h4>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bx bx-plus"></i> Add new slider
        </button>
        @livewire('admin.sliders.sliders-create')
        <!-- Basic Bootstrap Table -->
        <div class="card mb-4">
            <div class="card-body">
                @livewire('admin.sliders.sliders-data')
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        @livewire('admin.sliders.sliders-update')

        @livewire('admin.sliders.sliders-delete')
    </div>
    <!-- / Content -->
@endsection