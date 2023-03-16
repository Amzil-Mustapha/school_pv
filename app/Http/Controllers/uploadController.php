<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeFileRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

use App\Http\Controllers\OperationController;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\dataImport;
use App\Models\DataTable;
use App\Models\Filiere;

class uploadController extends Controller
{
    //

    public function Onupload(Request $request): string
    {

        $input = [
            "file_import" => $request->file_import,
            "convenable" => $request->convenable,
            "moiyen" => $request->moiyen,
        ];

        Validator::validate($input, [
            "file_import" => ["required", "mimes:xlsx,xls"],
            "moiyen" => ["required"],
            "convenable" => ["required"],
        ]);

        if (DataTable::all()->first()) {

            DataTable::truncate();
        }


        Excel::import(new dataImport, $request->file("file_import")->store("temp"));
        $operationOBJ = new OperationController();

        $allFilier = Filiere::all();
        foreach ($allFilier as $filier) {

            $operationOBJ->getNmbreTotalGroup($filier->code_filiere, $filier->annee);
            $operationOBJ->getNombreTotalGroupesValides($filier->code_filiere, $filier->annee);
            $operationOBJ->getNombreTotalGroupesTaux($filier->code_filiere, $filier->annee, $request->convenable, $request->moiyen);
            $operationOBJ->getTotalModule($filier->code_filiere, $filier->annee);
            $operationOBJ->getTotalModuleAchever($filier->code_filiere, $filier->annee);
            $operationOBJ->getTotalEFM_local_regional($filier->code_filiere, $filier->annee);
        }

       return view('home');
    }
}
