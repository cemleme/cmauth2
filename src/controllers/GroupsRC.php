<?php

namespace Cemleme\Cmauth\controllers;

use Illuminate\Routing\Controller;
use View;
use Redirect;
use Input;

use Cemleme\Cmauth\models\Group;


class GroupsRC extends Controller {
	
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
		return view('cmauth::groups.list', ['groups' => Group::all()]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cmauth::groups.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$group = new Group;
		$group->fill(Input::all());
		$group->save();

		return Redirect::to('/cmauth/groups')->with('message', 'Group Created');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//return view('cmauth::listgroups', ['groups' => Group::find($id)]);
		//$this->layout->content = View::make('/resources.groups.show')->with('group', Group::find($id));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('cmauth::groups.edit', ['group' => Group::find($id)]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$group = Group::findOrFail($id);
		$group->fill(Input::all());
		$group->save();
		
		return Redirect::to('/cmauth/groups');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$group = Group::find($id);
		$group->permissions()->detach();
		$group->users()->detach();
		$group->delete();

		return Redirect::to('/cmauth/groups');
	}


}
