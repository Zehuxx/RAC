<?php

namespace App\Http\Controllers\Admin;

use App\Models\CarType;
use Illuminate\Http\Request;
use App\Http\Requests\CarTypeRequest;
use App\Http\Controllers\Controller;

class CarTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carTypes = CarType::orderBy('id', 'desc')->paginate(10);

        return view('admin/types', compact('carTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/add_type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarTypeRequest $request)
    {
        $carType_delete = CarType::onlyTrashed()
            ->where('name', $request->name)
            ->first();

        if ($carType_delete == NULL) {
            $carType = new CarType();
            $carType->name = $request->name;
            $carType->cost = $request->cost;
            $carType->save();
        } else {
            $carType_delete->restore();
            $carType_delete->update($request->except(['']));
        }

        return redirect()->route('admin types');
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
        $carType = CarType::find($id);

        return view('admin/edit_type', compact('carType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarTypeRequest $request, $id)
    {
        $carType_delete = CarType::onlyTrashed()
            ->where('name', $request->name)
            ->first();

            $carType = CarType::find($id);

        if ($carType_delete == NULL) {
            $carType->update($request->except(['']));
        } else {
            $carType->delete();
            $carType_delete->restore();
            $carType_delete->update($request->except(['']));
        }

        return redirect()->route('admin types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carType = CarType::find($id);

        $carType->delete();

        return redirect()->route('admin types');
    }
}
