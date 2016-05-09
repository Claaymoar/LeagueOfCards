<?php
namespace App;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class helpers
{
    public static function getUsername($champid)
    {
    
    $lolregion = Auth::user()->lolregion;
    $apiKey = Auth::user()->apikey;

    $curl = curl_init("https://global.api.pvp.net/api/lol/static-data/$lolregion/v1.2/champion/$champid?api_key=$apiKey");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$champname = curl_exec($curl);
		curl_close($curl);
		$champname2 = json_decode($champname, true);
		$champname2 = $champname2['name'];
       	return $champname2;
    }
    public static function getWLRatio($win, $loss) {

    	$totalgames = $win + $loss;

    	if($totalgames != 0){
    		$ratio = $win / $totalgames;
    		$ratio = $ratio * 100;
    		$ratiof = floor($ratio);
    	} else {
    		$ratiof = 'N/A';
    	}

    	 
    	return $ratiof;


    }

    public static function getKDRatio($kills, $deaths) {

    	if($deaths != 0){
    	$kdr = $kills/$deaths;
    	$formattedkdr = number_format((float)$kdr, 2, '.', ''); 
    	} else {
    		$formattedkdr = 'N/A';
    	}
    	
    	return $formattedkdr;


    }

    public static function shuffleCards(){


       $ChampsV2 = array(
          //[Champname], [ChampID], [Damage], [Defence]
          array("Aatrox",266,2,2),
          array("Ahri",103,2,1),
          array("Akali",84,2,1),
          array("Alistar",12,1,2),
          array("Amumu",32,1,2),
          array("Anivia",34,2,1),
          array("Annie",1,2,1),
          array("Ashe",22,2,1),
          array("AurelionSol",136,2,1),
          array("Azir",268,2,1),
          array("Bard",432,1,2),
          array("Blitzcrank",53,1,2),
          array("Brand",63,2,1),
          array("Braum",201,1,2),
          array("Caitlyn",51,2,1),
          array("Cassiopeia",69,2,1),
          array("Chogath",31,1,2),
          array("Corki",42,2,1),
          array("Darius",122,2,2),
          array("Diana",131,2,1),
          array("DrMundo",36,1,2),
          array("Draven",119,2,1),
          array("Ekko",245,2,1),
          array("Elise",60,2,1),
          array("Evelynn",28,2,1),
          array("Ezreal",81,2,1),
          array("FiddleSticks",9,2,1),
          array("Fiora",114,2,1),
          array("Fizz",105,2,1),
          array("Galio",3,2,1),
          array("Gangplank",41,2,1),
          array("Garen",86,1,2),
          array("Gnar",150,2,2),
          array("Gragas",79,2,2),
          array("Graves",104,2,1),
          array("Hecarim",120,2,2),
          array("Heimerdinger",74,2,1),
          array("Illaoi",420,2,2),
          array("Irelia",39,1,2),
          array("Janna",40,1,2),
          array("JarvanIV",59,2,2),
          array("Jax",24,2,2),
          array("Jayce",126,2,2),
          array("Jhin",202,2,1),
          array("Jinx",222,2,1),
          array("Kalista",429,2,1),
          array("Karma",43,1,2),
          array("Karthus",30,2,1),
          array("Kassadin",38,2,1),
          array("Katarina",55,2,1),
          array("Kayle",10,2,1),
          array("Kennen",85,2,1),
          array("Khazix",121,2,1),
          array("Kindred",203,2,1),
          array("KogMaw",96,2,1),
          array("Leblanc",7,2,1),
          array("LeeSin",64,2,1),
          array("Leona",89,1,2),
          array("Lissandra",127,2,1),
          array("Lucian",236,2,1),
          array("Lulu",117,1,2),
          array("Lux",99,2,1),
          array("Malphite",54,1,2),
          array("Malzahar",90,2,1),
          array("Maokai",57,2,2),
          array("MasterYi",11,2,1),
          array("MissFortune",21,2,1),
          array("Mordekaiser",82,1,2),
          array("Morgana",25,1,2),
          array("Nami",267,1,2),
          array("Nasus",75,2,2),
          array("Nautilus",111,2,2),
          array("Nidalee",76,2,1),
          array("Nocturne",56,2,1),
          array("Nunu",20,1,2),
          array("Olaf",2,2,2),
          array("Orianna",61,2,1),
          array("Pantheon",80,2,2),
          array("Poppy",78,1,2),
          array("Quinn",133,2,1),
          array("Rammus",33,1,2),
          array("RekSai",421,2,2),
          array("Renekton",58,2,2),
          array("Rengar",107,2,1),
          array("Riven",92,2,1),
          array("Rumble",68,2,1),
          array("Ryze",13,2,1),
          array("Sejuani",113,2,2),
          array("Shaco",35,2,1),
          array("Shen",98,1,2),
          array("Shyvana",102,2,2),
          array("Singed",27,2,2),
          array("Sion",14,1,2),
          array("Sivir",15,2,1),
          array("Skarner",72,1,2),
          array("Sona",37,1,2),
          array("Soraka",16,1,2),
          array("Swain",50,2,1),
          array("Syndra",134,2,1),
          array("TahmKench",223,1,2),
          array("Talon",91,2,1),
          array("Taric",44,1,2),
          array("Teemo",17,2,1),
          array("Thresh",412,1,2),
          array("Tristana",18,2,1),
          array("Trundle",48,2,2),
          array("Tryndamere",23,2,2),
          array("TwistedFate",4,2,1),
          array("Twitch",29,2,1),
          array("Udyr",77,2,2),
          array("Urgot",6,2,1),
          array("Varus",110,2,1),
          array("Vayne",67,2,1),
          array("Veigar",45,2,1),
          array("Velkoz",161,2,1),
          array("Vi",254,2,1),
          array("Viktor",112,2,1),
          array("Vladimir",8,2,2),
          array("Volibear",106,1,2),
          array("Warwick",19,2,2),
          array("MonkeyKing",62,2,1),
          array("Xerath",101,2,1),
          array("XinZhao",5,2,1),
          array("Yasuo",157,2,1),
          array("Yorick",83,2,1),
          array("Zac",154,1,2),
          array("Zed",238,3,1),
          array("Ziggs",115,2,1),
          array("Zilean",26,1,2),
          array("Zyra",143,2,1),
        );
        
       shuffle($ChampsV2); 

       return $ChampsV2;

    }

