<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use App\Http\Controllers\Controller;
use App\Charts\reportes;


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


 

    public function index()
    {
        $line_chart = new reportes;
        $dataset=$line_chart->dataset('Pie Chart Demo','line',[15,25,50]);
        $dataset->Color(collect([$this->random_color()]));
        $dataset=$line_chart->dataset('Pie Chart Demo','line',[11,5,39]);
        $dataset->Color(collect([$this->random_color()]));
        $line_chart->labels(['Product 1', 'Product 2', 'Product 3']);
        $line_chart->width(1000);
        $line_chart->height(500);
        
        $pie_chart = new reportes;
        $dataset=$pie_chart->dataset('Pie Chart Demo','pie',[15,25,50]);
        $dataset->backgroundColor(collect([$this->random_color(),$this->random_color(),$this->random_color()]));
        $pie_chart->labels(['Product 1', 'Product 2', 'Product 3']);
        $pie_chart->width(1000);
        $pie_chart->height(500);
        
        $bar_chart = new reportes;
        $dataset=$bar_chart->dataset('Pie Chart Demo','bar',[15,25,50]);
        $dataset->backgroundColor(collect([$this->random_color(),$this->random_color(),$this->random_color()]));
        
        $bar_chart->labels(['Product 1', 'Product 2', 'Product 3']);
        $bar_chart->width(1000);
        $bar_chart->height(500);
 

        return view('admin/reports',compact('line_chart','pie_chart','bar_chart'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate(ReportRequest $request)
    {
       return dd($request->all());
    }

}
