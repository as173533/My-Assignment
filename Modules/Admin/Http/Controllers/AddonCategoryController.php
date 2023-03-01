<?php

namespace Modules\Admin\Http\Controllers;

use Datatables;
use App\Models\Addon;
use App\Models\AddonCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class AddonCategoryController extends AdminController {

    //*** JSON Request
    public function datatables() {
        $datas = AddonCategory::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
                        ->addIndexColumn()
                        ->editColumn('status', function ($model) {
                            if ($model->status == '0') {
                                $status = '<span class="badge badge-warning"><i class="icofont-warning"></i>Inactive</span>';
                            } else if ($model->status == '1') {
                                $status = '<span class="badge badge-success"><i class="icofont-check"></i>Active</span>';
                            } else if ($model->status == '3') {
                                $status = '<span class="badge badge-danger"><i class="icofont-close"></i>Delete</span>';
                            }
                            return $status;
                        })
                        ->editColumn('addons', function ($model) {
                            $addons=explode(",",$model->addons);
                            $name=[];
                            foreach($addons as $i=> $addon){
                                
                                $data=Addon::where('id',$addon)->where('status','=', '1')->first();
                                
                                $name[$i]=$data->name;
                            }
                            $retrnvalue=implode(",",$name);
                            // print_r($retrnvalue);
                            //     exit;
                            return $retrnvalue;
                        })
                        ->addColumn('action', function ($model) {
                            return
                                    '<a href="' . Route("admin-addon-cat-edit", [$model->id]) . '" class="btn btn-xs btn-primary pull-left"><i class="fa fa-edit"></i> Edit</a>' .
                                    '<a href="javascript:;" onclick="deleteAddonCategory(this);" data-href="' . Route("admin-addon-cat-delete", [$model->id]) . '" class="btn btn-xs btn-primary pull-left"><i class="fa fa-trash"></i> Delete</a>';
                        })
                        ->rawColumns(['status', 'action'])
                        ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index() {
        return view('admin::addoncategories.list');
    }

    //*** GET Request
    public function create() {
        $addons = Addon::where('status','=', '1')->get();
        return view('admin::addoncategories.add',compact('addons'));
    }

    //*** POST Request
    public function store(Request $request) {
        //--- Validation Section
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'addons' => 'required',
                        ]
        );
        $validator->after(function($validator) use($request) {
            
        });

        if ($validator->passes()) {
            $data = new AddonCategory();
            $input = $request->all();
            if(isset($input['addons'])){
                $addons=implode(",",$input['addons']);
                $input['addons']=$addons;
            }
            // print_r($addons);
            // exit;
            
            $data->fill($input)->save();

            return redirect()->route('admin-addon-cat-index')->with('success_msg', 'Addon Category created successfully.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput()->with('error_msg', 'Something went wrong please check your input.');
        }
    }

    //*** GET Request
    public function edit($id) {
        $addons = Addon::where('status','=', '1')->get();
        $data = AddonCategory::findOrFail($id);
        return view('admin::addoncategories.edit', compact('data','addons'));
    }

    //*** POST Request
    public function update(Request $request, $id) {
        //--- Validation Section
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'addons' => 'required',
                        ]
        );
        $validator->after(function($validator) use($request) {
            
        });
        if ($validator->passes()) {
            //--- Logic Section
            $data = AddonCategory::findOrFail($id);
            $input = $request->all();
            if(isset($input['addons'])){
                $addons=implode(",",$input['addons']);
            }
            // print_r($addons);
            // exit;
            $input['addons']=$addons;

            $data->update($input);
            
            return redirect()->route('admin-addon-cat-index')->with('success_msg', 'Addon Category updated successfully.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput()->with('error_msg', 'Something went wrong please check your input.');
        }
        //--- Redirect Section Ends
    }

    

    //*** GET Request Delete
    public function destroy($id) {
        $data = [];
        $model = AddonCategory::findOrFail($id);
        
        $model->delete();
        //--- Redirect Section
        $data['status'] = 200;
        $data['msg'] = 'Data Deleted Successfully.';
        return response()->json($data);
        //--- Redirect Section Ends
    }

}
