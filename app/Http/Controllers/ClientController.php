<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function index()
    {
        return view('backend.clients.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'company_name' => 'required',
            'client_name'  => 'required',
            'email'        => 'required|email|unique:clients',
            'contact'      => 'required',
            'service'      => 'required',
            'expiry_date'  => 'required',
            'photo'        => 'required|mimes:jpg,png,pdf',
        ]);

        try {
            $fileName = time().'_'.'.'. $request->photo->extension();
            $request->photo->move(public_path('files'), $fileName);

            $client = new Client();
            $client->client_id = 'PRO-'.rand(0,99999);
            $client->company_name = $request->company_name;
            $client->client_name = $request->client_name;
            $client->email = $request->email;
            $client->contact = $request->contact;
            $client->service = $request->service;
            $client->expiry_date = $request->expiry_date;
            $client->photo = $fileName;
            $client->save();
            return redirect()->back()->with('success', 'Add New Client');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Some Think is wrong, Please Try again');
        }
    }
}
