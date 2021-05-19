<?php

namespace App\Http\Controllers;

use App\DigiSignDocument;
use App\Helpers\DigiSign;
use App\Helpers\Utils;
use Hamcrest\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    public function document(Request $request)
    {
        if(!isset($request->dc)){return redirect('document/not-found');}
        $dc_id = Utils::decrypt($request->dc);
        $doc_id = DigiSignDocument::where('uid' , Auth::id())->where('document_id' , $dc_id)->first();
        if(!$doc_id){
            //echo 'document/not-found'; exit;
            return redirect('document/not-found');
        }
        $digisign = new DigiSign;
        $link = $digisign->do_sign_the_document($dc_id);
        return redirect($link);
    }
}
