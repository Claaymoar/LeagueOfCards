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
        
        <div class="col-md-6 col-md-offset-3" style="text-align: center;">

        <!--


            Form to get the players username and opponents username




        -->




            <form action="{{ route('signup') }}" method="post">
               
            


                <input type="hidden" name="_token" value="{{Session::token()}}"/>
                <h3 style="margin: 0 auto; margin-top: 10px;">Enter Your LoL Username</h3>
        
                <div class="form-group">
                    <label for="lolaccount">LoL Username</label>
                    <input class="form-control" type="text" name="lolaccount" id="lolaccount" value="{{ Request::old('lolaccount') }}">
                </div>

                <div class="form-group">

                    <label for="lolregion">Account Region</label><br>
                        <select name="lolregion">
                          <option value="br">BR</option>
                          <option value="eune">EUNE</option>
                          <option value="euw">EUW</option>
                          <option value="jp">JP</option>
                          <option value="kr">KR</option>
                          <option value="lan">LAN</option>
                          <option value="las">LAS</option>
                          <option value="na">NA</option>
                          <option value="oce">OCE</option>
                          <option value="tr">TR</option>
                          <option value="ru">RU</option>
                          <option value="pbe">PBE</option>
                        </select>

                </div>

                <div class="form-group">
                    <label for="enemylolaccount">Opponents LoL Username</label>
                    <input class="form-control" type="text" name="enemylolaccount" id="enemylolaccount" value="{{ Request::old('enemylolaccount') }}">
                </div>

                <div class="form-group">

                    <label for="enemylolregion">Opponents Account Region</label><br>
                        <select name="enemylolregion">
                          <option value="br">BR</option>
                          <option value="eune">EUNE</option>
                          <option value="euw">EUW</option>
                          <option value="jp">JP</option>
                          <option value="kr">KR</option>
                          <option value="lan">LAN</option>
                          <option value="las">LAS</option>
                          <option value="na">NA</option>
                          <option value="oce">OCE</option>
                          <option value="tr">TR</option>
                          <option value="ru">RU</option>
                          <option value="pbe">PBE</option>
                        </select>

                </div>



                
                <button type="submit" class="btn btn-primary" style="margin-bottom: 10px;">Submit</button>

            </form>
        </div>
        


    </div>





@endsection