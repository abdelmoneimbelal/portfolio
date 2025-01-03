@extends('admin.master')

@section('counters-active', 'active')
@section('title', 'Services')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">Services</h4>

        <button type="button" wire:click="openModal" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bx bx-plus"></i> Add New
        </button>

        @livewire('admin.services.services-create')

        <div class="card mb-4">
            <div class="card-body">
                @livewire('admin.services.services-data')
            </div>
        </div>

        @livewire('admin.services.services-show')
        @livewire('admin.services.services-update')
        @livewire('admin.services.services-delete')
    </div>
    <!-- / Content -->
@endsection
