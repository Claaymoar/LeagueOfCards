var ChampID = 0;
var CurPcCard = 0;

var DeadPlayerCards = 0;
var DeadPcCards = 0;





function playCard(ChampID, Mastery, AD, DEF, CardNumber) {

	/*

		This function is called when the player clicks on a card in their deck	

	*/

	//If there is no active card, a card will be placed
	if ( $( ".activeCard" ).find('#userAD').html() == undefined || $( ".activeCard" ).find('#userAD').html() == '' || $( ".activeCard" ).find('#userAD').html() == 'undefined'){

		console.log(ChampID, Mastery);

		$("#card" + CardNumber).fadeOut("slow");
		
		
	
		 setTimeout(function(){
		 	$("#card" + CardNumber).appendTo("#playerbattlefield");
        	$("#card" + CardNumber).fadeIn("slow");
    	}, 600);

		$('#card' + CardNumber).attr('class', 'activeCard');

	}
	//calls draw pc card
	drawPcCard(CardNumber, AD, DEF);

	


}


function drawPcCard(cardNum, AD, DEF){

	/*
	
		This function is called when the pc doesnt have a card and the player 
		does & also called after the player draws a card

	*/



	//If the pc does not have an active card, it will draw a card
	if ( $( ".activePcCard" ).find(".cardText").html() == undefined || $( ".activePcCard" ).find(".cardText").html() == '' || $( ".activePcCard" ).find(".cardText").html() == 'undefined'){


		//$('#placedPcCard'+CurPcCard).show(800);
		//document.getElementById('placedPcCard'+CurPcCard).style.display = 'inline-block';


		//$('#cardBack'+CurPcCard).animate({'opacity':'0'}, 'slow');
		$('#cardBack'+CurPcCard).fadeOut("slow");
		$('#placedPcCard'+CurPcCard).fadeIn("slow");
			
		setTimeout(function(){

			$('#placedPcCard'+CurPcCard).attr('class', 'activePcCard');
			CurPcCard = CurPcCard + 1;

		}, 600);


		//$('#placedPcCard'+CurPcCard).animate({'opacity':'0'}, 'slow');
		//$('#placedPcCard'+CurPcCard).css('display':'inline-block');
		
		//$('#placedPcCard'+CurPcCard).animate({'opacity':'0'}, 'slow');
		// setTimeout(function(){
		// 	$('#placedPcCard'+CurPcCard).css('display':'inline-block');
        //	$('#placedPcCard'+CurPcCard).animate({'opacity':'1'}, 'slow');
    	//}, 600);

		//document.getElementById('cardBack'+CurPcCard).style.display = 'none';

		//$('#placedPcCard'+CurPcCard).attr('class', 'activePcCard');
		//CurPcCard = CurPcCard + 1;

	}

}

//Starting HP
var PlayerHP = 15;
var PcHP = 15;


function animateCards() {


	$(".activeCard").animate({ "margin-top": "-=50px" }, 50);
	$(".activePcCard").animate({ "margin-top": "+=50px" }, 50).delay(50);
 	$(".activeCard").animate({ "margin-top": "+=50px" }, 50);
 	$(".activePcCard").animate({ "margin-top": "-=50px" }, 50);

}

