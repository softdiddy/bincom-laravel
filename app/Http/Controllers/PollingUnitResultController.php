<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PollingUnitResult;
use App\Models\PollingUnit;
use App\Models\Party;
use App\Models\Lga;
use Illuminate\Support\Facades\DB;

class PollingUnitResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get polling unit result and joining polling_unit table to get the polling unit name
        $dataResult=DB::table('announced_pu_results')
        ->join('polling_unit', 'announced_pu_results.polling_unit_uniqueid', "=", 'polling_unit.uniqueid')
        ->orderBy('result_id', 'DESC')
        ->get();

        //get all polling unit
        $dataPollingUnit=PollingUnit::where('polling_unit_name', '!=', '')->get();

        //get LGA
        $dataLga=Lga::get();

        return view('welcome', ['dataResult' => $dataResult, 'sn' => '1', 'dataPollingUnit' => $dataPollingUnit, 'dataLga' => $dataLga]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get all polling unit
        $dataPollingUnit=PollingUnit::where('polling_unit_name', '!=', '')->get();

        //get all the parties
        $dataParty=Party::get();
        return view('addNewResult', ['dataPollingUnit' => $dataPollingUnit, 'dataParty' => $dataParty]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $PollingUnitResult = new PollingUnitResult;
        
        $PollingUnitResult->polling_unit_uniqueid = request('pollingUnit');
        $PollingUnitResult->party_abbreviation = request('party');
        $PollingUnitResult->party_score = request('scores');
        $PollingUnitResult->entered_by_user = request('enteredby');
        $PollingUnitResult->date_entered = date('Y-m-d H:i:s');
        $PollingUnitResult->user_ip_address = request()->ip();  
        
        
        if($PollingUnitResult->save()){
            return redirect('/') ->with('msg','Record Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $pollingUnit= request('pollingUnit');
        $dataResult=DB::table('announced_pu_results')
        ->join('polling_unit', 'announced_pu_results.polling_unit_uniqueid', "=", 'polling_unit.uniqueid')
        ->where('polling_unit.polling_unit_number', '=', $pollingUnit)
        ->get();

        return view('filterByPollingUnit', ['dataResult' => $dataResult, 'sn' => '1']);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       
    }

    public function viewResultByLga(Request $request){
        $lga_id= request('lga_id');

        $dataResult=DB::table('announced_pu_results')
        ->join('polling_unit', 'announced_pu_results.polling_unit_uniqueid', "=", 'polling_unit.uniqueid')
        ->where('polling_unit.lga_id', '=', $lga_id)
        ->orderBy('result_id', 'DESC')
        ->get();

        $sum=DB::table('announced_pu_results')
        ->join('polling_unit', 'announced_pu_results.polling_unit_uniqueid', "=", 'polling_unit.uniqueid')
        ->where('polling_unit.lga_id', '=', $lga_id)
        ->orderBy('result_id', 'DESC')
        ->sum('announced_pu_results.party_score');
        

        
      
        return view('viewResultByLga', ['dataResult' => $dataResult, 'sn' => '1', 'sum' => $sum]);
    }
    
}
