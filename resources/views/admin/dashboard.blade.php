<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="text-decoration-none" href="{{route('admin-dashboard')}}">
                {{ __(' Admin Dashboard') }}
               </a>
        </h2>
    </x-slot>



    <div class="container">
       <div class="card mt-4">
        <div class="card-body">
          <h5 class="card-title">Dashboard Overview</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
             <a class="text-decoration-none" href="{{route('admin-user-list')}}">
                Total Users Count
            </a>
            <span class="badge bg-primary rounded-pill">{{ \App\Models\User::where('role',0)->count() }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
             <a class="text-decoration-none" href="{{route('admin-store-list')}}">
                Total Store Count
            </a>
            <span class="badge bg-primary rounded-pill">{{ \App\Models\Store::count() }}</span>
            </li>
          </ul>
        </div>
      </div>
      
    </div>

    

</x-app-layout>
