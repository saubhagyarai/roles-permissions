@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    {{implode(', ', $user->roles()->pluck('name')->toArray())}}
                                </td>
                                <td>
                                    @can('edit-users')
                                    <a href="{{route('admin.users.edit', $user->id)}}">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    @endcan
                                        
                                    @can('delete-users')
                                    <form action="{{route('admin.users.destroy', $user)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning">Delete</button>
                                    </form>
                                    @endcan

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{$user->name}} - {{$user->email}} --}}
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
