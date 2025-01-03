@extends('admin.master')

@section('counters-active', 'active')
@section('title', 'Counters')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">Counters</h4>

        <button type="button" wire:click="openModal" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bx bx-plus"></i> Add New
        </button>

        @livewire('admin.counters.counters-create')

        <div class="card mb-4">
            <div class="card-body">
                @livewire('admin.counters.counters-data')
            </div>
        </div>

        @livewire('admin.counters.counters-update')
        @livewire('admin.counters.counters-delete')
    </div>
    <!-- / Content -->
@endsection
