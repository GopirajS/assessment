<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @php
    
    if (isset($store)) {
      $route = route('update',['id'=>$store->id]);
    }else {
        $route = route('store');
    }
    
    @endphp

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 m-4">
    
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
    
                <div class="card">
                    <div class="card-header">
                        <h4>Add Store Details
                        </h4>
                    </div>
                    <div class="card-body">
    
                        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Store Profile Image</label>
                                <input type="file" name="profile_image"  class="form-control">

                                @if (isset($store->profile_image))
                                   <img src="{{ asset('uploads/store/'.$store->profile_image) }}" width="70px" height="70px" alt="Image">
                                @endif
                            </div>
    
                            <div class="form-group mb-3">
                                <label for="">Store Name</label>
                                <input type="text" name="title" class="form-control" value="{{ $store->title ?? "" }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="" cols="5" rows="3">{{ $store->description ?? "" }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Store Address</label>
                                <textarea class="form-control" name="address" id="" cols="5" rows="3">{{ $store->address ?? "" }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Save Store</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-danger float-end">BACK</a>
                            </div>
    
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
