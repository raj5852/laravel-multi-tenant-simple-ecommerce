<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    function register()
    {
        return view('register');
    }

    function registerStore(Request $request){

        $data = $request->validate([
            'email' => 'required|string|lowercase|email|max:255',
            'domain' => 'required|string|max:255',
            'password' => ['required'],
        ]);

        $tenant =  Tenant::create($data);
        $tenant->domains()->create(['domain'=>$request->domain]);

        return redirect()->away(tenant_route(Str::slug($request->domain) . '.' . config('tenancy.central_domains')[1] ,'admin.login'));

    }
}
