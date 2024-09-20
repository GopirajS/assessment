<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="text-decoration-none" href="{{route('admin-dashboard')}}">
                {{ __(' Admin Dashboard') }}
               </a>
        </h2>
    </x-slot>



    <div class="container">
    
        <div class="row">
    
            
            <div class="col-md-12">
              
                <div class="card mt-5">
                
                    <div class="card-header ">
                        <h4>List Store Details </h4>
                    </div>
                    <div class="card-body">
    
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Address</th>
                                    <th>Shop Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stores as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/store/'.$item->profile_image) }}" width="70px" height="70px" alt="Image">
                                    </td>
                                   
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
    
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</x-app-layout>