        public static function pcCards(){


       $ChampsV2 = array(
          //[Champname], [ChampID], [Damage], [Defence]
          array("Aatrox",266,2,2),
          array("Ahri",103,2,1),
          array("Akali",84,2,1),
          array("Alistar",12,1,2),
          array("Amumu",32,1,2),
          array("Anivia",34,2,1),
          array("Annie",1,2,1),
          array("Ashe",22,2,1),
          array("AurelionSol",136,2,1),
          array("Azir",268,2,1),
          array("Bard",432,1,2),
          array("Blitzcrank",53,1,2),
          array("Brand",63,2,1),
          array("Braum",201,1,2),
          array("Caitlyn",51,2,1),
          array("Cassiopeia",69,2,1),
          array("Chogath",31,1,2),
          array("Corki",42,2,1),
          array("Darius",122,2,2),
          array("Diana",131,2,1),
          array("DrMundo",36,1,2),
          array("Draven",119,2,1),
          array("Ekko",245,2,1),
          array("Elise",60,2,1),
          array("Evelynn",28,2,1),
          array("Ezreal",81,2,1),
          array("FiddleSticks",9,2,1),
          array("Fiora",114,2,1),
          array("Fizz",105,2,1),
          array("Galio",3,2,1),
          array("Gangplank",41,2,1),
          array("Garen",86,1,2),
          array("Gnar",150,2,2),
          array("Gragas",79,2,2),
          array("Graves",104,2,1),
          array("Hecarim",120,2,2),
          array("Heimerdinger",74,2,1),
          array("Illaoi",420,2,2),
          array("Irelia",39,1,2),
          array("Janna",40,1,2),
          array("JarvanIV",59,2,2),
          array("Jax",24,2,2),
          array("Jayce",126,2,2),
          array("Jhin",202,2,1),
          array("Jinx",222,2,1),
          array("Kalista",429,2,1),
          array("Karma",43,1,2),
          array("Karthus",30,2,1),
          array("Kassadin",38,2,1),
          array("Katarina",55,2,1),
          array("Kayle",10,2,1),
          array("Kennen",85,2,1),
          array("Khazix",121,2,1),
          array("Kindred",203,2,1),
          array("KogMaw",96,2,1),
          array("Leblanc",7,2,1),
          array("LeeSin",64,2,1),
          array("Leona",89,1,2),
          array("Lissandra",127,2,1),
          array("Lucian",236,2,1),
          array("Lulu",117,1,2),
          array("Lux",99,2,1),
          array("Malphite",54,1,2),
          array("Malzahar",90,2,1),
          array("Maokai",57,2,2),
          array("MasterYi",11,2,1),
          array("MissFortune",21,2,1),
          array("Mordekaiser",82,1,2),
          array("Morgana",25,1,2),
          array("Nami",267,1,2),
          array("Nasus",75,2,2),
          array("Nautilus",111,2,2),
          array("Nidalee",76,2,1),
          array("Nocturne",56,2,1),
          array("Nunu",20,1,2),
          array("Olaf",2,2,2),
          array("Orianna",61,2,1),
          array("Pantheon",80,2,2),
          array("Poppy",78,1,2),
          array("Quinn",133,2,1),
          array("Rammus",33,1,2),
          array("RekSai",421,2,2),
          array("Renekton",58,2,2),
          array("Rengar",107,2,1),
          array("Riven",92,2,1),
          array("Rumble",68,2,1),
          array("Ryze",13,2,1),
          array("Sejuani",113,2,2),
          array("Shaco",35,2,1),
          array("Shen",98,1,2),
          array("Shyvana",102,2,2),
          array("Singed",27,2,2),
          array("Sion",14,1,2),
          array("Sivir",15,2,1),
          array("Skarner",72,1,2),
          array("Sona",37,1,2),
          array("Soraka",16,1,2),
          array("Swain",50,2,1),
          array("Syndra",134,2,1),
          array("TahmKench",223,1,2),
          array("Talon",91,2,1),
          array("Taric",44,1,2),
          array("Teemo",17,2,1),
          array("Thresh",412,1,2),
          array("Tristana",18,2,1),
          array("Trundle",48,2,2),
          array("Tryndamere",23,2,2),
          array("TwistedFate",4,2,1),
          array("Twitch",29,2,1),
          array("Udyr",77,2,2),
          array("Urgot",6,2,1),
          array("Varus",110,2,1),
          array("Vayne",67,2,1),
          array("Veigar",45,2,1),
          array("Velkoz",161,2,1),
          array("Vi",254,2,1),
          array("Viktor",112,2,1),
          array("Vladimir",8,2,2),
          array("Volibear",106,1,2),
          array("Warwick",19,2,2),
          array("MonkeyKing",62,2,1),
          array("Xerath",101,2,1),
          array("XinZhao",5,2,1),
          array("Yasuo",157,2,1),
          array("Yorick",83,2,1),
          array("Zac",154,1,2),
          array("Zed",238,3,1),
          array("Ziggs",115,2,1),
          array("Zilean",26,1,2),
          array("Zyra",143,2,1),
        );
        
       shuffle($ChampsV2); 

       return $ChampsV2;

    }

