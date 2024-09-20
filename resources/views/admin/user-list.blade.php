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
                        <h4>List Users Details </h4>
                    </div>
                    <div class="card-body">
    
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
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
