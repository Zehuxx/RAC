<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\Car;
use App\Models\Detail;
use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Charts\reportes;
use \Carbon\Carbon;
setlocale(LC_TIME, 'es_ES.UTF-8');
Carbon::setLocale('es');
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    
    function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    function random_color() {
        return '#'.$this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    }


 

    public function index($grafica=null,$info=null,$repor_id=null)
    {
        return view('admin/reports',compact('grafica','info','repor_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate(ReportRequest $request)
    {

       //variable para grafica
       $grafica_chart = new reportes;
       $grafica_chart->width(800);
       $grafica_chart->height(400); 

       //arrays usados paa datos de las graficas
       $year=[];
       $data=[];
       $colors=[];

       //usado por las graficas
       $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

       //consulta arrendamientos ingresados por año
       $employee_year = DB::table('details as a')
                    ->select(DB::raw('DATE_FORMAT(a.departure_date, "%Y") as "year"'),
                             DB::raw('count(a.id) as total'),
                             DB::raw('c.name as "tipo"'),
                             DB::raw('concat(d.name," ",d.last_name) as "nombre"'))
                    ->leftjoin('cars as b', 'a.car_id', '=', 'b.id')
                    ->leftjoin('car_types as c', 'b.car_type_id', '=', 'c.id')
                    ->leftjoin('persons as d', 'a.employee_id', '=', 'd.id')
                    ->where('a.movement_id', '=', 3)
                    ->where('a.departure_date', '>', $request->fechainicial)
                    ->whereNull('a.deleted_at')
                    ->groupBy(DB::raw('DATE_FORMAT(a.departure_date, "%Y")'))
                    ->groupBy(DB::raw('concat(d.name," ",d.last_name)'))
                    ->groupBy('c.name');

        //consulta arrendamientos ingresados por año de acuerdo a una identidad
        $employee_year_id = DB::table('details as a')
                    ->select(DB::raw('DATE_FORMAT(a.departure_date, "%Y") as "year"'),
                             DB::raw('count(a.id) as total'),
                             DB::raw('c.name as "tipo"'),
                             DB::raw('concat(d.name," ",d.last_name) as "nombre"'))
                    ->leftjoin('cars as b', 'a.car_id', '=', 'b.id')
                    ->leftjoin('car_types as c', 'b.car_type_id', '=', 'c.id')
                    ->leftjoin('persons as d', 'a.employee_id', '=', 'd.id')
                    ->where('d.identification_card','=',$request->input('text-fil'))
                    ->where('a.movement_id', '=', 3)
                    ->where('a.departure_date', '>', $request->fechainicial)
                    ->whereNull('a.deleted_at')
                    ->groupBy(DB::raw('DATE_FORMAT(a.departure_date, "%Y")'))
                    ->groupBy(DB::raw('concat(d.name," ",d.last_name)'))
                    ->groupBy('c.name');

        //arrendamiento ingresados mensual
        $employee_months = DB::table('details as a')
                    ->select(DB::raw('DATE_FORMAT(a.departure_date, "%Y") as "year"'),
                             DB::raw('DATE_FORMAT(a.departure_date, "%m") as "month"'),
                             DB::raw('count(a.id) as total'),
                             DB::raw('c.name as "tipo"'),
                             DB::raw('concat(d.name," ",d.last_name) as "nombre"'))
                    ->leftjoin('cars as b', 'a.car_id', '=', 'b.id')
                    ->leftjoin('car_types as c', 'b.car_type_id', '=', 'c.id')
                    ->leftjoin('persons as d', 'a.employee_id', '=', 'd.id')
                    ->where('a.movement_id', '=', 3)
                    ->where('a.departure_date', '>', $request->fechainicial)
                    ->whereNull('a.deleted_at')
                    ->groupBy(DB::raw('DATE_FORMAT(a.departure_date, "%m")'))
                    ->groupBy(DB::raw('DATE_FORMAT(a.departure_date, "%Y")'))
                    ->groupBy(DB::raw('concat(d.name," ",d.last_name)'))
                    ->groupBy('c.name')
                    ->orderBy('year', 'asc');

        //arrendamiento carros ingresados mensual de acuerdo a identidad
        $employee_months_id = DB::table('details as a')
                    ->select(DB::raw('DATE_FORMAT(a.departure_date, "%Y") as "year"'),
                             DB::raw('DATE_FORMAT(a.departure_date, "%m") as "month"'),
                             DB::raw('count(a.id) as total'),
                             DB::raw('c.name as "tipo"'),
                             DB::raw('concat(d.name," ",d.last_name) as "nombre"'))
                    ->leftjoin('cars as b', 'a.car_id', '=', 'b.id')
                    ->leftjoin('car_types as c', 'b.car_type_id', '=', 'c.id')
                    ->leftjoin('persons as d', 'a.employee_id', '=', 'd.id')
                    ->where('d.identification_card','=',$request->input('text-fil'))
                    ->where('a.movement_id', '=', 3)
                    ->where('a.departure_date', '>', $request->fechainicial)
                    ->whereNull('a.deleted_at')
                    ->groupBy(DB::raw('DATE_FORMAT(a.departure_date, "%m")'))
                    ->groupBy(DB::raw('DATE_FORMAT(a.departure_date, "%Y")'))
                    ->groupBy('c.name')
                    ->groupBy(DB::raw('concat(d.name," ",d.last_name)'))
                    ->orderBy('year', 'asc');

       //consulta arrendamiento carros por año
       $car_year = DB::table('details as a')
                    ->select(DB::raw('DATE_FORMAT(a.departure_date, "%Y") as "year"'),
                             DB::raw('count(a.id) as total'),
                             DB::raw('c.name as "tipo"'))
                    ->leftjoin('cars as b', 'a.car_id', '=', 'b.id')
                    ->leftjoin('car_types as c', 'b.car_type_id', '=', 'c.id')
                    ->where('a.movement_id', '=', 3)
                    ->where('a.departure_date', '>', $request->fechainicial)
                    ->whereNull('a.deleted_at')
                    ->groupBy(DB::raw('DATE_FORMAT(a.departure_date, "%Y")'))
                    ->groupBy('c.name');

        //consulta arrendamiento carros por año de acuerdo a una placa
        $car_year_license = DB::table('details as a')
                    ->select(DB::raw('DATE_FORMAT(a.departure_date, "%Y") as "year"'),
                             DB::raw('count(a.id) as total'),
                             DB::raw('c.name as "tipo"'))
                    ->leftjoin('cars as b', 'a.car_id', '=', 'b.id')
                    ->leftjoin('car_types as c', 'b.car_type_id', '=', 'c.id')
                    ->where('b.license_plate','=',$request->input('text-fil'))
                    ->where('a.movement_id', '=', 3)
                    ->where('a.departure_date', '>', $request->fechainicial)
                    ->whereNull('a.deleted_at')
                    ->groupBy(DB::raw('DATE_FORMAT(a.departure_date, "%Y")'))
                    ->groupBy('c.name');

        //arrendamiento carros mensual
        $car_months = DB::table('details as a')
                    ->select(DB::raw('DATE_FORMAT(a.departure_date, "%Y") as "year"'),
                             DB::raw('DATE_FORMAT(a.departure_date, "%m") as "month"'),
                             DB::raw('count(a.id) as total'),
                             DB::raw('c.name as "tipo"'))
                    ->leftjoin('cars as b', 'a.car_id', '=', 'b.id')
                    ->leftjoin('car_types as c', 'b.car_type_id', '=', 'c.id')
                    ->where('a.movement_id', '=', 3)
                    ->where('a.departure_date', '>', $request->fechainicial)
                    ->whereNull('a.deleted_at')
                    ->groupBy(DB::raw('DATE_FORMAT(a.departure_date, "%m")'))
                    ->groupBy(DB::raw('DATE_FORMAT(a.departure_date, "%Y")'))
                    ->groupBy('c.name')
                    ->orderBy('year', 'asc');

        //arrendamiento carros mensual de acuerdo a placa
        $car_months_license = DB::table('details as a')
                    ->select(DB::raw('DATE_FORMAT(a.departure_date, "%Y") as "year"'),
                             DB::raw('DATE_FORMAT(a.departure_date, "%m") as "month"'),
                             DB::raw('count(a.id) as total'),
                             DB::raw('c.name as "tipo"'))
                    ->leftjoin('cars as b', 'a.car_id', '=', 'b.id')
                    ->leftjoin('car_types as c', 'b.car_type_id', '=', 'c.id')
                    ->where('b.license_plate','=',$request->input('text-fil'))
                    ->where('a.movement_id', '=', 3)
                    ->where('a.departure_date', '>', $request->fechainicial)
                    ->whereNull('a.deleted_at')
                    ->groupBy(DB::raw('DATE_FORMAT(a.departure_date, "%m")'))
                    ->groupBy(DB::raw('DATE_FORMAT(a.departure_date, "%Y")'))
                    ->groupBy('c.name')
                    ->orderBy('year', 'asc');

        if ((int)$request->input('slc-reporte')===2) { //carros
            if ((int)$request->input('tiempo')===1) { //Anual
                //si hay una placa a buscar
                if ($request->input('text-fil')==null) {
                    //se ejecuta la consulta
                    $car_year=$car_year->get();
                }else{
                    //sino se busca por placa se traen todos los carros
                    $car_year_license=$car_year_license->get();
                    //se cambia el valor de variable
                    $car_year=$car_year_license;
                }

                //si no hay resultados
                if (sizeof($car_year)==0) {
                    return $this->index()->withErrors(['NR'=>'No se encontraron registros.']);
                }else{
                    $info=$car_year;
                    $repor_id=1;
                }

                foreach ($car_year as $item) {
                    //de todos los registros traidos por la consulta
                    //se separan por año, total, y se generan lso colores aleatorios para las graficas
                    $years[]=$item->year.' '.$item->tipo;
                    $data[]=$item->total;
                    $colors[]=$this->random_color();
                }

                //se añaden los labels a la grafica
                $grafica_chart->labels($years);

                //se verifica la grafica a mostrar
                $option=(int)$request->input('slc-grafica');
                switch ($option) {
                    case 1: //Barras
                        //se cargan los datos, titulo, a la grafica
                        $dataset=$grafica_chart->dataset('Arrendamientos anual por tipo','bar',$data);
                        //se cargan los colores a la grafica
                        $dataset->backgroundColor(collect($colors));
                    
                        break;
                    case 2: //Lineas
                        $dataset=$grafica_chart->dataset('Arrendamientos anual por tipo','line',$data);
                        //la grafica de lineas solo ocupa un color
                        $dataset->Color(collect(['#20c997']));
                        
                        break;
                    case 3: //Pastel

                        $dataset=$grafica_chart->dataset('Arrendamientos anual por tipo','pie',$data);
                        $dataset->backgroundColor(collect($colors));
                        break;
                    default:
                        //en caso de algun error se devuelve null como grafica
                        //que en la vista se interpreta como que no se esta buscando nada
                        $grafica_chart=null;
                        break;
                }
            }else{

                if ($request->input('text-fil')==null) {
                    $car_months=$car_months->get();
                }else{
                    $car_months_license=$car_months_license->get();
                    $car_months=$car_months_license;
                }

                //si no hay resultados
                if (sizeof($car_months)==0) {
                    return $this->index()->withErrors(['NR'=>'No se encontraron registros.']);
                }else{
                    $info=$car_months;
                    $repor_id=2;
                }
                
                foreach ($car_months as $item) {
                    $fecha=Carbon::createFromFormat('m',$item->month)->month;
                    $mes = $meses[$fecha-1];
                    $year[]=$item->year.' '.$mes.' '.$item->tipo;
                    $data[]=$item->total;
                    $colors[]=$this->random_color();
                }
                
                $grafica_chart->labels($year);

                $option=(int)$request->input('slc-grafica');
                switch ($option) {
                    case 1: //Barras
                        $dataset=$grafica_chart->dataset('Arrendamiento mensual por tipo','bar',$data);
                        $dataset->backgroundColor(collect($colors));
                    
                        break;
                    case 2: //Lineas
                        $dataset=$grafica_chart->dataset('Arrendamiento mensual por tipo','line',$data);
                        $dataset->Color(collect(['#20c997']));
                        
                        break;
                    case 3: //Pastel

                        $dataset=$grafica_chart->dataset('Arrendamiento mensual por tipo','pie',$data);
                        $dataset->backgroundColor(collect($colors));
                        break;
                    default:
                        $grafica_chart=null;
                        break;
                }
            }
        }else{
            if ((int)$request->input('tiempo')===1) {//Anual
                //si hay una identidad a buscar
                if ($request->input('text-fil')==null) {
                    //se ejecuta la consulta
                    $employee_year=$employee_year->get();
                }else{
                    //sino se busca por identidad 
                    $employee_year_id=$employee_year_id->get();
                    //se cambia el valor de variable
                    $employee_year=$employee_year_id;
                }

                //si no hay resultados
                if (sizeof($employee_year)==0) {
                    return $this->index()->withErrors(['NR'=>'No se encontraron registros.']);
                }else{
                    $info=$employee_year;
                    $repor_id=3;
                }

                foreach ($employee_year as $item) {
                    //de todos los registros traidos por la consulta
                    //se separan por año, total, y se generan lso colores aleatorios para las graficas
                    $years[]=$item->year.' '.$item->tipo.' '.$item->nombre;
                    $data[]=$item->total;
                    $colors[]=$this->random_color();
                }

                //se añaden los labels a la grafica
                $grafica_chart->labels($years);

                //se verifica la grafica a mostrar
                $option=(int)$request->input('slc-grafica');
                switch ($option) {
                    case 1: //Barras
                        //se cargan los datos, titulo, a la grafica
                        $dataset=$grafica_chart->dataset('Arrendamiento anual por tipo','bar',$data);
                        //se cargan los colores a la grafica
                        $dataset->backgroundColor(collect($colors));
                    
                        break;
                    case 2: //Lineas
                        $dataset=$grafica_chart->dataset('Arrendamiento anual por tipo','line',$data);
                        //la grafica de lineas solo ocupa un color
                        $dataset->Color(collect(['#20c997']));
                        
                        break;
                    case 3: //Pastel

                        $dataset=$grafica_chart->dataset('Arrendamiento anual por tipo','pie',$data);
                        $dataset->backgroundColor(collect($colors));
                        break;
                    default:
                        //en caso de algun error se devuelve null como grafica
                        //que en la vista se interpreta como que no se esta buscando nada
                        $grafica_chart=null;
                        break;
                }
            }else{//Mensual
                if ($request->input('text-fil')==null) {
                    $employee_months=$employee_months->get();
                }else{
                    $employee_months_id=$employee_months_id->get();
                    $employee_months=$employee_months_id;
                }

                //si no hay resultados
                if (sizeof($employee_months)==0) {
                    return $this->index()->withErrors(['NR'=>'No se encontraron registros.']);
                }else{
                    $info=$employee_months;
                    $repor_id=4;
                }
                
                foreach ($employee_months as $item) {
                    $fecha=Carbon::createFromFormat('m',$item->month)->month;
                    $mes = $meses[$fecha-1];
                    $year[]=$item->year.' '.$mes.' '.$item->tipo.' '.$item->nombre;
                    $data[]=$item->total;
                    $colors[]=$this->random_color();
                }
                
                $grafica_chart->labels($year);

                $option=(int)$request->input('slc-grafica');
                switch ($option) {
                    case 1: //Barras
                        $dataset=$grafica_chart->dataset('Arrendamiento mensual por tipo','bar',$data);
                        $dataset->backgroundColor(collect($colors));
                    
                        break;
                    case 2: //Lineas
                        $dataset=$grafica_chart->dataset('Arrendamiento mensual por tipo','line',$data);
                        $dataset->Color(collect(['#20c997']));
                        
                        break;
                    case 3: //Pastel

                        $dataset=$grafica_chart->dataset('Arrendamiento mensual por tipo','pie',$data);
                        $dataset->backgroundColor(collect($colors));
                        break;
                    default:
                        $grafica_chart=null;
                        break;
                }
            }
        }      

        return $this->index($grafica_chart,$info,$repor_id);
                     
    }

    public function pdf(Request $request){
        $info=json_decode($request->info);
        $repor_id=(int)$request->repor_id;

        $pdf = PDF::loadView('report', compact('info','repor_id'));
        return $pdf->stream('Reporte.pdf',array('Attachment'=>false));
    }

}