function AttackCard0() {

	/*

		This function is called when the player clicks on an active PC card
		it calculates all of the damage done

	*/

	//if there is no active card, do nothing
	if($('.activeCard').find('#userAD').text() == null || $('.activeCard').find('#userAD').text() == undefined || $('.activeCard').find('#userAD').text() == ""){
		//else
	} else {
		animateCards();
		//gets the AD and DEF of the aactive player card and PC card
		var UserAD = $('.activeCard').find('#userAD').text();
		var UserDEF = $('.activeCard').find('#userDEF').text();

		var PcAD = $('.activePcCard').find("#pcAD").html();
		var PcDEF = $('.activePcCard').find("#pcDEF").html();

		console.log('PC AD: ' + PcAD);
		console.log('PC DEF: ' + PcDEF)
		console.log('Player AD: ' + UserAD);
		console.log('Player DEF: ' + UserDEF);

		//damage calculations
		// pc defence is equal to pc def minus player AD
		PcDEF = PcDEF - UserAD;
		// user defence is equal to user def minus player pc
		UserDEF = UserDEF - PcAD;
		
		setTimeout(function(){
			//Pc Card Killed And remaining DMG is dealt to nexus
			if(PcDEF < 0){
				//alert('PC Card Killed, Remaining DMG is Dealt to Nexus');
				$('#gameLog').append('<li>PC Card Killed, Remaining DMG is Dealt to Nexus</li>');
				PcHP = PcHP + PcDEF;
				//alert('Enemy HP' + PcHP);
				$('#enemyHP').text(PcHP);  
				var PCdiv = $('.activePcCard').attr('id');
				document.getElementById(PCdiv).style.display = 'none';
				$('.activePcCard').attr('class', 'dead');
				DeadPcCards = DeadPcCards + 1;
			} 
			if(UserDEF < 0){
				//User Card Is Killed And remaining DMG is dealt to nexus

				//alert('User Card Killed, Remaining DMG is Dealt to Nexus');
				$('#gameLog').append('<li>User Card Killed, Remaining DMG is Dealt to Nexus</li>');
				PlayerHP = PlayerHP + UserDEF;
				//alert('User HP: ' + PlayerHP);
				$('#playerHP').text(PlayerHP); 
				var div = $('.activeCard').attr('id');
				document.getElementById(div).style.display = 'none';
				$('.activeCard').attr('class', 'dead');
				DeadPlayerCards = DeadPlayerCards + 1;
			}

			//Pc Card Killed
			if(PcDEF == 0){
				//alert('Pc Card Killed');
				$('#gameLog').append('<li>Pc Card Killed</li>');
				var PCdiv = $('.activePcCard').attr('id');
				document.getElementById(PCdiv).style.display = 'none';
				$('.activePcCard').attr('class', 'dead');
				DeadPcCards = DeadPcCards + 1;
			}
			if(UserDEF == 0){

				//Player Card Killed
			//	alert('User Card Killed');
				$('#gameLog').append('<li>User Card Killed</li>');
				//document.getElementById('card0').style.display = 'none';
				var div = $('.activeCard').attr('id');
				document.getElementById(div).style.display = 'none';
				$('.activeCard').attr('class', 'dead');
				DeadPlayerCards = DeadPlayerCards + 1;
			}

			$('.activePcCard').find('#pcDEF').text(PcDEF);
			$('.activeCard').find('#userDEF').text(UserDEF);

			checkIfWin();
			checkIfPcHasCard();

		}, 600);
		}
}

