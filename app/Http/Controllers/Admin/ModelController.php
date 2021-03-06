<?php

namespace App\Http\Controllers\Admin;

use App\Models\Model;
use Illuminate\Http\Request;
use App\Http\Requests\ModelRequest;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $models = Model::orderBy('id', 'desc')
                         ->where('name','like','%'.$search.'%')
                         ->paginate(10);

        return view('admin/models', compact('models'));
    }

    public function create() {
        return view('admin/add_model');
    }

    public function edit($id) {
        $model = Model::find($id);
        return view('admin/edit_model', compact('model'));
    }

    public function destroy($id) {
        $model = Model::find($id);
        $model->delete();

        return redirect()->route('admin models');
    }

    public function store(ModelRequest $request)
    {
        // $model_delete = Model::onlyTrashed()
        //     ->where('name', $request->name)
        //     ->first();

        // if ($model_delete == NULL) {
            $model = new Model;
            $model->name = $request->name;
            $model->save();
        // } else {
        //     $model_delete->restore();
        //     $model_delete->update($request->except(['']));
        // }

        return redirect()->route('admin models');
    }

    public function update(ModelRequest $request, $id) {
        $model = Model::find($id);

        $model->name = $request->name;
        $model->save();

        return redirect()->route('admin models');
    }
}
