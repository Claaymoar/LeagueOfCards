@extends('layouts.master2')

@section('content')
@include('includes.message-block')
	<head>
	<link rel="stylesheet" href="{{ URL::to('src/css/playgame.css') }}">
	</head>
	<section class="row new-post">

		<div class="col-md-10 col-md-offset-1">
			<header>
				<h3 style="text-align: center;">League Of Cards</h3>
				<div id="playAgain"style="height: 50px;">
			
				</div>
			</header>

			<ul>
			
			</ul>

			<!-- 

			This is the PC's deck of cards,
			It just displayes the back of the cards

			-->

			<div id="pcDeck" style="display: inline-block; width:870;">
			<div id="centerPC" style="margin-left: 50px;">
			<p>Enemy Nexus Health: <span id="enemyHP">15</span></p>
			<p>Enemy Cards:</p>

				<div id="cardBack0" style="display: inline-block; width:211px; height:315px;">
				<img id="pcCard1" style="margin-left:10px;" src="img/backplaceholder.png" height="280" width="180">  
				</div>
				<div id="cardBack1" style="display: inline-block; width:211px; height:315px;">
				<img id="pcCard2" style="margin-left:10px;" src="img/backplaceholder.png" height="280" width="180">
				</div>
				<div id="cardBack2" style="display: inline-block; width:211px; height:315px;">
				<img id="pcCard3" style="margin-left:10px;" src="img/backplaceholder.png" height="280" width="180">
				</div>
				<div id="cardBack3" style="display: inline-block; width:211px; height:315px;">
				<img id="pcCard4" style="margin-left:10px;" src="img/backplaceholder.png" height="280" width="180">
				</div>
				<div id="cardBack4" style="display: inline-block; width:211px; height:315px;">
				<img id="pcCard5" style="margin-left:10px;" src="img/backplaceholder.png" height="280" width="180">  
				</div>
				<div id="cardBack5" style="display: inline-block; width:211px; height:315px;">
				<img id="pcCard6" style="margin-left:10px;" src="img/backplaceholder.png" height="280" width="180">
				</div>
				<div id="cardBack6" style="display: inline-block; width:211px; height:315px;">
				<img id="pcCard7" style="margin-left:10px;" src="img/backplaceholder.png" height="280" width="180">
				</div>
				<div id="cardBack7" style="display: inline-block; width:211px; height:315px;">
				<img id="pcCard8" style="margin-left:10px;" src="img/backplaceholder.png" height="280" width="180">
				</div>
				<hr style="width: 840px; float: left;">
			</div>
			</div>
			
			<!--


				The code below is calling the /app/helpers.php to 
				get the required info for the cards. It gets the 
				champ name, id, dmg, def, mastery lvl for the PC 
				and User





			-->
			{{-- */$Cards = Helper::shuffleCards();/* --}}   
			{{-- */$Champ0 = (string)$Cards[0][0];/* --}} 
			{{-- */$Champ1 = (string)$Cards[1][0];/* --}} 
			{{-- */$Champ2 = (string)$Cards[2][0];/* --}} 
			{{-- */$Champ3 = (string)$Cards[3][0];/* --}} 
			{{-- */$Champ4 = (string)$Cards[4][0];/* --}} 
			{{-- */$Champ5 = (string)$Cards[5][0];/* --}} 
			{{-- */$Champ6 = (string)$Cards[6][0];/* --}} 
			{{-- */$Champ7 = (string)$Cards[7][0];/* --}} 
			{{-- */$Champ8 = (string)$Cards[8][0];/* --}} 
			{{-- */$Champ0ID = (string)$Cards[0][1];/* --}} 
			{{-- */$Champ1ID = (string)$Cards[1][1];/* --}} 
			{{-- */$Champ2ID = (string)$Cards[2][1];/* --}} 
			{{-- */$Champ3ID = (string)$Cards[3][1];/* --}} 
			{{-- */$Champ4ID = (string)$Cards[4][1];/* --}} 
			{{-- */$Champ5ID = (string)$Cards[5][1];/* --}} 
			{{-- */$Champ6ID = (string)$Cards[6][1];/* --}} 
			{{-- */$Champ7ID = (string)$Cards[7][1];/* --}} 
			{{-- */$Champ8ID = (string)$Cards[8][1];/* --}} 
			{{-- */$Champ0AD = (string)$Cards[0][2];/* --}} 
			{{-- */$Champ1AD = (string)$Cards[1][2];/* --}} 
			{{-- */$Champ2AD = (string)$Cards[2][2];/* --}} 
			{{-- */$Champ3AD = (string)$Cards[3][2];/* --}} 
			{{-- */$Champ4AD = (string)$Cards[4][2];/* --}} 
			{{-- */$Champ5AD = (string)$Cards[5][2];/* --}} 
			{{-- */$Champ6AD = (string)$Cards[6][2];/* --}} 
			{{-- */$Champ7AD = (string)$Cards[7][2];/* --}}  
			{{-- */$Champ0DEF = (string)$Cards[0][3];/* --}} 
			{{-- */$Champ1DEF = (string)$Cards[1][3];/* --}} 
			{{-- */$Champ2DEF = (string)$Cards[2][3];/* --}} 
			{{-- */$Champ3DEF = (string)$Cards[3][3];/* --}} 
			{{-- */$Champ4DEF = (string)$Cards[4][3];/* --}} 
			{{-- */$Champ5DEF = (string)$Cards[5][3];/* --}} 
			{{-- */$Champ6DEF = (string)$Cards[6][3];/* --}} 
			{{-- */$Champ7DEF = (string)$Cards[7][3];/* --}} 
			{{-- */$Mastery0 = Helper::getMastery($Champ0ID);/* --}} 
			{{-- */$Mastery1 = Helper::getMastery($Champ1ID);/* --}} 
			{{-- */$Mastery2 = Helper::getMastery($Champ2ID);/* --}} 
			{{-- */$Mastery3 = Helper::getMastery($Champ3ID);/* --}} 
			{{-- */$Mastery4 = Helper::getMastery($Champ4ID);/* --}} 
			{{-- */$Mastery5 = Helper::getMastery($Champ5ID);/* --}} 
			{{-- */$Mastery6 = Helper::getMastery($Champ6ID);/* --}} 
			{{-- */$Mastery7 = Helper::getMastery($Champ7ID);/* --}} 
			{{-- */$Champ0AD = Helper::calcAD($Champ0AD, $Mastery0);/* --}} 
			{{-- */$Champ1AD = Helper::calcAD($Champ1AD, $Mastery1);/* --}} 
			{{-- */$Champ2AD = Helper::calcAD($Champ2AD, $Mastery2);/* --}} 
			{{-- */$Champ3AD = Helper::calcAD($Champ3AD, $Mastery3);/* --}} 
			{{-- */$Champ4AD = Helper::calcAD($Champ4AD, $Mastery4);/* --}} 
			{{-- */$Champ5AD = Helper::calcAD($Champ5AD, $Mastery5);/* --}} 
			{{-- */$Champ6AD = Helper::calcAD($Champ6AD, $Mastery6);/* --}} 
			{{-- */$Champ7AD = Helper::calcAD($Champ7AD, $Mastery7);/* --}} 
			{{-- */$Champ0DEF = Helper::calcDef($Champ0DEF, $Mastery0);/* --}} 
			{{-- */$Champ1DEF = Helper::calcDef($Champ1DEF, $Mastery1);/* --}}
			{{-- */$Champ2DEF = Helper::calcDef($Champ2DEF, $Mastery2);/* --}}
			{{-- */$Champ3DEF = Helper::calcDef($Champ3DEF, $Mastery3);/* --}}
			{{-- */$Champ4DEF = Helper::calcDef($Champ4DEF, $Mastery4);/* --}}
			{{-- */$Champ5DEF = Helper::calcDef($Champ5DEF, $Mastery5);/* --}}
			{{-- */$Champ6DEF = Helper::calcDef($Champ6DEF, $Mastery6);/* --}}
			{{-- */$Champ7DEF = Helper::calcDef($Champ7DEF, $Mastery7);/* --}}
			{{-- */$PcCards = Helper::pcCards();/* --}}   
			{{-- */$PcChamp0 = (string)$PcCards[0][0];/* --}} 
			{{-- */$PcChamp1 = (string)$PcCards[1][0];/* --}} 
			{{-- */$PcChamp2 = (string)$PcCards[2][0];/* --}} 
			{{-- */$PcChamp3 = (string)$PcCards[3][0];/* --}} 
			{{-- */$PcChamp4 = (string)$PcCards[4][0];/* --}} 
			{{-- */$PcChamp5 = (string)$PcCards[5][0];/* --}} 
			{{-- */$PcChamp6 = (string)$PcCards[6][0];/* --}} 
			{{-- */$PcChamp7 = (string)$PcCards[7][0];/* --}} 
			{{-- */$PcChamp0ID = (string)$PcCards[0][1];/* --}} 
			{{-- */$PcChamp1ID = (string)$PcCards[1][1];/* --}} 
			{{-- */$PcChamp2ID = (string)$PcCards[2][1];/* --}} 
			{{-- */$PcChamp3ID = (string)$PcCards[3][1];/* --}} 
			{{-- */$PcChamp4ID = (string)$PcCards[4][1];/* --}} 
			{{-- */$PcChamp5ID = (string)$PcCards[5][1];/* --}} 
			{{-- */$PcChamp6ID = (string)$PcCards[6][1];/* --}} 
			{{-- */$PcChamp7ID = (string)$PcCards[7][1];/* --}} 
			{{-- */$PcMastery0 = Helper::getPcMastery($PcChamp0ID);/* --}}
			{{-- */$PcMastery1 = Helper::getPcMastery($PcChamp1ID);/* --}}
			{{-- */$PcMastery2 = Helper::getPcMastery($PcChamp2ID);/* --}}
			{{-- */$PcMastery3= Helper::getPcMastery($PcChamp3ID);/* --}}
			{{-- */$PcMastery4= Helper::getPcMastery($PcChamp4ID);/* --}}
			{{-- */$PcMastery5= Helper::getPcMastery($PcChamp5ID);/* --}}
			{{-- */$PcMastery6= Helper::getPcMastery($PcChamp6ID);/* --}}
			{{-- */$PcMastery7= Helper::getPcMastery($PcChamp7ID);/* --}}
			{{-- */$PcChamp0AD = (string)$PcCards[0][2];/* --}} 
			{{-- */$PcChamp1AD = (string)$PcCards[1][2];/* --}} 
			{{-- */$PcChamp2AD = (string)$PcCards[2][2];/* --}} 
			{{-- */$PcChamp3AD = (string)$PcCards[3][2];/* --}} 
			{{-- */$PcChamp4AD = (string)$PcCards[4][2];/* --}} 
			{{-- */$PcChamp5AD = (string)$PcCards[5][2];/* --}} 
			{{-- */$PcChamp6AD = (string)$PcCards[6][2];/* --}} 
			{{-- */$PcChamp7AD = (string)$PcCards[7][2];/* --}} 
			{{-- */$PcChamp0DEF = (string)$PcCards[0][3];/* --}} 
			{{-- */$PcChamp1DEF = (string)$PcCards[1][3];/* --}} 
			{{-- */$PcChamp2DEF = (string)$PcCards[2][3];/* --}} 
			{{-- */$PcChamp3DEF = (string)$PcCards[3][3];/* --}} 
			{{-- */$PcChamp4DEF = (string)$PcCards[4][3];/* --}} 
			{{-- */$PcChamp5DEF = (string)$PcCards[5][3];/* --}} 
			{{-- */$PcChamp6DEF = (string)$PcCards[6][3];/* --}} 
			{{-- */$PcChamp7DEF = (string)$PcCards[7][3];/* --}} 
			{{-- */$PcChamp0AD = Helper::calcAD($PcChamp0AD, $PcMastery0);/* --}} 
			{{-- */$PcChamp1AD = Helper::calcAD($PcChamp1AD, $PcMastery1);/* --}} 
			{{-- */$PcChamp2AD = Helper::calcAD($PcChamp2AD, $PcMastery2);/* --}} 
			{{-- */$PcChamp3AD = Helper::calcAD($PcChamp3AD, $PcMastery3);/* --}} 
			{{-- */$PcChamp4AD = Helper::calcAD($PcChamp4AD, $PcMastery4);/* --}} 
			{{-- */$PcChamp5AD = Helper::calcAD($PcChamp5AD, $PcMastery5);/* --}} 
			{{-- */$PcChamp6AD = Helper::calcAD($PcChamp6AD, $PcMastery6);/* --}} 
			{{-- */$PcChamp7AD = Helper::calcAD($PcChamp7AD, $PcMastery7);/* --}} 
			{{-- */$PcChamp0DEF = Helper::calcDef($PcChamp0DEF, $PcMastery0);/* --}} 
			{{-- */$PcChamp1DEF = Helper::calcDef($PcChamp1DEF, $PcMastery1);/* --}}
			{{-- */$PcChamp2DEF = Helper::calcDef($PcChamp2DEF, $PcMastery2);/* --}}
			{{-- */$PcChamp3DEF = Helper::calcDef($PcChamp3DEF, $PcMastery3);/* --}}
			{{-- */$PcChamp4DEF = Helper::calcDef($PcChamp4DEF, $PcMastery4);/* --}}
			{{-- */$PcChamp5DEF = Helper::calcDef($PcChamp5DEF, $PcMastery5);/* --}}
			{{-- */$PcChamp6DEF = Helper::calcDef($PcChamp6DEF, $PcMastery6);/* --}}
			{{-- */$PcChamp7DEF = Helper::calcDef($PcChamp7DEF, $PcMastery7);/* --}}


			<!-- 

			This is all of the Pc's cards, It calls an on click fucntion when
			the player clicks on a card to attack it. 

			The card div also stores the card image url, level, name, damage and defence

			There is a div for each card


			-->

			<div id="enemybattlefield" style="margin-left: 350px; height:315px; width:300px;">
			
				<div id="placedPcCard0" onclick="AttackCard0()" class="a" style="width:211; height:315; margin-left:10px; display: none;">
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$PcChamp0}}_0.jpg" height="237" width="166">
					<div class="cardText">

						<br><span id="pcChamp0">{{$PcChamp0}}</span>
						<br>Lvl:<span id="pcLvl0">{{$PcMastery0}}</span>
						<br>DMG:<span id="pcAD">{{$PcChamp0AD}}</span>
						DEF:<span id="pcDEF">{{$PcChamp0DEF}}</span>

					</div>
				</div>

				<div id="placedPcCard1" onclick="AttackCard0()" class="a" style="width:211; height:315; margin-left:10px; display: none;">
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$PcChamp1}}_0.jpg" height="237" width="166">
					<div class="cardText">
						<br><span id="pcChamp1">{{$PcChamp1}}</span>
						<br>Lvl:<span id="pcLvl1">{{$PcMastery1}}</span>
						<br>DMG:<span id="pcAD1"><span id="pcAD">{{$PcChamp1AD}}</span></span>
						DEF:<span id="pcDEF1"><span id="pcDEF">{{$PcChamp1DEF}}</span></span>
					</div>
				</div>

				<div id="placedPcCard2" onclick="AttackCard0()" class="a" style="width:211; height:315; margin-left:10px; display: none;">
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$PcChamp2}}_0.jpg" height="237" width="166">
					<div class="cardText">
						<br><span id="pcChamp2">{{$PcChamp2}}</span>
						<br>Lvl:<span id="pcLvl2">{{$PcMastery2}}</span>
						<br>DMG:<span id="pcAD2"><span id="pcAD">{{$PcChamp2AD}}</span></span>
						DEF:<span id="pcDEF2"><span id="pcDEF">{{$PcChamp2DEF}}</span></span>
					</div>
				</div>

				<div id="placedPcCard3" onclick="AttackCard0()" class="a" style="width:211; height:315; margin-left:10px; display: none;">
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$PcChamp3}}_0.jpg" height="237" width="166">
					<div class="cardText">
						<br><span id="pcChamp3">{{$PcChamp3}}</span>
						<br>Lvl:<span id="pcLvl3">{{$PcMastery3}}</span>
						<br>DMG:<span id="pcAD3"><span id="pcAD">{{$PcChamp3AD}}</span></span>
						DEF:<span id="pcDEF3"><span id="pcDEF">{{$PcChamp3DEF}}</span></span>
					</div>
				</div>

				<div id="placedPcCard4" onclick="AttackCard0()" class="a" style="width:211; height:315; margin-left:10px; display: none;">
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$PcChamp4}}_0.jpg" height="237" width="166">
					<div class="cardText">
						<br><span id="pcChamp3">{{$PcChamp4}}</span>
						<br>Lvl:<span id="pcLvl3">{{$PcMastery4}}</span>
						<br>DMG:<span id="pcAD3"><span id="pcAD">{{$PcChamp4AD}}</span></span>
						DEF:<span id="pcDEF3"><span id="pcDEF">{{$PcChamp4DEF}}</span></span>
					</div>
				</div>

				<div id="placedPcCard5" onclick="AttackCard0()" class="a" style="width:211; height:315; margin-left:10px; display: none;">
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$PcChamp5}}_0.jpg" height="237" width="166">
					<div class="cardText">
						<br><span id="pcChamp3">{{$PcChamp5}}</span>
						<br>Lvl:<span id="pcLvl3">{{$PcMastery5}}</span>
						<br>DMG:<span id="pcAD3"><span id="pcAD">{{$PcChamp5AD}}</span></span>
						DEF:<span id="pcDEF3"><span id="pcDEF">{{$PcChamp5DEF}}</span></span>
					</div>
				</div>

				<div id="placedPcCard6" onclick="AttackCard0()" class="a" style="width:211; height:315; margin-left:10px; display: none;">
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$PcChamp6}}_0.jpg" height="237" width="166">
					<div class="cardText">
						<br><span id="pcChamp3">{{$PcChamp6}}</span>
						<br>Lvl:<span id="pcLvl3">{{$PcMastery6}}</span>
						<br>DMG:<span id="pcAD3"><span id="pcAD">{{$PcChamp6AD}}</span></span>
						DEF:<span id="pcDEF3"><span id="pcDEF">{{$PcChamp6DEF}}</span></span>
					</div>
				</div>

				<div id="placedPcCard7" onclick="AttackCard0()" class="a" style="width:211; height:315; margin-left:10px; display: none;">
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$PcChamp7}}_0.jpg" height="237" width="166">
					<div class="cardText">
						<br><span id="pcChamp3">{{$PcChamp7}}</span>
						<br>Lvl:<span id="pcLvl3">{{$PcMastery7}}</span>
						<br>DMG:<span id="pcAD3"><span id="pcAD">{{$PcChamp7AD}}</span></span>
						DEF:<span id="pcDEF3"><span id="pcDEF">{{$PcChamp7DEF}}</span></span>
					</div>
				</div>
			

			</div>
			<div id="Attack"style="height: 50px;">
			
			</div>

			<!--
	
				The player battlefiled is where the players cards gets placed on click

			-->

			<div id="playerbattlefield" style=" margin-left: 350px; height:315px; width:900px;">

			</div>

			<!--
	
				This is the players deck, it stores all of the player cards and an 
				onclick function to place the card.

				The card div also stores the card image url, level, name, damage and defence

				There is a div for each card

			-->


			<div class="playercards" id="playerDeck" style=" display: inline-block; width:1000px;">

			<div id="centerPlayer" style="margin-left: 30px">
			<hr style="width: 880px; float: left;"><br><br><br>
				<p>Your Nexus Health: <span id="playerHP">15</span><br>Your Cards:</p>
				

				<!-- On Click Place The Card On The Field (Using Routes)-->
				
				<div id="card0" onclick="playCard({{$Champ0ID}},{{$Mastery0}},{{$Champ0AD}},{{$Champ0DEF}},'0')" class="{{$Champ0ID}}" style="width:211px; height:315px; display: inline-block; margin-left:10px;">
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$Champ0}}_0.jpg" height="237" width="166">
					<div class="cardText">
						<br>{{$Champ0}}
						<br>Lvl:{{$Mastery0}}
						<br>DMG:<span id="userAD">{{$Champ0AD}}</span>
						DEF:<span id="userDEF">{{$Champ0DEF}}</span>
					</div>
				</div>
				
				
				<div id="card1" onclick="playCard({{$Champ1ID}},{{$Mastery1}},{{$Champ1AD}},{{$Champ1DEF}},'1')" class="{{$Champ1ID}}" style="width:211px; height:315px; display: inline-block; margin-left:10px;">
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$Champ1}}_0.jpg" height="237" width="166">
					<div class="cardText">
						<br>{{$Champ1}} 
						<br>Lvl:{{$Mastery1}}
						<br>DMG:<span id="userAD1"><span id="userAD">{{$Champ1AD}}</span></span>
						DEF:<span id="userDEF1"><span id="userDEF">{{$Champ1DEF}}</span></span>
					</div>
				</div>
				
				
				<div id="card2" onclick="playCard({{$Champ2ID}},{{$Mastery2}},{{$Champ2AD}},{{$Champ2DEF}},'2')" class="{{$Champ2ID}}" style="width:211px; height:315px; display: inline-block; margin-left:10px;">
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$Champ2}}_0.jpg" height="237" width="166">
					<div class="cardText">
						<br>{{$Champ2}} 
						<br>Lvl:{{$Mastery2}}
						<br>DMG:<span id="userAD2"><span id="userAD">{{$Champ2AD}}</span></span>
						DEF:<span id="userDEF2"><span id="userDEF">{{$Champ2DEF}}</span></span>
					</div>
				</div>
				
				
				<div id="card3" onclick="playCard({{$Champ3ID}},{{$Mastery3}},{{$Champ3AD}},{{$Champ3DEF}},'3')" class="{{$Champ3ID}}" style="width:211px; height:315px; display: inline-block; margin-left:10px;">
								
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$Champ3}}_0.jpg" height="237" width="166">
								
					<div class="cardText">
						<br>{{$Champ3}}
						<br>Lvl:{{$Mastery3}}
						<br>DMG:<span id="userAD">{{$Champ3AD}}</span></span>
						DEF:<span id="userDEF">{{$Champ3DEF}}</span></span>
					</div>
				</div>


				<div id="card4" onclick="playCard({{$Champ4ID}},{{$Mastery4}},{{$Champ4AD}},{{$Champ4DEF}},'4')" class="{{$Champ4ID}}" style="width:211px; height:315px; display: inline-block; margin-left:10px;">
								
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$Champ4}}_0.jpg" height="237" width="166">
								
					<div class="cardText">
						<br>{{$Champ4}}
						<br>Lvl:{{$Mastery4}}
						<br>DMG:<span id="userAD">{{$Champ4AD}}</span></span>
						DEF:<span id="userDEF">{{$Champ4DEF}}</span></span>
					</div>
				</div>


				<div id="card5" onclick="playCard({{$Champ5ID}},{{$Mastery5}},{{$Champ5AD}},{{$Champ5DEF}},'5')" class="{{$Champ5ID}}" style="width:211px; height:315px; display: inline-block; margin-left:10px;">
								
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$Champ5}}_0.jpg" height="237" width="166">
								
					<div class="cardText">
						<br>{{$Champ5}}
						<br>Lvl:{{$Mastery5}}
						<br>DMG:<span id="userAD">{{$Champ5AD}}</span></span>
						DEF:<span id="userDEF">{{$Champ5DEF}}</span></span>
					</div>
				</div>


				<div id="card6" onclick="playCard({{$Champ6ID}},{{$Mastery6}},{{$Champ6AD}},{{$Champ6DEF}},'6')" class="{{$Champ6ID}}" style="width:211px; height:315px; display: inline-block; margin-left:10px;">
								
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$Champ6}}_0.jpg" height="237" width="166">
								
					<div class="cardText">
						<br>{{$Champ6}}
						<br>Lvl:{{$Mastery6}}
						<br>DMG:<span id="userAD">{{$Champ6AD}}</span></span>
						DEF:<span id="userDEF">{{$Champ6DEF}}</span></span>
					</div>
				</div>


				<div id="card7" onclick="playCard({{$Champ7ID}},{{$Mastery7}},{{$Champ7AD}},{{$Champ7DEF}},'7')" class="{{$Champ7ID}}" style="width:211px; height:315px; display: inline-block; margin-left:10px;">
								
					<img class="cardoverlay" src="img/emptycard.png" height="315" width="211">
					<img class="cardimg" src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{{$Champ7}}_0.jpg" height="237" width="166">
								
					<div class="cardText">
						<br>{{$Champ7}}
						<br>Lvl:{{$Mastery7}}
						<br>DMG:<span id="userAD">{{$Champ7AD}}</span></span>
						DEF:<span id="userDEF">{{$Champ7DEF}}</span></span>
					</div>
				</div>


				
			</div>
			</div>

			<!--

				This is the gamelog, info about the current game gets appended to this 
				div during the game


			-->

			<h1 style="text-align: center;"> Game Log </h1>
			<div id="gameLog" class="row" style="list-style: none; text-align: center;">



			</div>

		</div>
	</section>



@endsection