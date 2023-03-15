<?php

namespace App\Http\Controllers;

use App\Models\DataTable;
use App\Models\Donnee;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class OperationController extends Controller
{
    //


    public function getNmbreTotalGroup($code_filier, $annee)
    {

        $NmbreTotalGroup = DataTable::where("code_filiere", $code_filier)->where("annee_formation", $annee)->distinct("groupe")->count();

        $id_code_filier = Filiere::all()->where("code_filiere", $code_filier)->where("annee", $annee)->first()->id;
        $eleArray = [1, 39];
        foreach ($eleArray as $ele) {

            $donne = Donnee::all()->where("filiere_id", $id_code_filier)->where("element_id", $ele)->first();

            if ($donne) {
                $donne->value = $NmbreTotalGroup;
            } else {
                $donne = new Donnee();
                $donne->value = $NmbreTotalGroup;
                $donne->filiere_id = $id_code_filier;
                $donne->element_id = $ele;
            }

            $donne->save();
        }
    }


    public function getNombreTotalGroupesValides($code_filier, $annee)
    {
        $count = 0;
        $allGroupDistinct = DB::table("data_tables")->where("code_filiere", $code_filier)->where("annee_formation", $annee)->distinct("groupe")->get("groupe");

        foreach ($allGroupDistinct as $group) {
            $numberModel = DB::table("data_tables")->where("code_filiere", $code_filier)->where("annee_formation", $annee)->where("groupe", $group->groupe)->count();
            $numberModelVlide  = DB::table("data_tables")->where("code_filiere", $code_filier)->where("annee_formation", $annee)->where("groupe", $group->groupe)->where("Taux_Realisation_P_syn", ">=", 95)->count("groupe");
            if ($numberModel == $numberModelVlide) {
                $count++;
            }
        }

        $id_code_filier = Filiere::all()->where("code_filiere", $code_filier)->where("annee", $annee)->first()->id;
        $id_element = 2;

        $donne = Donnee::all()->where("filiere_id", $id_code_filier)->where("element_id", $id_element)->first();

        if ($donne) {
            $donne->value = $count;
        } else {
            $donne = new Donnee();
            $donne->value = $count;
            $donne->filiere_id = $id_code_filier;
            $donne->element_id = $id_element;
        }

        $donne->save();
    }

    public function getNombreTotalGroupesTauxConvenable($code_filier, $annee, $convenable)
    {
        // $count = 0;
        // $total = DB::table("data_tables")->selectRaw("groupe,avg(Taux_Realisation_P_syn)")->where("code_filiere", $code_filier)->where("annee_formation", $annee)->groupBy("groupe")->get();
        // dd($total);
    }
}
