<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $permissions = Permission::all();
      return view('manage.permissions.index')->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('manage.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->permission_type == 'basic') {
        $this->validate($request, [
          'display_name' => 'required|max:255',
          'name' => 'required|max:255|alphadash|unique:permissions,name',
          'description' => 'sometimes|max:255'
        ]);
        
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        
        if($permission->save()){
          Session::flash('success', 'Permission has been successfuly created');
          return redirect()->route('permissions.index');
        } else {
          Session::flash('error', 'Something went wrong with creating Permission');
          return redirect()->route('permissions.create');
        } 
      } elseif ($request->permission_type == 'crud') {
        $this->validate($request, [
          'resource' => 'required|min:3|max:100|alpha'
        ]);
        
        $crud = explode(',', $request->crud_selected);
        if(count($crud) > 0) {
          foreach($crud as $c) {
            $slug = strtolower($c) . '-' . strtolower($request->resource);
            $display_name = ucwords($c . " " . $request->resource);
            $description = "Allows a user to " . strtoupper($c) . ' a ' . ucwords($request->resource);
            
            $permission = new Permission();
            $permission->name = $slug;
            $permission->display_name = $display_name;
            $permission->description = $description;
            $permission->save();
          }
          Session::flash('success', 'Permission has been successfuly added');
          return redirect()->route('permissions.index');
        }
      } else {
        return redirect()->route('permissions.create')->withInput();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $permission = Permission::findOrFail($id);
      return view('manage.permissions.show')->withPermission($permission);
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
        return view('manage.permissions.edit')->withPermission($permission);
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
        'display_name' => 'required|max:255',
        'description' => 'sometimes|max:255'
      ]);
      
      $permission = Permission::findOrFail($id);
      $permission->display_name = $request->display_name;
      $permission->description = $request->description;
      if($permission->save()){
        Session::flash('success', 'Updated the Permission successfully');
        return redirect()->route('permissions.show', $id);
      } else {
        Session::flash('error', 'Something went wrong with Updating the Permission.');
        return redirect()->route('permissions.edit', $id);
      }
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
}
