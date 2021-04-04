@push('title')
    Messages
@endpush
@extends('layouts.backend.app')
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Messages</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Messages</li>
                </ol>
                <a href="{{ route('backend.websiteMessage.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i
                    class="fa fa-plus-circle"></i> Back to list</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row justify-content-center">
            <!-- Start col -->
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <small class="text-muted">Name :</small>
                        <h6> {{ $websiteMessage->name }}</h6>
                        <small class="text-muted p-t-30 db">Phone :</small>
                        <h6>{{ $websiteMessage->phone }}</h6>
                        <small class="text-muted p-t-30 db">Email :</small>
                        <h6>{{ $websiteMessage->email }}</h6>
                        <small class="text-muted p-t-30 db">Status :</small>
                        @if($websiteMessage->is_process_complete == true)
                            <h6><span class="badge badge-success">Completed</span></h6>
                        @else
                            <h6><span class="badge badge-warning">Incomplete</span></h6>
                        @endif
                        <small class="text-muted p-t-30 db">Subject :</small>
                        <h6>{{ $websiteMessage->subject }}</h6>
                        <small class="text-muted p-t-30 db">Message :</small>
                        <h6>{{ $websiteMessage->message }}</h6>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush
@push('summer-note')

@endpush
