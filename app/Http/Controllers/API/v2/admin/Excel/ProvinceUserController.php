<?php

namespace App\Http\Controllers\API\v2\admin\Excel;

use App\Helper\Excel;
use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProvinceUserController extends Controller
{
    public function writeExcel($keyvalues, $query, $title = "Report")
    {
        $spreadsheet = new Spreadsheet();
        //Specify the properties for this document
        $spreadsheet->getProperties()
            ->setTitle($title)
            ->setSubject('A PHPExcel example')
            ->setDescription('AGPAII Digital')
            ->setCreator('CV Ardata Media')
            ->setLastModifiedBy('CV Ardata Media');

        //style
        $colors = ['e9f7e9', 'd4c4ae'];
        $styleArray = ['fill' => [
            'fillType' => Fill::FILL_SOLID,
            'color' => ['rgb' => 'aed4ae'],
        ],

        ];

        //Adding data to the excel sheet
        $spreadsheet->setActiveSheetIndex(0);
        $now = \Carbon\Carbon::now()->timezone('Asia/Jakarta')->toDateTimeString();
        $end_col = chr(65 + (count($keyvalues) - 1));
        $spreadsheet->getActiveSheet()->setCellValue('A1', 'Data diambil pada ' . $now)->mergeCells('A1:' . $end_col . '1');

        $row = 2;
        $i = 0;
        foreach ($keyvalues as $key => $value) {
            $col = chr(65 + $i);
            $spreadsheet->getActiveSheet()
                ->setCellValue($col . $row, $value);

            $i++;
        }
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A2:' . $end_col . '2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A2:' . $end_col . '2')->getFont()->setBold(true);

        $row = 3;
        foreach ($query as $key => $data) {
            $i = 0;
            foreach ($keyvalues as $key => $value) {
                $col = chr(65 + $i);
                $spreadsheet->getActiveSheet()
                    ->setCellValue($col . $row, $data->{$key});
                $i++;
            }
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $title . '.xlsx"');
        $writer->save('php://output');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provinceId)
    {
        //
        $users = User::
            join('profiles', 'profiles.user_id', '=', 'users.id')
            ->join('provinces', 'provinces.id', '=', 'profiles.province_id')
            ->join('cities', 'cities.id', '=', 'profiles.city_id')
            ->join('districts', 'districts.id', '=', 'profiles.district_id')
            ->join('pns_statuses', 'users.id', '=', 'pns_statuses.user_id')
            ->where('profiles.province_id', $provinceId)
            ->select(
                'kta_id',
                DB::raw('users.name as name'),
                DB::raw('profiles.gender as gender'),
                DB::raw('cities.name as city'),
                DB::raw('districts.name as district'),
                DB::raw('profiles.school_place as school_place'),
                DB::raw('profiles.nik as nik'),
                // jika pns_statuses.is_pns = 1 maka 'PNS' jika tidak maka 'Non PNS' end as pns_status,
                DB::raw('CASE WHEN pns_statuses.is_pns = 1 THEN "PNS" ELSE "Non PNS" END as pns_status'),
            )
        // ->limit(10)
            ->get();
        // return response()->json($users);
        // $excel = new Excel([
        //     'kta_id' => "No KTA",
        //     'name' => 'Nama',
        //     'gender' => 'Jenis Kelamin',
        //     // 'city' => 'Kota',
        //     // 'district' => 'Kecamatan',
        //     // 'school_place' => 'Tempat Tugas',
        //     // 'nik' => 'NIK',
        // ], $users);

        // $save = $excel->saveExcel("Anggota DPW");
        return $this->writeExcel([
            'kta_id' => "No KTA",
            'name' => 'Nama',
            'gender' => 'Jenis Kelamin',
            'city' => 'Kota',
            'district' => 'Kecamatan',
            'school_place' => 'Tempat Tugas',
            'nik' => 'NIK',
            'pns_status' => 'Status PNS',
        ], $users, "Anggota DPW " . Province::find($provinceId)->name);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        //
    }
}
