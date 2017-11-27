<?php

namespace App\Http\Controllers;

use App\Panel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $panels=DB::table('panels')
              ->orWhere('timestamp', 'like',date('Y-m-d') . '%')
            ->get();
        return response()->json($panels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $panels=DB::table('panels')
            ->orWhere('timestamp', 'like',date('Y-m-d') . '%')
            ->where('inversor_id','=',$id)
            ->get();
        return response()->json($panels);
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


    public function montlyProduction(){
        //Date of the last months, not the actually
        $dateOne=Carbon::createFromFormat('Y-m',date('Y-m'))->subMonth(1)->format('Y-m');
        $dateTwo=Carbon::createFromFormat('Y-m',date('Y-m'))->subMonth(2)->format('Y-m');
        $dateThree=Carbon::createFromFormat('Y-m',date('Y-m'))->subMonth(3)->format('Y-m');
        $dateFour=Carbon::createFromFormat('Y-m',date('Y-m'))->subMonth(4)->format('Y-m');
        $dateFive=Carbon::createFromFormat('Y-m',date('Y-m'))->subMonth(5)->format('Y-m');
        //Request to the database. Get the production group by inversor for every month
        $CurrentLessOne=DB::select("SELECT inversor_id, SUM(production) as production FROM panels WHERE timestamp LIKE ? GROUP BY inversor_id ",
            array($dateOne."%"));
        $CurrentLessTwo=DB::select("SELECT inversor_id, SUM(production) as production FROM panels WHERE timestamp LIKE ? GROUP BY inversor_id ",
            array($dateTwo."%"));
        $CurrentLessThree=DB::select("SELECT inversor_id, SUM(production) as production FROM panels WHERE timestamp LIKE ? GROUP BY inversor_id ",
            array($dateThree."%"));
        $CurrentLessFour=DB::select("SELECT inversor_id, SUM(production) as production FROM panels WHERE timestamp LIKE ? GROUP BY inversor_id ",
            array($dateFour."%"));
        $CurrentLessFive=DB::select("SELECT inversor_id, SUM(production) as production FROM panels WHERE timestamp LIKE ? GROUP BY inversor_id ",
            array($dateFive."%"));
        //The serial of the inversor
        $Inversor=DB::select("SELECT inversor_id FROM panels GROUP BY inversor_id ");
        //Order the data
        $temp=[];
        foreach ($Inversor as $i) {
            array_push($temp,$i->inversor_id);
        }
        //order the array
        $months=array(substr($dateOne,5,7),substr($dateTwo,5,7),
            substr($dateThree,5,7),substr($dateFour,5,7),substr($dateFive,5,7));
        //response json
        return response()->json(['one'=>$CurrentLessOne,
            'two'=>$CurrentLessTwo,'three'=>$CurrentLessThree,
            'four'=>$CurrentLessFour,'five'=>$CurrentLessFive,'inversor'=>$temp,'months'=>$months]);
    }
}
