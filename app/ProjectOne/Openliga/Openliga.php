<?php


namespace ProjectOne\Openliga;

class Openliga
{
    const SOAP_URL = 'http://www.OpenLigaDB.de/Webservices/Sportsdata.asmx?WSDL';
    /**
     * @var OpenLigaDB
     */
    protected static $instance;
    private $client;
    private $leagueShortcut = 'bl1';
    private $leagueSaison   =  2015;
    /**
     * Instantiate the OpenLigaDB object (Factory)
     *
     * @return OpenLigaDB The OpenLigaDB object
     */
    static public function getInstance() {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return static::$instance;
    }
    public function __construct() {
        $this->client = new \SoapClient(static::SOAP_URL, array(
            'encoding'             => 'UTF-8',
            'connection_timeout'   => 10,
            'exceptions'           => 1,
        ));
    }
    public function getAvailLeagues() {
        try {
            $response = $this->client->GetAvailLeagues();
            $data     = $response->GetAvailLeaguesResult->League;
            return $data;
        }
        catch (SoapFault $e) {
            return false;
        }
        catch (Exception $e) {
            return false;
        }
    }
    public function getMatchGoals($matchId) {
        try {
            $params = new \stdClass();
            $params->MatchID = $matchId;
            $response = $this->client->GetGoalsByMatch($params);
            $data     = $response->GetGoalsByMatchResult->Goal;
            return $data;
        }
        catch (SoapFault $e) {
            return false;
        }
        catch (Exception $e) {
            return false;
        }
    }
    public function setLeague(array $leagueInfos) {
        $this->leagueShortcut = $leagueInfos['shortcut'];
        $this->leagueSaison   = $leagueInfos['saison'];
    }
    public function getMatches() {
        if ($this->leagueShortcut == '' || $this->leagueSaison == 0) {
            return false;
        }
        try {
            $params = new \stdClass();
            $params->leagueShortcut = $this->leagueShortcut;
            $params->leagueSaison   = $this->leagueSaison;
            $response = $this->client->GetMatchdataByLeagueSaison($params);
            $data     = $response->GetMatchdataByLeagueSaisonResult->Matchdata;
            return $data;
        }
        catch (SoapFault $e) {
            return false;
        }
        catch (Exception $e) {
            return false;
        }
    }
    public function getLeagueTeams() {
        if ($this->leagueShortcut == '' || $this->leagueSaison == 0) {
            return false;
        }
        try {
            $params = new \stdClass();
            $params->leagueShortcut = $this->leagueShortcut;
            $params->leagueSaison   = $this->leagueSaison;
            $response = $this->client->GetTeamsByLeagueSaison($params);
            $data     = $response->GetTeamsByLeagueSaisonResult->Team;
            return $data;

        }
        catch (SoapFault $e) {
            return false;
        }
        catch (Exception $e) {
            return false;
        }
    }
    public function getLastLeagueChange() {
        try {
            $params = new \stdClass;
            $params->leagueShortcut = $this->leagueShortcut;
            $params->leagueSaison   = $this->leagueSaison;
            $response = $this->client->GetLastChangeDateByLeagueSaison($params);
        }
        catch (SoapFault $e) {
            var_dump($e);
            return false;
        }
        catch (Exception $e) {
            var_dump($e);
            return false;
        }
        return $response->GetLastChangeDateByLeagueSaisonResult;

    }
  
}

//$c = 100;
//$h = new OpenLigaDB();
//$b = $h->getMatches();


//for($count = 0; $count < $c; $count++){
//    if($b[$count]->groupOrderID == 1 && $b[$count]->groupOrderID ){
//        print_r($b[$count]->nameTeam1.'<img src="'.$b[$count]->iconUrlTeam1.'">'. 'VS '. $b[$count]->nameTeam2.'<img src="'.$b[$count]->iconUrlTeam2.'">'."<br>");
//    }



//}
//print_r("<br>"."<br>"."<br>");
//for($count = 0; $count < $c; $count++){
//   if($b[$count]->groupOrderID == 2){
//        print_r($b[$count]->nameTeam1.'<img src="'.$b[$count]->iconUrlTeam1.'">'. 'VS '. $b[$count]->nameTeam2.'<img src="'.$b[$count]->iconUrlTeam2.'">'."<br>");
//    }
//}
