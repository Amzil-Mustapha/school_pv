<?php

namespace App\Http\Controllers;

use App\Models\DataTable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class OperationController extends Controller
{
    //


    public function getNmbreTotalGroup($code_filier,$annee){

        return DataTable::where("code_filiere",$code_filier)->where("annee_formation",$annee)->distinct("groupe")->count();
    }

}
