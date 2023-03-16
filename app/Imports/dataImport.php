<?php

namespace App\Imports;

use App\Models\DataTable;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class dataImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Model|DataTable|null
     */
    public function model(array $row): Model|DataTable|null
    {
        if ($row["Année de formation"] != 3) {
            return new DataTable([
                //
                "code_filiere" => $row["Code Filière"],
                "annee_formation" => $row["Année de formation"],
                "module" => $row["Module"],
                "Taux_Realisation_P_syn" => $row["Taux Réalisation (P & SYN )"] == null ? 0 : $row["Taux Réalisation (P & SYN )"],
                "mh_realisee_globale" => $row["MH Réalisée Globale"] == null ? 0 : $row["MH Réalisée Globale"],
                "groupe" => $row["Groupe"],
                "Regional" => $row["Régional"],
                "Seance_EFM" => $row["Séance EFM"],
                "MH_Affectee_Globale_P_SYN" => $row["MH Affectée Globale (P & SYN)"] == null ? 0 : $row["MH Affectée Globale (P & SYN)"],
            ]);
        }
        return  null;
    }
}
