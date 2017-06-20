<?php

namespace Laravision\Translater\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravision\Translater\Http\Models\Translater as TranslaterDb;
class AppController extends Controller
{
	public function index(){
		
		dd(allTranslaterLang());

		return view('Translater::welcome');
	}

	public function home(){  
 
        dump(\Session::get('locale'));
		return view('Translater::home');
	}

	public function translate($lang){  
		if (in_array($lang, array_keys(allTranslaterLang()))) {
			\Session::put('locale', $lang); 
		}   
		return redirect()->back();

	}
}