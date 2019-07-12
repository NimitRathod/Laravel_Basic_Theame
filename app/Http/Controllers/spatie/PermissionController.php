<?php

namespace App\Http\Controllers\spatie;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Permission::orderBy('id','DESC')->get();
        // dd($data);
        // return $data;
        return view('backend.templates.permission.show',compact('data'));
        // ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.templates.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name'
            ]
        );
        // dd($request->all());

        $role = Permission::create(['name' => $request->input('name')]);

        return redirect()->route('permissions.index')
        ->with('success','Permission created successfully');
        // Permission::save();
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
        $permission = Permission::findOrFail($id);
        // dd($permission);

        return view('backend.templates.permission.edit',compact('permission'));
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

        $this->validate($request, [
            'name' => 'required|unique:permissions,name'
            ]
        );
        // dd($request->all());

        $input = $request->all();
        $permission = Permission::find($id);
        $permission->update($input);

        return redirect()->route('permissions.index')
                        ->with('success','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $permissionDestroy = Permission::find($id);
        $permissionDestroy->delete();

        return redirect()->route('permissions.index')
        ->with('success',' Permission successfully');
    }


    public function getMembers(Request $request) {

        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');


        $search = (isset($filter['value']))? $filter['value'] : false;

        $total_members = 1000; // get your total no of data;
        $members = $this->methodToGetMembers($start, $length); //supply start and length of the table data

        $data = array(
            'draw' => $draw,
            'recordsTotal' => $total_members,
            'recordsFiltered' => $total_members,
            'data' => $members,
        );

        echo json_encode($data);
    }
}
