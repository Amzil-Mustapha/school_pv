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

class uploadController extends Controller
{
    //


    public function Onupload(Request $request)
    {

        $input = [
            "file_import"=>$request->file_import,
        ];

        Validator::validate($input,[
            "file_import"=>["required","mimes:xlsx,xls"],
        ]);
        
        if(DataTable::all()->first()){

            DataTable::truncate();
            
        }

        
        Excel::import(new dataImport, $request->file("file_import")->store("temp"));
        $operationOBJ = new OperationController();
        dd($operationOBJ->getNmbreTotalGroup("GC_GE_TS","1"));

        

        // return "niiice";
        
        
    }
}
