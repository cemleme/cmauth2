<?php

namespace Cemleme\Cmauth\controllers;

use Illuminate\Routing\Controller;
use View;
use Redirect;
use Input;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cemleme\Cmauth\models\Notification;
use Cemleme\Cmauth\models\Group;
use Cemleme\Cmauth\models\User;


class NotificationsController extends Controller {
	
	public function __construct() {
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$notifications = Notification::orderBy('created_at','desc')->get();
		$notifications->load('users');

		$users = User::all();
		$groups = Group::all();

		return view('cmauth::notifications.list', compact('notifications', 'users', 'groups'));
	}

	public function mynotifications()
	{
		$notifications = Auth::user()->notifications()->orderBy('created_at', 'desc')->get();

		return view('cmauth::notifications.mylist', compact('notifications'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cmauth::notifications.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$notification = new Notification;
		$notification->fill(Input::all());
		$notification->save();

		return Redirect::to('/cmauth/notifications/')->with('message', 'Notification Created');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$notification = Notification::find($id);
		if($notification->users->contains(Auth::user()->id)){
			$user = $notification->users->find(Auth::user()->id);
			$user->pivot->read_at = Carbon::now();
			$user->pivot->save();
			return view('cmauth::notifications.show', compact('notification'));
		}
		else
			return Redirect::to('/notifications/');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('cmauth::notifications.edit', ['notification' => Notification::find($id)]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$notification = Notification::findOrFail($id);
		$notification->showmodal = null;
		$notification->fill(Input::all());
		$notification->save();
		
		return Redirect::to('/cmauth/notifications/');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$notification = Notification::find($id);
		$notification->users()->detach();
		$notification->delete();

		return Redirect::to('/cmauth/notifications/');
	}

	public function assignGroup(Request $request){
		$notification = Notification::find($request->id);
		$group = Group::find($request->gid);
		$userids = [];
		foreach($group->users as $user){
			$userids[] = $user->id;
		}
		$notification->users()->sync($userids, false);

		return 'Notification assigned to Group '.$group->name;
	}

	public function assignUser(Request $request){
		$notification = Notification::find($request->id);
		$user = User::find($request->uid);
		$notification->users()->sync([$request->uid], false);

		return 'Notification assigned to User '.$user->name;
	}

	public function removeUser(Request $request){
		$notification = Notification::find($request->id);
		$user = User::find($request->uid);
		$notification->users()->detach($request->uid);

		return 'Notification removed from User '.$user->name;
	}

	public function assignAll($id){
		$notification = Notification::find($id);
		$users = User::all();
		$userids = [];
		foreach($users as $user){
			$userids[] = $user->id;
		}
		$notification->users()->sync($userids, false);

		return Redirect::to('/cmauth/notifications/')->with('message', 'Notification assigned to All Users');
	}

	public function removeAll($id){
		$notification = Notification::find($id);
		$notification->users()->sync([]);

		return Redirect::to('/cmauth/notifications/')->with('message', 'Notification removed from All Users');
	}

	public function modalRead(){
		$user = Auth::user();
		$notifications = $user->notifications()->unread()->get();
		foreach($notifications as $notification){
			$notification->pivot->read_at = Carbon::now();
			$notification->pivot->save();
		}
		return "notifications are set as read";
	}

}
