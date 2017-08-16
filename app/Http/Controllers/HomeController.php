<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Etf;
use App\Helpers\Curl;
use App\Helpers\Parse;
use App\Helpers\Tools;

class HomeController extends Controller {

    public $uri = 'https://www.spdrs.com/product/fund.seam?ticker=';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = 'Home';
        return view('home', compact('title'));
    }

    /**
     * Search ETF in database, if not exist check online.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $title = 'Home';
        $input = trim($request->search);
        if (!empty($input)) {
            
            //log the sumbol requested
            DB::table('logs')->insert(
                ['symbol' => $input, 'ip_address' => $request->ip(), 'user_id' => Auth::user()->user_id]
            );
            
            $etf = Etf::where('etf_name', $input)->first(); //try to get the ETF from db
            
            if(empty($etf)){
                $inserted = $this->ParseAndInsert($input);
                if(!$inserted){
                    Session::flash('notif_type', 'warning');
                    Session::flash('notif', 'Could not find this ETF!');
                    return redirect("/");
                }
                $etf = Etf::where('etf_name', $input)->first(); // get the etf after inserted in db
            }
            
            $holdings = DB::table('holding')->where('etf_id', $etf->etf_id)->get();
            $sectors  = DB::table('sector')->where('etf_id',  $etf->etf_id)->get();
            $countrys = DB::table('country')->where('etf_id', $etf->etf_id)->get();
        }
        return view('home', compact('title', 'etf', 'holdings', 'sectors', 'countrys'));
    }

    /**
     * 
     * @param type string $input
     * @The goals is to insert data in DB and return true
     * @return boolean
     * 
     */
    private function ParseAndInsert($input) {

        $url = $this->uri . '' . strtoupper($input);

        $curl = new Curl();
        $html = $curl->get($url);

        //Start Parse the html
        libxml_use_internal_errors(true); //skip the invalid html code warnings 

        $dom = new \DomDocument;
        $dom->validateOnParse = true; // We need to validate our document before parse
        $dom->loadHTML($html);
        $dom->preserveWhiteSpace = false;

        //1- get the name
        $etf_name = Parse::getName($dom);
        if (empty($etf_name)) {
            return false;
        }

        //2- get the description
        $description = Parse::getDescription($dom);

        //3- get the date
        $xpath = new \DOMXpath($dom);
        $etf_date = Parse::getDate($xpath);

        //4- top holding
        $top_holding = Parse::getTopHolding($xpath);

        //5- sector
        $sector = Parse::getSector($xpath);

        //5- country
        $country = Parse::getCountry($xpath);

        
        //Insert Into database with Transaction
        DB::beginTransaction();

        try {
            // 1- Insert ETF
            $etf_id = DB::table('etf')->insertGetId([
                'etf_name' => $etf_name,
                'description' => $description,
                'etf_date' => Carbon::parse($etf_date)->format('Y-m-d'),
                'user_id' => Auth::user()->user_id
            ]);

            // 2- Insert top_holding
            foreach ($top_holding as $key => $value) {
                DB::table('holding')->insert([
                    'holding_name' => $value['holding_name'],
                    'weight' => $value['weight'],
                    'etf_id' => $etf_id
                ]);
            }

            // 3- Insert sector
            foreach ($sector as $key => $value) {
                DB::table('sector')->insert([
                    'sector_name' => $value['sector_name'],
                    'weight' => $value['weight'],
                    'order_num' => $value['order_num'],
                    'etf_id' => $etf_id
                ]);
            }

            // 4- Insert country
            foreach ($country as $key => $value) {
                DB::table('country')->insert([
                    'country_name' => $value['country_name'],
                    'weight' => $value['weight'],
                    'etf_id' => $etf_id
                ]);
            }
            
            DB::commit();
            return true;
        } 
        catch (\Exception $e) {
            DB::rollback();
            //Tools::message($e->getMessage(), 1);
            return false;
        }
        return false;
    }

}
