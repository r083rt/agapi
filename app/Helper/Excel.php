<?php
namespace App\Helper;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel
{
    // build construct
    public $keyvalues;
    public $query;
    public $title;
    public $spreadsheet;

    public function __construct(
        $keyvalues,
        $query,
        $title = "Excel"
    ) {
        $this->keyvalues = $keyvalues;
        $this->query = $query;
        $this->title = $title;
        $this->spreadsheet = new Spreadsheet();
    }

    public function writeExcel()
    {
        //Specify the properties for this document
        try {
            $this->spreadsheet->getProperties()
                ->setTitle($this->title)
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
            $this->spreadsheet->setActiveSheetIndex(0);
            $now = \Carbon\Carbon::now()->timezone('Asia/Jakarta')->toDateTimeString();
            $end_col = chr(65 + (count($this->keyvalues) - 1));
            $this->spreadsheet->getActiveSheet()->setCellValue('A1', 'Data diambil pada ' . $now)->mergeCells('A1:' . $end_col . '1');

            $row = 2;
            $i = 0;
            foreach ($this->keyvalues as $key => $value) {
                $col = chr(65 + $i);
                $this->spreadsheet->getActiveSheet()
                    ->setCellValue($col . $row, $value);

                $i++;
            }
            $this->spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
            $this->spreadsheet->getActiveSheet()->getStyle('A2:' . $end_col . '2')->getAlignment()->setHorizontal('center');
            $this->spreadsheet->getActiveSheet()->getStyle('A2:' . $end_col . '2')->getFont()->setBold(true);

            $row = 3;
            foreach ($this->query as $key => $data) {
                $i = 0;
                foreach ($this->keyvalues as $key => $value) {
                    $col = chr(65 + $i);
                    $this->spreadsheet->getActiveSheet()
                        ->setCellValue($col . $row, $data->{$key});
                    $i++;
                }
                $row++;
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return $this;
    }

    public function saveExcel($filename)
    {
        $writer = new Xlsx($this->spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '.xlsx"');
        $writer->save('php://output');
    }
}
