<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-6 offset-3">
            <div class="main-card card">
                <div class="card-body">
                    <h5 class="card-title">{{ __('Roles') }}</h5>
                    <button class="btn btn-danger ml-auto">Delete</button>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->description }}</td>
                                <td>
                                    <button></button>
                                    <button></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
