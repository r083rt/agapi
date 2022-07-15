<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelController extends Controller
{
    //
    public function writeExcel($keyvalues, $query, $title = "Anjay")
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
        $writer->save($title . '.xlsx');
    }

    public function best()
    {
        $query = DB::select("select b.user_id,c.kta_id,c.name,c.email,d.name as kota,b.school_place,b.province_id, count(a.id) as total_post from posts a inner join profiles b on b.user_id=a.author_id inner join users c on c.id=b.user_id inner join cities d on d.id=b.city_id where b.province_id=33 GROUP BY a.author_id order by total_post desc limit 50");
        writeExcel(['user_id' => 'User ID', 'kta_id' => 'KTA ID', 'name' => 'Name', 'email' => 'Email', 'kota' => 'Kota/Kabupaten', 'school_place' => 'Asal Sekolah', 'total_post' => 'Total Post'], $query, 'Ranking berdasarkan banyak post');

        $query = DB::select("select b.user_id,c.kta_id,c.name,c.email,d.name as kota,b.school_place,b.province_id, count(a.id) as total_comment from comments a inner join profiles b on b.user_id=a.user_id inner join users c on c.id=b.user_id inner join cities d on d.id=b.city_id where b.province_id=33 GROUP BY a.user_id order by total_comment desc limit 50");
        $keyval = ['user_id' => 'User ID', 'kta_id' => 'KTA ID', 'name' => 'Name', 'email' => 'Email', 'kota' => 'Kota/Kabupaten', 'school_place' => 'Asal Sekolah', 'total_comment' => 'Total Komentar'];
        writeExcel($keyval, $query, 'Ranking berdasarkan banyak komentar');

        $query = DB::select("select b.user_id,c.kta_id,c.name,c.email,d.name as kota,b.school_place,b.province_id, count(a.id) as total_likes from likes a inner join profiles b on b.user_id=a.user_id inner join users c on c.id=b.user_id inner join cities d on d.id=b.city_id where b.province_id=33 GROUP BY a.user_id order by total_likes desc limit 50");
        $keyval = ['user_id' => 'User ID', 'kta_id' => 'KTA ID', 'name' => 'Name', 'email' => 'Email', 'kota' => 'Kota/Kabupaten', 'school_place' => 'Asal Sekolah', 'total_likes' => 'Total Menyukai'];
        writeExcel($keyval, $query, 'Ranking berdasarkan banyak menyukai');

//butir soal
        $query = DB::select("select b.user_id,c.kta_id,c.name,c.email,d.name as kota,b.school_place,b.province_id, count(a.id) as total_butir_soal from assigments a inner join profiles b on b.user_id=a.user_id inner join users c on c.id=b.user_id inner join cities d on d.id=b.city_id where b.province_id=33 and a.teacher_id is null and a.is_publish=0 GROUP BY a.user_id order by total_butir_soal desc limit 50");
        $keyval = ['user_id' => 'User ID', 'kta_id' => 'KTA ID', 'name' => 'Name', 'email' => 'Email', 'kota' => 'Kota/Kabupaten', 'school_place' => 'Asal Sekolah', 'total_butir_soal' => 'Total Butir Soal'];
        writeExcel($keyval, $query, 'Ranking berdasarkan banyak butir soal');

//paket soal
        $query = DB::select("select b.user_id,c.kta_id,c.name,c.email,d.name as kota,b.school_place, count(a.id) as total_paket_soal from assigments a inner join profiles b on b.user_id=a.user_id inner join users c on c.id=b.user_id inner join cities d on d.id=b.city_id where b.province_id=33 and a.is_publish=1 and a.teacher_id is null GROUP BY a.user_id order by total_paket_soal desc limit 50");
        $keyval = ['user_id' => 'User ID', 'kta_id' => 'KTA ID', 'name' => 'Name', 'email' => 'Email', 'kota' => 'Kota/Kabupaten', 'school_place' => 'Asal Sekolah', 'total_paket_soal' => 'Total Paket Soal'];
        writeExcel($keyval, $query, 'Ranking berdasarkan banyak paket soal');

//rpp
        $query = DB::select("select b.user_id,c.kta_id,c.name,c.email,d.name as kota,b.school_place, count(a.id) as total_rpp from lesson_plans a inner join profiles b on b.user_id=a.user_id inner join users c on c.id=b.user_id inner join cities d on d.id=b.city_id where b.province_id=33 GROUP BY a.user_id order by total_rpp desc limit 50");
        $keyval = ['user_id' => 'User ID', 'kta_id' => 'KTA ID', 'name' => 'Name', 'email' => 'Email', 'kota' => 'Kota/Kabupaten', 'school_place' => 'Asal Sekolah', 'total_rpp' => 'Total RPP'];
        writeExcel($keyval, $query, 'Ranking berdasarkan banyak RPP');

//modul
        $query = DB::select("select b.user_id,c.kta_id,c.name,c.email,d.name as kota,b.school_place, count(a.id) as total_modul from modules a inner join profiles b on b.user_id=a.user_id inner join users c on c.id=b.user_id inner join cities d on d.id=b.city_id where b.province_id=33 GROUP BY a.user_id order by total_modul desc limit 50");
        $keyval = ['user_id' => 'User ID', 'kta_id' => 'KTA ID', 'name' => 'Name', 'email' => 'Email', 'kota' => 'Kota/Kabupaten', 'school_place' => 'Asal Sekolah', 'total_modul' => 'Total modul'];
        writeExcel($keyval, $query, 'Ranking berdasarkan banyak modul');

//banyak soal dikerjakan
        $query = DB::select("select b.user_id,c.kta_id,c.name,c.email,d.name as kota,b.school_place, count(a.id) as total_soal_dikerjakan from assigment_sessions a inner join assigments a2 on a.assigment_id=a2.id inner join profiles b on b.user_id=if(a.user_id is null,a2.user_id,a.user_id) inner join users c on c.id=b.user_id inner join cities d on d.id=b.city_id where b.province_id=33 GROUP BY b.user_id order by total_soal_dikerjakan desc limit 50");
        $keyval = ['user_id' => 'User ID', 'kta_id' => 'KTA ID', 'name' => 'Name', 'email' => 'Email', 'kota' => 'Kota/Kabupaten', 'school_place' => 'Asal Sekolah', 'total_soal_dikerjakan' => 'Total Soal dikerjakan Siswa'];
        writeExcel($keyval, $query, 'Ranking berdasarkan banyak soal yg dikerjakan siswa');

    }
}
