<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact as ContactModel;

class Contact extends Controller
{
	public function create()
	{
		return view('contact.create',[
			'msg' => session('msg')
		]);
	}

	public function store(ContactStoreRequest $request)
	{
		$data =  $request->only('name', 'email', 'subject', 'message');

		ContactModel::create($data);

		return redirect()->route('contact.create')->with('msg', [
			'type' => 'success',
			'contents' => 'Contact successful sent.',
		]);
	}
}
