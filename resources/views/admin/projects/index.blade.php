@extends('admin.master')

@section('title', 'Projects')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">Projects</h4>

        <button type="button" wire:click="openModal" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bx bx-plus"></i> Add New
        </button>

        @livewire('admin.projects.projects-create')

        <div class="card mb-4">
            <div class="card-body">
                @livewire('admin.projects.projects-data')
            </div>
        </div>

        {{-- @livewire('admin.projects.projects-show')--}}
         @livewire('admin.projects.projects-update')
        @livewire('admin.projects.projects-delete')
    </div>
    <!-- / Content -->
@endsection
