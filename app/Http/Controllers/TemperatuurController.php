<?php                                      # app\Http\Controllers\TemperatuurController.php 
                                                                               // CONTROLLER 
namespace App\Http\Controllers; 
use App\Maanden; 
use App\Http\Controllers\Controller; 
use App\Models\Dagmeting; 
use App\Models\Nieuwsbrief;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class TemperatuurController extends Controller   
{ 
    public function index() 
    { 
        return view('selecteer'); 
    } 
    public function contact() 
    { 
        return view('contact'); 
    } 
    public function detail(Request $request)   
    { 
        
        
        $request->validate([ // CONTROLLER
            'maand'=>'integer|min:0|max:12',
            ]);

        $maand = $request->input('maand',1); 
        
        $typeTemp = $request->input('typeTemp',1);      
        $metingen = Dagmeting::where('maandnr', $maand)->orderBy('dagnr', 'asc')->get(); 
        return view('overzicht', array('maand'=>$maand, 'metingen'=>$metingen,'maandnamen'=>Maanden::namen(),'typeTemp'=>$typeTemp)); 
    } 

    public function nieuwsbrief(Request $request) // TemperatuurController.php
    {
        $validator = Validator::make($request->all(), [
            'emailadres' => 'required|email'
            ]);
            if ($validator->fails()) {
            Log::error ('validatie fout: ', $request->all());
            return redirect('/');
        }
        $nieuwsbrief = new Nieuwsbrief();
        $nieuwsbrief->mailadres = $request->input('emailadres');
        $nieuwsbrief->save();
        return view('bedankt');
    }

    
} 