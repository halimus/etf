<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Etf;

class EtfController extends Controller {
    
    /**
     * Display ETF page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = 'ETFs';
        //$etfs = Etf::all(); 
        //$etfs = Etf::all()->sortByDesc("created_at");
        
        $etfs = DB::table('etf')
                ->join('users', 'etf.user_id', '=', 'users.user_id')
                ->select('etf.*', 'users.name', 'users.username')
                ->get();
        
        return view('etf.list', compact('title', 'etfs'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $title = 'ETF';
        $etf = Etf::find($id);
        if (!$etf) {
            Session::flash('notif_type', 'danger');
            Session::flash('notif', 'Could not find the ETF!');
            return redirect("etf");
        }
        
        $holdings = DB::table('holding')->where('etf_id', $etf->etf_id)->get();
        $sectors  = DB::table('sector')->where('etf_id',  $etf->etf_id)->get();
        $countrys = DB::table('country')->where('etf_id', $etf->etf_id)->get();
        
        return view('etf.show', compact('title', 'etf', 'holdings', 'sectors', 'countrys'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $etf = Etf::findOrFail($id);
        if (!$etf) {
            Session::flash('notif_type', 'danger');
            Session::flash('notif', 'Could not find the ETF!');
            return redirect("etf");
        }
        $etf->delete();
        Session::flash('flash_message', 'ETF has been deleted!');
        return redirect('etf');
    }
    
    /**
     * Display Logs page.
     *
     * @return \Illuminate\Http\Response
     */
    public function logs() {
        $title = 'Logs';
        
        $logs = DB::table('logs')
                ->join('users', 'logs.user_id', '=', 'users.user_id')
                ->select('logs.*', 'users.name', 'users.username')
                ->get();
        
        return view('etf.logs', compact('title', 'logs'));
    }
    

    
}