    public static function getMastery($champID){
        $champLevel = 1;
        $lolUser = Auth::user()->lolaccount;
        $lolregion = Auth::user()->lolregion;
        $lolregionID = Auth::user()->lolregionID;
        $apiKey = Auth::user()->apikey;
        /*

        Getting The Player ID

        */

        $curl3 = curl_init("https://$lolregion.api.pvp.net/api/lol/$lolregion/v1.4/summoner/by-name/$lolUser?api_key=$apiKey");
        curl_setopt($curl3, CURLOPT_RETURNTRANSFER, 1);
        $resultuser = curl_exec($curl3);
        curl_close($curl3);
        $userresult = json_decode($resultuser, true);
        $userlowercase = strtolower($lolUser);
        $plainUsername = str_replace(' ', '', $userlowercase);
        //dd($userresult);

            $array = $userresult[$plainUsername];
            $theplayerid = $array['id'];
   
        
        
        
        //dd($theplayerid);


        /*

        Getting The Champion Mastery Data


        */
        $curl = curl_init("https://$lolregion.api.pvp.net/championmastery/location/$lolregionID/player/$theplayerid/champions?api_key=$apiKey");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, true);
       // dd($result); 

        
        foreach ($result as $res) {
            
         
            $xx = $res['championId'];

          if($champID ==  $xx){
            $champLevel = $res['championLevel'];
            return $champLevel;
            dd($champLevel);
          }
           
        }
        
        return $champLevel;

    }


        public static function getPcMastery($champID){
        $champLevel = 1;
       // $lolUser = 'claay';
        $lolUser = Auth::user()->enemylolaccount;
        $lolregion = Auth::user()->enemylolregion;
        $lolregionID = Auth::user()->enemylolregionID;
        $apiKey = Auth::user()->apikey;




        /*
        Getting The Player ID
        */
        $curl3 = curl_init("https://$lolregion.api.pvp.net/api/lol/$lolregion/v1.4/summoner/by-name/$lolUser?api_key=$apiKey");
        curl_setopt($curl3, CURLOPT_RETURNTRANSFER, 1);
        $resultuser = curl_exec($curl3);
        curl_close($curl3);
        $userresult = json_decode($resultuser, true);
        $userlowercase = strtolower($lolUser);
        $plainUsername = str_replace(' ', '', $userlowercase);
       // dd($userresult);

        $array = $userresult[$plainUsername];
        $theplayerid = $array['id'];
   
        
        
        
        //dd($theplayerid);


        /*

        Getting The Champion Mastery Data


        */
        $curl = curl_init("https://$lolregion.api.pvp.net/championmastery/location/$lolregionID/player/$theplayerid/champions?api_key=$apiKey");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, true);

        //this is used to get the champion mastery level
        foreach ($result as $res) {
            
         
            $xx = $res['championId'];

          if($champID ==  $xx){
            $champLevel = $res['championLevel'];
            return $champLevel;
            dd($champLevel);
          }
           
        }
        
        return $champLevel;

    }

    //function for calculating the cards DMG
    public static function calcAD($AD, $Mastery){

      $NewAD = $AD + $Mastery;
        
      return $NewAD;

    }
    //function for calculating the cards Defence
    public static function calcDef($Def, $Mastery){

      $NewDef = $Def + $Mastery;
        
      return $NewDef;
      
    }


}