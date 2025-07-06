@extends('admin.master')

@section('title', 'About Us')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">About Us /</span> Update
        </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Update About Us</h5>
                    <div class="card-body">
                        @livewire('admin.about-us.update-about-us')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 