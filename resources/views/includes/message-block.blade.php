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
    @if(Session::has('message'))
     <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <p style="color:green;">{{ Session::get('message') }} </p>
            </div>
        </div>
    @endif