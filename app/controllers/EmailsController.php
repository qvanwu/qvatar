<?php

class EmailsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $input = Input::only('email');

        $validator = Validator::make(
            $input,
            [
                'email'						=> 'required|unique:emails|email|min:5',
            ]
        );

        if($validator->fails()) {
            return Redirect::to('register')->withErrors($validator)->withInput();
        }
        else {
            $email = new Email();
            $email->user_id = Auth::user()->id;
            $email->email = Input::get('email');
            $email->md5 = md5( strtolower(trim(Input::get('email'))));

            $email->save();
            return Redirect::to('/');
        }

    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Email::destroy($id);
        return Redirect::to('/');
	}

    public function add()
    {
        return View::make('addEmail');
    }


}
