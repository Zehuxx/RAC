<?php

namespace App\Http\Controllers\User;

use Image;
use App\Models\Car;
use App\Models\Order;
use App\Models\CarType;
use App\Models\Detail;
use App\Models\Movement;
use App\Models\Model;
use App\Models\State;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Requests\DetailStoreRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Controller;


class DetailController extends Controller
{ 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index(Request $request,$id)
    {
        $search = $request->input('search');
        $details=DB::table('details as a')
            ->select('a.*','b.year as year','b.license_plate as placa','b.image as imagen','c.location_code as ubicacion','d.name as movimiento')
            ->leftjoin('cars as b', 'a.car_id', '=', 'b.id')
            ->leftjoin('locations as c', 'b.location_id', '=', 'c.id')
            ->leftjoin('movements as d', 'a.movement_id', '=', 'd.id')
            ->where('a.order_id',$id)
            ->whereNull('a.deleted_at')
            ->where(function($q)use($search){
                $q->where('c.location_code','like', '%'.$search.'%')
                ->orWhere('b.license_plate','like', '%'.$search.'%')
                ->orWhere('b.year','like', '%'.$search.'%')
                ->orWhere('a.departure_date','like', '%'.$search.'%')
                ->orWhere('a.reentry_date','like', '%'.$search.'%')
                ->orWhere('d.name','like', '%'.$search.'%');
            })
            ->orderby('a.created_at','desc')
            //->toSql();
            ->paginate(10);

            //return $details;
        return view('user.order_details',compact('details'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $tiposmovimientos=Movement::all();
        return view('user.new_order_detail',compact('tiposmovimientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailStoreRequest $request,$id_orden,$id_carro)
    {
        $request->fechasalida=date_format(date_create($request->fechasalida),'Y-m-d H:i:s');
        if ($request->fechareeingreso!==null) {
            $request->fechareeingreso=date_format(date_create($request->fechareeingreso),'Y-m-d H:i:s');
        }
         
        $detail=new Detail();
        $detail->order_id=$id_orden;
        $detail->car_id=$id_carro;
        $detail->employee_id=Auth::user()->id;
        $detail->movement_id=$request->tipomovimiento;
        $detail->departure_date=$request->fechasalida;
        $detail->reentry_date=$request->fechareeingreso;
        $carro=Car::find($id_carro);
        switch ($request->tipomovimiento) {
            case 1://MANTENIMIENTO
                $location=Location::find($carro->location_id);
                if ($location===null) {
                    return redirect()->back()->withErrors(["ubicacion"=>"El carro no cuenta con una ubicacion"]);
                }
                $location->availability=1;
                $location->save();
                $carro->state_id=2;
                $detail->save();
                $carro->save();
                break;
            case 2://ROBO
                if ($carro->state_id===1) {
                    $location=Location::find($carro->location_id);
                    if ($location===null) {
                        return redirect()->back()->withErrors(["ubicacion"=>"El carro no cuenta con una ubicacion"]);
                    }
                    $location->availability=1;
                    $location->save();
                    $carro->state_id=2;
                    $detail->save();
                    $carro->save();
                }else{
                    $detail->save();
                    return redirect()->route('details index',$id_orden);
                }
                break;
            case 3://ARRENDAMIENTO
                $location=Location::find($carro->location_id);
                if ($location===null) {
                    return redirect()->back()->withErrors(["ubicacion"=>"El carro no cuenta con una ubicacion"]);
                }
            
                $carro->state_id=2;
                $detail->save();
                
                //SI LA FECHA DEL ARRENDAMIENTO ES EL DIA ACTUAL INMEDIATAMENTE SE LIBERA
                //LA UBICACION DEL VEHICULO DE LO CONTRARIO SE CREA UN EVENTO QUE 
                //LIBERARA LA UBICACION EL DIA DEL ARRENDAMIENTO

                if (date_format(date_create($request->fechasalida),'Y-m-d') === now()->format('Y-m-d')) {
                    $location->availability=1;
                    $location->save();
                }else{

                    DB::unprepared('SET GLOBAL event_scheduler = ON;');
                    $id=str_replace('.','_',uniqid("ORD".$id_orden."DET".$detail->id."_", true));
                    DB::unprepared('
                    CREATE EVENT '.$id.'
                    ON SCHEDULE AT \''.$request->fechasalida.'\'
                    DO
                    BEGIN
                      UPDATE rac.locations SET availability=1 WHERE id='.$location->id.';
                      UPDATE rac.cars SET reserved=null WHERE id='.$id_carro.';
                    END
                    ');

                    $carro->reserved=$id;

                }
                $carro->save();
                break;
            case 4://ENTRADA
                $location=Location::where('availability',1)->first();
                if ($location!==null) {
                    $location->availability=0;
                    $location->save();
                }else{ 
                    return redirect()->back()->withErrors(["ubicacion"=>"No hay espacio disponible para alojar mas vehiculos"]);
                }
                $detail->save();
                $carro->location_id=$location->id;
                $carro->state_id=1;
                $carro->save();
                break;
            default:
                return redirect()->back()->withErrors(["tipomovimiento"=>"Tipo no encontrado"]);
                break;
           
        }
        return redirect()->route('details index',$id_orden);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarUpdateRequest $request,$id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_orden,$id_detalle)
    {
        //dd($id_orden,$id_detalle);
        //SE BUSCA EL DETALLE A ELIMINAR
        $detail=Detail::find($id_detalle);
        if ($detail) {
            //LUEGO SE BUSCA EL ULTIMO MOVIMIENTO DONDE ESTA INVOLUCRADO 
            //EL CARRO QUE PERTENECE AL DETALLE A ELIMINAR
            $last_detail=Detail::where('car_id',$detail->car_id)
                               ->orderBy('created_at','desc')->first();
            if ($detail->id===$last_detail->id) {
                $location=location::where('availability',1)->first();
                $carro=Car::find($detail->car_id);
                switch ($detail->movement_id) {
                    case 1:
                        $carro->state_id=2;
                        $carro->location_id=null;
                        $carro->save();
                        $detail->delete();
                        break;
                    case 2:
                        $carro->location_id=null;
                        $carro->save();
                        $detail->delete();
                        break;
                    case 3:
                        if ($carro->reserved!==null) {
                            DB::unprepared('DROP EVENT IF EXISTS '.$carro->reserved);
                            $carro->reserved=null;
                            $location=location::find($carro->location_id);
                            $location->availability=1;
                            $location->save();
                        }
                        $carro->location_id=null;
                        $carro->save();
                        $detail->delete();
                        break;
                    case 4:
                        if ($carro->location_id!==null) {
                            $location=location::find($carro->location_id);
                            $location->availability=1;
                            $location->save();
                            $carro->location_id=null;
                        }
                        $carro->state_id=2;
                        $carro->save();
                        $detail->delete();
                        break;
                    default:
                        //
                        break;
                }
            }else{
                $detail->delete();
            }
            
        }

    }
}
