<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LevelController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = \App\Level::all();
		return view('level/all')->with('data', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = \App\Level::all();
		return view('level/add')->with('data', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$addnew = new \App\Level;
		$addnew->parent = is_null(Input::get('parent'))?0:Input::get('parent');
		$addnew->nama = Input::get('nama');
		$addnew->posisi = Input::get('posisi');
		$addnew->save();

		return redirect(url('level'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$all = \App\Level::all();
		$data = \App\Level::where('id', $id)->first();
		return view('level/edit')->with('data', $data)->with('all', $all);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = \App\Level::find($id);
		$data->parent = Input::get('parent');
		$data->nama = Input::get('nama');
		$data->posisi = Input::get('posisi');
		$data->save();

		return redirect(url('level'));
	}

	public function view()
	{
		$data = \App\Level::all();
		return view('level.view')->with('data', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$data = \App\Level::find($id)->delete();
		return redirect(url('level'));;
	}

}
