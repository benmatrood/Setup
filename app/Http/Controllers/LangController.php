<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importer la classe Inertia
use Inertia\Inertia;

class LangController extends Controller
{
    //Changer la langue
    public function changeLang(Request $request)
    {
        // dd($request);
        //Validation
        // $request->validate([
        //     'lang' => ['required', 'in:en,fr']
        // ]);
        app()->setLocale($request->lang);
        // $request->session()->put('locale', $request->lang);
        // $intendedRoute = redirect()->intended()->getTargetUrl();
        // return Inertia::location($intendedRoute);
        return response()->json([
            'success' => "ok",
            'locale' => app()->getLocale(),
            'lang' => $request->lang
        ]);
    }
}
