@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                <h4>Create User</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.user.store')}}">
                    @csrf
                    @if($errors->any())
                        <ol class="alert alert-danger mb-4" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>@endforeach
                        </ol>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <label for="username">Full Name</label>
                            <input type="text" name="username"
                                   @if($errors->any()) value="{{old('username')}}" @endif
                                   class="form-control" id="username" required>
                        </div>
                        <div class="col-md-6">
                            <label for="user-email">User Email</label>
                            <input type="text" name="email"
                                   @if($errors->any()) value="{{old('email')}}" @endif
                                   class="form-control" id="user-email" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="userPassword">Password</label>
                            <input name="userPassword" type="password" class="form-control" required
                                   @if($errors->any())value="{{old('userPassword')}}" @endif id="userPassword"/>
                        </div>
                        <div class="col-md-6">
                            <label for="userRole">User Role</label>
                            <select name="userRole" class="form-control" id="userRole" required>
                                <option value="admin" @if(old('userRole') == 'admin')selected="true"@endif>Admin</option>
                                <option value="user" @if(old('userRole') == 'user')selected="true"@endif>User</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
