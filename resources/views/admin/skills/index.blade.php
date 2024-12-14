@extends('admin.master')

@section('title', 'Skills')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Skills</h4>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bx bx-plus"></i> Add new skill
        </button>
        @livewire('admin.skills.skills-create')
        <!-- Basic Bootstrap Table -->
        <div class="card mb-4">
            <div class="card-body">
                @livewire('admin.skills.skills-data')
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
    <!-- / Content -->
@endsection
