@extends('admin.master')

@section('title', 'Categories')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Categories</h4>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bx bx-plus"></i> Add new category
        </button>
        @livewire('admin.categories.categories-create')
        <!-- Basic Bootstrap Table -->
        <div class="card mb-4">
            <div class="card-body">
                @livewire('admin.categories.categories-data')
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        @livewire('admin.categories.categories-update')

        @livewire('admin.categories.categories-delete')
    </div>
    <!-- / Content -->
@endsection
