@extends('layouts.master')

@section('content')
@include('includes.message-block')
	<section class="row new-post">
		<div class="col-md-6 col-md-offset-3">
			<header>
				<h3 style="text-align: center; color: black;">Instructions</h3>
				<center><a href="{{ URL::previous() }}">Go Back</a></center>
			</header>



			<div class="list-group" style="text-align: center;">
					<ul style="margin-left: -35px;">
						<li class="list-group-item">Each player gets 8 cards (Each card is a champion from league of legends and their stats are based off of your mastery level on that champion) </li>
						<li class="list-group-item">Your cards have a Damage stat and also a Defence Stat ( Your damage and defence is based off of your mastery level added onto the cards based stats) </li>
						<li class="list-group-item">Click on a card in your deck to make it your active card(You can only have 1 active card)</li>
						<li class="list-group-item">The pc will draw a card </li>
						<li class="list-group-item">Click on the pc’s card to attack it </li>
						<li class="list-group-item">When you attack a card they both attack each other.  </li>
						<li class="list-group-item">If your damage is less then their defence, your attack will remove your damage amount from their defence. </li>
						<li class="list-group-item">If your damage is equal to their defence you will destroy their card. </li>
						<li class="list-group-item">If your damage is greater then their Defence you will destroy their card and the remaining damage is dealt to the enemies nexus </li>
						<li class="list-group-item">Win Conditions</li>
						<li class="list-group-item">The first player’s nexus to get to 0 hp loses. </li>
						<li class="list-group-item">If a player runs out of cards their nexus is left undefended and they lose </li>
					</ul>
			</div>

			<div id="">

				<p style="text-align: center;">Please report any bugs to the developer - Mrclaymoar@gmail.com</p>
				<p style="text-align: center;">League Of Cards isn't endorsed by Riot Games and doesn't reflect the views or opinions of Riot Games or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, Inc. League of Legends © Riot Games, Inc.</p>

			</div>



		</div>
	</section>




@endsection