<?php

namespace App\Http\Controllers\User;

use Image;
use App\Models\Car;
use App\Models\CarType;
use App\Models\Detail;
use App\Models\Order;
use App\Models\Location;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;  
use App\Http\Controllers\Controller;


class OrderController extends Controller
{ 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index(Request $request)
    {
        $search = $request->input('search');
        $orders=DB::table('orders as a')
            ->select(DB::raw("concat(f.name,' ',f.last_name) as customername"),"a.id","a.created_at","b.cost")
            ->leftjoin(DB::raw("(select a.order_id,sum(c.cost) as cost
                                from details as a
                                left join cars b 
                                on a.car_id=b.id
                                LEFT join car_types c 
                                on b.car_type_id=c.id
                                where a.deleted_at is null 
                                and b.deleted_at is null 
                                and c.deleted_at is null
                                group by a.order_id) as b"), 'a.id', '=', 'b.order_id')
            ->leftJoin('customers as e', 'a.customer_id', '=', 'e.id')
            ->leftJoin('persons as f', 'e.id', '=', 'f.id')
            ->whereNull('a.deleted_at')
            ->where(function($q)use($search){ 
                $q->where('a.created_at','like', '%'.$search.'%')
                ->orWhere('f.name','like', '%'.$search.'%')
                ->orWhere('f.last_name','like', '%'.$search.'%');
            })
            ->orderby('a.created_at','desc')
            //->toSql();
            ->paginate(10);
        //return $orders;
        return view('user.order_view',compact('orders'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $clientes=Customer::all();
        return view('user.new_order',compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderStoreRequest $request)
    {

        $order= new Order();
        $order->customer_id = $request->input("cliente");
        $order->cost=0;
        $order->save();

        return redirect()->route('order index');
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
    public function update($id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_orden)
    {
        $detalles=Detail::where('order_id',$id_orden)
                        ->get();
        foreach ($detalles as $detalle) {
            //LUEGO SE BUSCA EL ULTIMO MOVIMIENTO DONDE ESTA INVOLUCRADO 
            //EL CARRO QUE PERTENECE AL DETALLE A ELIMINAR
            $last_detail=Detail::where('car_id',$detalle->car_id)
                               ->orderBy('created_at','desc')->first();
            //dd($last_detail);
            if ($detalle->id===$last_detail->id) {
                $location=location::where('availability',1)->first();
                $carro=Car::find($detalle->car_id);
                switch ($detalle->movement_id) {
                    case 1://mantenimiento
                        $carro->state_id=2;
                        $carro->location_id=null;
                        $carro->save();
                        $detalle->delete();
                        break;
                    case 2://robo
                        $carro->location_id=null;
                        $carro->save();
                        $detalle->delete();
                        break;
                    case 3://arrendamiento
                        if ($carro->reserved!==null) {
                            DB::unprepared('DROP EVENT IF EXISTS '.$carro->reserved);
                            $carro->reserved=null;
                            $location=location::find($carro->location_id);
                            $location->availability=1;
                            $location->save();
                        }
                        $carro->location_id=null;
                        $detalle->delete();
                        $carro->save();
                        break;
                    case 4://entrada
                        if ($carro->location_id!==null) {
                            $location=location::find($carro->location_id);
                            $location->availability=1;
                            $location->save();
                            $carro->location_id=null;
                        }

                        $carro->state_id=2;
                        $carro->save();
                        $detalle->delete();
                        break;
                    default:
                        //
                        break;
                }
            }else{
                $detalle->delete();
            }
        }
        $orden=Order::find($id_orden);
        $orden->delete();
        return "yes";
    }
}
