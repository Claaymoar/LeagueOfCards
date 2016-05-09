@extends('layouts.master')

@section('content')
@include('includes.message-block')

		<div class="col-md-6 col-md-offset-3">
			<header>
				<h2 style="text-align: center; color: black;">Home</h3>
			</header>



			<div class="list-group" style="text-align: center;">
				<ul style="margin-left: -35px;">

					<li class="list-group-item"><a href="{{ route('playgame') }}">Play Game</a></li>
					<li class="list-group-item"><a href="{{ route('info') }}">Instructions</a></li>

				</ul>
			</div>




		</div>





@endsection