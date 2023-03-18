<?php

namespace App\Http\Controllers;

use App\Models\Donnee;
use App\Models\Filiere;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    //

    public function GetDataAndDisplayIt(Request $request)
    {

        $shoudCommentDisplay = false ;               
        // get all aspeet for the user depinding on his email and passwrod and we also get for each aspeets all it's elements 
        $check = User::all()->where('email', session("email"))->where("type", session("type"))->first();
        $Allaspeet = $check->aspeet()->get();

        $aspeet_element_Array = array();
        foreach ($Allaspeet as $aspeet) {
            $aspeet_element_Array[] = [

                "aspeet" => $aspeet,
                "elements" => $aspeet->element()->get()

            ];
        }

        //here finding filier when he selected the year and filier or not 
        if ($selectedYear = $request->selectYear) {
            $selectedFilier = $request->filierSelect;

            session(["selected_filier" => $selectedFilier, "selected_year" => $selectedYear]);
            $filier = Filiere::all()->where("annee", $selectedYear)->where("code_filiere", $selectedFilier)->first();
            $shoudCommentDisplay = ($selectedFilier !="all"&& $selectedFilier !="all_a1" && $selectedFilier !="all_a2") ? true : false;
        } else {
            if ($sessionYear = session("selected_year")) {
                $sessionFilier = session("selected_filier");
                $filier = Filiere::all()->where("annee", $sessionYear)->where("code_filiere", $sessionFilier)->first();
                $shoudCommentDisplay = ($sessionFilier !="all"&& $sessionFilier !="all_a1" && $sessionFilier !="all_a2") ? true : false;

            } else {
                $filier = Filiere::all()->where("annee", "12")->where("code_filiere", "all")->first();
                $shoudCommentDisplay = false;
            }
        }

        

        $donnes = $filier->donnee()->get();
        $comments = $filier->comment()->get();

        //here we give for each element its donne and comment


        foreach ($aspeet_element_Array as $aspeet_element) {
            //aspeet and elements
            foreach ($aspeet_element["elements"] as $element) {
                //all elements 
                foreach ($donnes as $donne) {
                    # all donnes

                    if ($donne->element_id == $element->id) {
                        $element->value = $donne->value;
                    }
                }
                foreach ($comments as $comment) {
                    # all comment

                    if ($comment->element_id == $element->id) {
                        $element->comment = $comment->value;
                    }
                }
            }
        }
        // return ($request);
        return view("home", ["data" => $aspeet_element_Array,"comment_display"=>$shoudCommentDisplay]);
    }
}
