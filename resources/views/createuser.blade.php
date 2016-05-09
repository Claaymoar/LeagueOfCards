@extends('layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')

    @if(count($errors) > 0)
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li style="color:red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif


    <div class="row">
        <div class="col-md-6 col-md-offset-3" >
            <form action="{{ route('newuser') }}" method="post">
               
           


                <input type="hidden" name="_token" value="{{Session::token()}}"/>
                <h3>Create New User Account</h3>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Users Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>

                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label for="first_name">Users First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}">
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Users Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="form-group">
                     <label for="usertype">Account Type</label>
                    <select name="usertype">
                              <option value="user">User</option>
                              <option value="subadmin">Sub Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    <br>

    
      

    </div>





@endsection