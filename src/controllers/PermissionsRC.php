<?php

namespace Cemleme\Cmauth\controllers;

use Illuminate\Routing\Controller;
use View;
use Redirect;
use Input;

use Cemleme\Cmauth\models\Permission;

class PermissionsRC extends Controller {
	
	public function __construct() {
		$this->middleware('acl:AppsUsersEdit'); 
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('cmauth::permissions.list', ['permissions' => Permission::all()]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cmauth::permissions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$permission = new Permission;
		$permission->fill(Input::all());
		$permission->save();

		return Redirect::to('/cmauth/permissions')->with('message', 'Permission Created');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//$this->layout->content = View::make('/resources.permissions.show')->with('permission', Permission::find($id));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('cmauth::permissions.edit', ['permission' => Permission::find($id)]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$permission = Permission::findOrFail($id);
		$permission->fill(Input::all());
		$permission->save();
		
		return Redirect::to('/cmauth/permissions');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$permission = Permission::find($id);
		//$permission->groups()->detach();
		$permission->delete();

		//dd(Session::get('queryDebug'));

		return Redirect::to('/cmauth/permissions');
	}


}
