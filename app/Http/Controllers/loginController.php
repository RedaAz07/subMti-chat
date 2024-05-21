<?php

namespace App\Http\Controllers;


use Maatwebsite\Excel\Writer;

use Maatwebsite\Excel\Excel;




use App\Models\admin;
use App\Models\classe;
use App\Models\niveau;
use App\Models\filiere;
use App\Models\message;
use App\Models\etudient;
use App\Models\actualite;
use App\Models\formateur;


use App\Models\utilisateur;
use Illuminate\Http\Request;
use App\Models\classeFormMessage;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Tests\Integration\Database\Fixtures\Post;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        return view("login.show");
    }

    public function etudient()
    {
        return view("message.etudient");
    }



    public function login(Request $request)
    {

$email=$request->email;
$password=$request->password;

$credentials=["email"=>$email,"password"=>$password];




        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('message.index');
        }

        return back()->withErrors(['login' => 'Username or password is incorrect']);
    }


    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect()->route('login');
    }










    public function searchFormateur(Request $request){
$etudients=etudient::all();
        $search=$request->input("search");
            $formateurs=formateur::where(function($query) use ($search){
                $query->where("nom","like","%$search%")->orWhere("prenom","like","%$search%")->orWhere("CIN","like","%$search%");
            })
            ->get();

            return view("message.index", compact("formateurs","etudients"),[


                "messages"=>message::all(),

        "filieres"=>filiere::all(),
        "niveuax"=>niveau::all(),
        "classes"=>classe::all(),
        "admins"=>admin::all(),


        "actualites"=>actualite::all(),
        "classeFormMessage"=>classeFormMessage::all(),


            ]);

        }




    public function searchEtudient(Request $request){
        $etudients=etudient::all();
        $search=$request->input("search");
                $etudients=etudient::where(function($query) use ($search){
                        $query->where("nom","like","$search")->orWhere("prenom","like","$search")->orWhere("CIN","like","$search");


                    })->orWhereHas("classe", function($query) use ($search) {
                        $query->where("num_groupe", "like", "$search")
                              ->orWhereHas("niveau", function($query) use ($search) {
                                  $query->where("niveau", "like", "$search")
                                        ->orWhereHas("filiere", function($query) use ($search) {
                                            $query->where("nom_filiere", "like", "$search");
                                        });
                              });
                    })
                    ->get();
                    return view("message.index", compact("etudients"),[


                        "messages"=>message::all(),
                        "admins"=>admin::all(),

                        "formateurs"=>formateur::all(),


                "filieres"=>filiere::all(),
                "niveuax"=>niveau::all(),
                "classes"=>classe::all(),

                "actualites"=>actualite::all(),
                "classeFormMessage"=>classeFormMessage::all(),


                    ]);

                }



public function Accueil(){
    return view("Accueil");
}



public function test()
{
    $excel = new Excel(
        // First argument (writer)
        new \PHPExcel_Writer_Excel2007(),

        // Second argument (filesystem)
        new \Illuminate\Filesystem\Filesystem(),

        // Third argument (event)
        new \Illuminate\Events\Dispatcher(),

        // Fourth argument (validator)
        new \Maatwebsite\Excel\Validators\FailureLogger()
    );

    $excel->create('test', function($excel) {
        $excel->sheet('Sheet 1', function($sheet) {
            $sheet->fromArray([
                ['Data 1', 'Data 2', 'Data 3'],
                ['Data 4', 'Data 5', 'Data 6'],
            ]);
        });
    })->export('xlsx');
}





}



