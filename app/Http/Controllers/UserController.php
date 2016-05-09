<?php
namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class UserController extends Controller {

	public function getDashboard(){

		return view('dashboard');

	}



	public function postSignUp(Request $request) {


		/*

			This function grabs all of the fields from the home page form
			and sets all of the required info into a user object

		*/

		$this->validate($request, [

			'lolaccount' => 'required'

		]);

		$lolaccount = $request['lolaccount'];
		$lolregion = $request['lolregion'];
		$enemylolaccount = $request['enemylolaccount'];
		$enemylolregion = $request['enemylolregion'];

		if($lolregion == 'br'){
			$lolregionID = 'BR1';
		}
		if($lolregion == 'eune'){
			$lolregionID = 'EUN1';
		}
		if($lolregion == 'euw'){
			$lolregionID = 'EUW1';
		}
		if($lolregion == 'jp'){
			$lolregionID = 'JP1';
		}
		if($lolregion == 'kr'){
			$lolregionID = 'KR';
		}
		if($lolregion == 'lan'){
			$lolregionID = 'LA1';
		}
		if($lolregion == 'las'){
			$lolregionID = 'LA2';
		}
		if($lolregion == 'na'){
			$lolregionID = 'NA1';
		}
		if($lolregion == 'oce'){
			$lolregionID = 'OC1';
		}
		if($lolregion == 'tr'){
			$lolregionID = 'TR1';
		}
		if($lolregion == 'ru'){
			$lolregionID = 'RU';
		}
		if($lolregion == 'pbe'){
			$lolregionID = 'PBE1';
		}
		if($enemylolregion == 'br'){
			$enemylolregionID = 'BR1';
		}
		if($enemylolregion == 'eune'){
			$enemylolregionID = 'EUN1';
		}
		if($enemylolregion == 'euw'){
			$enemylolregionID = 'EUW1';
		}
		if($enemylolregion == 'jp'){
			$enemylolregionID = 'JP1';
		}
		if($enemylolregion == 'kr'){
			$enemylolregionID = 'KR';
		}
		if($enemylolregion == 'lan'){
			$enemylolregionID = 'LA1';
		}
		if($enemylolregion == 'las'){
			$enemylolregionID = 'LA2';
		}
		if($enemylolregion == 'na'){
			$enemylolregionID = 'NA1';
		}
		if($enemylolregion == 'oce'){
			$enemylolregionID = 'OC1';
		}
		if($enemylolregion == 'tr'){
			$enemylolregionID = 'TR1';
		}
		if($enemylolregion == 'ru'){
			$enemylolregionID = 'RU';
		}
		if($enemylolregion == 'pbe'){
			$enemylolregionID = 'PBE1';
		}


		//Queries my database to get the api key

		$apiKey = DB::table('api')->value('api');




		//creating a new user object using the data
		$user = new User();
		$user->lolaccount = $lolaccount;
		$user->lolregion = $lolregion;
		$user->lolregionID = $lolregionID;
		$user->enemylolaccount = $enemylolaccount;
		$user->enemylolregion = $enemylolregion;
		$user->enemylolregionID = $enemylolregionID;
		$user->usertype = 'user';
		$user->apikey = $apiKey;

		$user->save();

		Auth::login($user);

		return redirect()->route('dashboard');
	}

	public function postSignIn(Request $request) {
		/*
		$this->validate($request, [

			'email' => 'required',
			'password' => 'required'

		]);


		if (Auth::attempt(['email' => $request['email'],'password' => $request['password']])) {
			return redirect()->route('dashboard');
		}
		return redirect()->back();
		*/

	}

	public function getLogout(){

		Auth::logout();
		return redirect()->route('home');

	}


	


	function postGetStats(Request $request){
		/*
		$user = $request['user'];
		$userv2 = $request['user'];
		$unmodifiedUser = $userv2;
		$summoner = $user;
		$server = 'na';
		$user = rawurlencode($user);

		$apiKey = Auth::user()->apikey;



		$curl = curl_init("https://na.api.pvp.net/api/lol/na/v1.4/summoner/by-name/$user?api_key=$apiKey");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$resultuser = curl_exec($curl);
		curl_close($curl);
		$userresult = json_decode($resultuser, true);
		$userlowercase = strtolower($userv2);
		$usernospace = str_replace(' ', '', $userlowercase);
		$playerid = $userresult[$usernospace]['id'];

		$curl = curl_init("https://na.api.pvp.net/championmastery/location/NA1/player/$playerid/champions?api_key=$apiKey");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

		$result = json_decode($result, true);

		$curl = curl_init("https://na.api.pvp.net/api/lol/na/v1.3/stats/by-summoner/$playerid/ranked?season=SEASON2016&api_key=$apiKey");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$rankedstats = curl_exec($curl);
		curl_close($curl);

		$rankedstats = json_decode($rankedstats, true);

		return view('testingapi', compact('result', 'rankedstats', 'unmodifiedUser'));
		*/


	}



	function getPlayGame() {

		/*


			This function calls the riot api to get the specified users mastery levels

			

		*/


		$user = Auth::user()->lolaccount;
		$userv2 = $user;
		$unmodifiedUser = $user;
		$server = Auth::user()->lolregion;
		$lolregionID = Auth::user()->lolregionID;
		$user = rawurlencode($user);

		$apiKey = Auth::user()->apikey;
		

		/*

		Getting The Player ID

		*/

		$curl = curl_init("https://$server.api.pvp.net/api/lol/$server/v1.4/summoner/by-name/$user?api_key=$apiKey");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$resultuser = curl_exec($curl);
		curl_close($curl);
		$userresult = json_decode($resultuser, true);
		//dd($userresult);
		$userlowercase = strtolower($userv2);
		$usernospace = str_replace(' ', '', $userlowercase);
		
		$playerid = $userresult[$usernospace]['id'];

		/*

		Getting The Champion Mastery Data


		*/

		$curl2 = curl_init("https://$server.api.pvp.net/championmastery/location/$lolregionID/player/$playerid/champions?api_key=$apiKey");
		curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl2);
		curl_close($curl2);

		$result = json_decode($result, true);


		return view('playgame', compact('result', 'unmodifiedUser'));



	}

	function getInfo() {
		//instructions page
		return view('instructions');

	}







}