function checkIfWin() {

	if(PcHP == 0) {
		
		$('<center><input type="button" class="btn btn-primary mybtn" value="Play Again" onClick="window.location.reload()"></center>').appendTo("#playAgain");
		document.getElementById('enemybattlefield').style.display = 'none';
		document.getElementById('playerbattlefield').style.display = 'none';
		document.getElementById('pcDeck').style.display = 'none';
		document.getElementById('playercards').style.display = 'none';

		$('#gameLog').append('<li>Player Wins!</li>');
		alert('You Win!');
	}
	if(PcHP < 0) {
		
		$('<center><input type="button" class="btn btn-primary mybtn" value="Play Again" onClick="window.location.reload()"></center>').appendTo("#playAgain");
		document.getElementById('enemybattlefield').style.display = 'none';
		document.getElementById('playerbattlefield').style.display = 'none';
		document.getElementById('pcDeck').style.display = 'none';
		document.getElementById('playerDeck').style.display = 'none';

		$('#gameLog').append('<li>Player Wins!</li>');
		alert('You Win!');
	}
	if(PlayerHP < 0) {
		
		$('<center><input type="button" class="btn btn-primary mybtn" value="Play Again" onClick="window.location.reload()"></center>').appendTo("#playAgain");
		document.getElementById('enemybattlefield').style.display = 'none';
		document.getElementById('playerbattlefield').style.display = 'none';
		document.getElementById('pcDeck').style.display = 'none';
		document.getElementById('playerDeck').style.display = 'none';

		$('#gameLog').append('<li>Pc Wins!</li>');
		alert('You Lose!');

	}
	if(PlayerHP == 0){
		
		$('<center><input type="button"  class="btn btn-primary mybtn" value="Play Again" onClick="window.location.reload()"></center>').appendTo("#playAgain");
		document.getElementById('enemybattlefield').style.display = 'none';
		document.getElementById('playerbattlefield').style.display = 'none';
		document.getElementById('pcDeck').style.display = 'none';
		document.getElementById('playerDeck').style.display = 'none';

		$('#gameLog').append('<li>Pc Wins!</li>');
		alert('You Lose!');

	}
	if(DeadPcCards == 8 && PlayerHP > 0 && PcHP > 0){



			$('<center><input type="button" class="btn btn-primary mybtn" value="Play Again" onClick="window.location.reload()"></center>').appendTo("#playAgain");
			document.getElementById('enemybattlefield').style.display = 'none';
			document.getElementById('playerbattlefield').style.display = 'none';
			document.getElementById('pcDeck').style.display = 'none';
			document.getElementById('playerDeck').style.display = 'none';

			$('#gameLog').append('<li>Pc has no more cards, Their Nexus is exposed, Player Wins!</li>');
			alert('Pc has no more cards, Their Nexus is exposed, Player Wins!');




		
	} else if(DeadPlayerCards == 8 && PlayerHP > 0 && PcHP > 0){


		$('<center><input type="button" class="btn btn-primary mybtn" value="Play Again" onClick="window.location.reload()"></center>').appendTo("#playAgain");
			document.getElementById('enemybattlefield').style.display = 'none';
			document.getElementById('playerbattlefield').style.display = 'none';
			document.getElementById('pcDeck').style.display = 'none';
			document.getElementById('playerDeck').style.display = 'none';

			$('#gameLog').append('<li>Player has no more cards, Their Nexus is exposed, Pc Wins!</li>');
			alert('Player has no more cards, Their Nexus is exposed, Pc Wins!');



		/*
		if(PlayerHP > PcHP){
			
			$('<input type="button" value="Play Again" onClick="window.location.reload()">').appendTo("#Attack");
			document.getElementById('enemybattlefield').style.display = 'none';
			document.getElementById('playerbattlefield').style.display = 'none';
			document.getElementById('pcDeck').style.display = 'none';
			document.getElementById('playerDeck').style.display = 'none';

			$('#gameLog').append('<li>No More Cards! Player Has More HP, Player Wins!</li>');
			alert('No More Cards! Player Has More HP, Player Wins!');
		} else if (PcHP > PlayerHP){
			
			$('<input type="button" value="Play Again" onClick="window.location.reload()">').appendTo("#Attack");
			document.getElementById('enemybattlefield').style.display = 'none';
			document.getElementById('playerbattlefield').style.display = 'none';
			document.getElementById('pcDeck').style.display = 'none';
			document.getElementById('playerDeck').style.display = 'none';

			$('#gameLog').append('<li>No More Cards! Pc Has More HP, Pc Wins!</li>');
			alert('No More Cards! Pc Has More HP, Pc Wins!');
		} else if (PcHP == PlayerHP){
			$('<input type="button" value="Play Again" onClick="window.location.reload()">').appendTo("#Attack");
			document.getElementById('enemybattlefield').style.display = 'none';
			document.getElementById('playerbattlefield').style.display = 'none';
			document.getElementById('pcDeck').style.display = 'none';
			document.getElementById('playerDeck').style.display = 'none';

			$('#gameLog').append('<li>No More Cards! Equal HP, Tie!</li>');
			alert('No More Cards! Equal HP, Tie!');
		}
		*/

	}
	
}

function checkIfPcHasCard() { 

	if ( $( ".activePcCard" ).find(".cardText").html() == undefined || $( ".activePcCard" ).find(".cardText").html() == '' || $( ".activePcCard" ).find(".cardText").html() == 'undefined'){

	//	document.getElementById('placedPcCard'+CurPcCard).style.display = 'inline-block';
		//document.getElementById('cardBack'+CurPcCard).style.display = 'none';


		$('#cardBack'+CurPcCard).fadeOut("slow");
		$('#placedPcCard'+CurPcCard).fadeIn("slow");
			
		setTimeout(function(){

			$('#placedPcCard'+CurPcCard).attr('class', 'activePcCard');
			CurPcCard = CurPcCard + 1;

		}, 600);



		//$('#placedPcCard'+CurPcCard).attr('class', 'activePcCard');
		//CurPcCard = CurPcCard + 1;


	}




}
