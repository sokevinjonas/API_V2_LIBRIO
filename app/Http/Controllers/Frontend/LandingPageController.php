<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\NewInscriptionFromLanginPageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    
    function inscription()
    {
        return view('inscription');
    }

    function condition()
    {
        return view('conditions_d_utilisation');
    }

    function politique()
    {
        return view('politique');
    }

    function new_inscription_form_landing_page(NewInscriptionFromLanginPageRequest $request)
    {
        DB::beginTransaction();
        try {
            //code...
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
