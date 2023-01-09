<?php

/**
 * Kelas ARIMA untuk melakukan forecasting dengan menggunakan model ARIMA.
 */
class ARIMA
{
    // Parameter model ARIMA
    private $p;
    private $d;
    private $q;
    private $error;

    // Coefficient ARIMA model
    private $coefficients;

    /**
     * Constructor untuk kelas ARIMA.
     *
     * @param int $p Jumlah lag dari variabel tergantung (autoregressive term)
     * @param int $d Jumlah differencing yang dilakukan (integrated term)
     * @param int $q Jumlah lag dari error term (moving average term)
     */
    public function __construct($p, $d, $q)
    {
        $this->p = $p;
        $this->d = $d;
        $this->q = $q;
        $this->error = [];
    }

    /**
     * Meng-differencing data.
     */
    private function difference($data)
    {
        $differencedData = [];
        for ($i = 1; $i < count($data); $i++) {
            $differencedData[] = $data[$i] - $data[$i - 1];
        }
        return $differencedData;
    }

    private function undifference($differencedData)
    {
        $data = [$differencedData[0]];
        for ($i = 1; $i < count($differencedData); $i++) {
            $data[] = $data[$i - 1] + $differencedData[$i];
        }
        return $data;
    }

    /**
     * Melakukan fitting model dengan menggunakan data.
     *
     * @param array $data Data yang akan digunakan untuk fitting model
     * @param array $testData Data yang akan digunakan untuk menguji model (opsional)
     * @param int $forecastLength Panjang forecasting yang akan dilakukan (opsional)
     * @param bool $returnForecast Jika bernilai true, akan mengembalikan hasil forecast (opsional)
     * @return array Array yang berisi nilai forecast jika returnForecast bernilai true, atau array kosong jika sebaliknya
     */
    public function fit($data, $testData = [], $forecastLength = 0, $returnForecast = false)
    {
        // Lakukan differencing jika diperlukan
        $diffData = $this->difference($data, $this->d);

        // Tentukan model ARIMA dengan menggunakan ACF dan PACF
        $arCoefficients = $this->computeARCoefficients($diffData, $this->p);
        $maCoefficients = $this->computeMACoefficients($diffData, $this->q);

        // Simpan coefficient ARIMA model
        $this->coefficients = [
            'p' => $this->p,
            'd' => $this->d,
            'q' => $this->q,
            'ar' => $arCoefficients,
            'ma' => $maCoefficients,
        ];

        if ($returnForecast) {
            // Lakukan forecasting jika diperlukan
            $forecast = $this->forecast($diffData, $forecastLength, $arCoefficients, $maCoefficients);
            return $forecast;
        }

        // Uji model dengan menggunakan data testing jika diperlukan
        if (!empty($testData)) {
            $forecast = $this->forecast($diffData, count($testData), $arCoefficients, $maCoefficients);
            $forecast = $this->undifference($forecast, $this->d);
            // Hitung error dengan menggunakan mean squared error (MSE)
            $error = $this->meanSquaredError($forecast, $testData);
            return $error;
        }

        return [];
    }

    /**
     * Melakukan forecasting dengan menggunakan model ARIMA yang telah dilatih.
     *
     * @param array $data Data yang akan digunakan sebagai dasar forecasting
     * @param int $length Panjang forecasting yang akan dilakukan
     * @param array $arCoefficients Coefficient autoregressive term
     * @param array $maCoefficients Coefficient moving average term
     * @return array Hasil forecast
     */
    public function forecast($data, $length, $arCoefficients, $maCoefficients)
    {
        // Inisialisasi hasil forecast
        $forecast = [];

        // Lakukan loop sebanyak panjang forecasting yang diinginkan
        for ($i = 0; $i < $length; $i++) {
            // Hitung nilai forecast untuk periode ke-i
            $forecast[] = $this->predict($data, $i, $arCoefficients, $maCoefficients);
        }

        return $forecast;
    }

    /**
     * Menghitung nilai forecast untuk suatu periode tertentu.
     *
     * @param array $data Data yang akan digunakan sebagai dasar perhitungan
     * @param int $period Periode yang ingin dihitung forecast-nya
     * @param array $arCoefficients Coefficient autoregressive term
     * @param array $maCoefficients Coefficient moving average term
     * @return float Nilai forecast untuk periode tertentu
     */
    private function predict($data, $period, $arCoefficients, $maCoefficients)
    {
        // Hitung nilai forecast menggunakan rumus ARIMA
        $arPrediction = $this->predictAR($data, $period, $arCoefficients);
        $maPrediction = $this->predictMA($data, $period, $maCoefficients);
        $prediction = $arPrediction + $maPrediction;

        return $prediction;
    }

    /**
     * Menghitung nilai autoregressive term dari suatu periode tertentu.
     *
     * @param array $data Data yang akan digunakan sebagai dasar perhitungan
     * @param int $period Periode yang ingin dihitung autoregressive term-nya
     * @param array $coefficients Coefficient autoregressive term
     * @return float Nilai autoregressive term untuk periode tertentu
     */
    private function predictAR($data, $period, $coefficients)
    {
        // Inisialisasi nilai autoregressive term
        $prediction = 0;
        // Hitung nilai autoregressive term dengan menggunakan rumus AR
        for ($i = 0; $i < $this->p; $i++) {
            $prediction += $coefficients[$i] * $data[$period - $i - 1];
        }

        return $prediction;
    }

    /**
     * Menghitung nilai moving average term dari suatu periode tertentu.
     *
     * @param array $data Data yang akan digunakan sebagai dasar perhitungan
     * @param int $period Periode yang ingin dihitung moving average term-nya
     * @param array $coefficients Coefficient moving average term
     * @return float Nilai moving average term untuk periode tertentu
     */
    private function predictMA($data, $period, $coefficients)
    {
        // Inisialisasi nilai moving average term
        $prediction = 0;

        // Hitung nilai moving average term dengan menggunakan rumus MA
        for ($i = 0; $i < $this->q; $i++) {
            $prediction += $coefficients[$i] * $this->error[$period - $i - 1];
        }

        return $prediction;
    }

    /**
     * Menghitung mean squared error (MSE) dari hasil forecast dengan data aktual.
     *
     * @param array $forecast Hasil forecast
     * @param array $actual Data aktual
     * @return float Nilai MSE
     */
    private function meanSquaredError($forecast, $actual)
    {
        // Hitung selisih antara setiap elemen dari forecast dan actual
        $diff = array_map(function ($f, $a) {
            return pow($f - $a, 2);
        }, $forecast, $actual);

        // Hitung rata-rata dari selisih tersebut dan kembalikan hasilnya
        return array_sum($diff) / count($diff);
    }

    /**
     * Menghitung coefficient autoregressive term dengan menggunakan metode least squares.
     *
     * @param array $data Data yang akan digunakan sebagai dasar perhitungan
     * @param int $p Jumlah lag yang ingin dihitung coefficient-nya
     * @return array Coefficient autoregressive term
     */
    private function computeARCoefficients($data, $p)
    {
        // Buat matriks X dan Y dengan menggunakan data
        $X = $this->createDesignMatrix($data, $p, $p);
        $Y = array_slice($data, $p);

        // Hitung transpose dari matriks X
        $X_transpose = array_map(null, ...$X);

        // Hitung inverse dari matriks X_transpose * X
        $X_transpose_X_inv = $this->matrixInverse($this->matrixMultiply($X_transpose, $X));
        // Hitung coefficient autoregressive term dengan menggunakan rumus (X_transpose * X)^(-1) * X_transpose * Y
        $coefficients = $this->matrixMultiply($this->matrixMultiply($X_transpose_X_inv, $X_transpose), $Y);

        return $coefficients;
    }

    /**
     * Menghitung coefficient moving average term dengan menggunakan metode least squares.
     *
     * @param array $data Data yang akan digunakan sebagai dasar perhitungan
     * @param int $q Jumlah lag yang ingin dihitung coefficient-nya
     * @return array Coefficient moving average term
     */
    private function computeMACoefficients($data, $q)
    {
        // Buat matriks X dan Y dengan menggunakan data
        $X = $this->createDesignMatrix($data, $q, 0);
        $Y = array_slice($data, $q);

        // Hitung transpose dari matriks X
        $X_transpose = array_map(null, ...$X);

        // Hitung inverse dari matriks X_transpose * X
        $X_transpose_X_inv = $this->matrixInverse($this->matrixMultiply($X_transpose, $X));

        // Hitung coefficient moving average term dengan menggunakan rumus (X_transpose * X)^(-1) * X_transpose * Y
        $coefficients = $this->matrixMultiply($this->matrixMultiply($X_transpose_X_inv, $X_transpose), $Y);

        return $coefficients;
    }

    /**
     * Membuat matriks desain (design matrix) dari data.
     *
     * @param array $data Data yang akan digunakan sebagai dasar pembuatan matriks
     * @param int $p Jumlah lag dari autoregressive term yang akan dimasukkan ke dalam matriks
     * @param int $q Jumlah lag dari moving average term yang akan dimasukkan ke dalam matriks
     * @return array Matriks desain
     */
    private function createDesignMatrix($data, $p, $q)
    {
        // Inisialisasi matriks desain
        $matrix = [];

        // Buat matriks desain dengan menggunakan data
        for ($i = 0; $i < count($data) - max($p, $q); $i++) {
            $row = [];
            for ($j = 0; $j < $p; $j++) {
                $row[] = $data[$i + $j];
            }
            for ($j = 0; $j < $q; $j++) {
                $row[] = $this->error[$i + $j];
            }
            $matrix[] = $row;
        }

        return $matrix;
    }

    /**
     * Menghitung inverse dari suatu matriks.
     *
     * @param array $matrix Matriks yang akan diinverse
     * @return array Inverse dari matriks
     */
    private function matrixInverse($matrix)
    {
        // Hitung determinan dari matriks
        $det = $this->matrixDeterminant($matrix);
        // Hitung matriks kofaktor dari matriks
        $cofactorMatrix = $this->matrixCofactor($matrix);

        // Hitung transpose dari matriks kofaktor
        $cofactorMatrixTranspose = array_map(null, ...$cofactorMatrix);

        // Hitung inverse dari matriks dengan menggunakan rumus (1/det) * transpose(cofactor matrix)
        $inverse = array_map(function ($row) use ($det) {
            return array_map(function ($val) use ($det) {
                return $val / $det;
            }, $row);
        }, $cofactorMatrixTranspose);

        return $inverse;
    }

    /**
     * Menghitung determinan dari suatu matriks.
     *
     * @param array $matrix Matriks yang akan dihitung determinan-nya
     * @return float Determinan dari matriks
     */
    private function matrixDeterminant($matrix)
    {
        // Jika matriks hanya memiliki 1 elemen, kembalikan nilai elemen tersebut sebagai determinan
        if (count($matrix) == 1) {
            return $matrix[0][0];
        }

        // Jika matriks memiliki lebih dari 1 elemen, lakukan perhitungan determinan dengan menggunakan rumus
        $det = 0;
        for ($i = 0; $i < count($matrix); $i++) {
            $subMatrix = $this->matrixMinor($matrix, 0, $i);
            $det += pow(-1, $i) * $matrix[0][$i] * $this->matrixDeterminant($subMatrix);
        }

        return $det;
    }

    /**
     * Menghitung matriks minor dari suatu matriks.
     *
     * @param array $matrix Matriks yang akan dihitung minor-nya
     * @param int $row Baris yang akan dihapus
     * @param int $col Kolom yang akan dihapus
     * @return array Matriks minor
     */
    private function matrixMinor($matrix, $row, $col)
    {
        // Buat matriks minor dengan menghapus baris dan kolom tertentu
        $minor = [];
        for ($i = 0; $i < count($matrix); $i++) {
            if ($i == $row) {
                continue;
            }
            $minorRow = [];
            for ($j = 0; $j < count($matrix[$i]); $j++) {
                if ($j == $col) {
                    continue;
                }
                $minorRow[] = $matrix[$i][$j];
            }
            $minor[] = $minorRow;
        }

        return $minor;
    }

    /**
     * Menghitung matriks kofaktor dari suatu matriks.
     *
     * @param array $matrix Matriks yang akan dihitung kofaktor-nya
     * @return array Matriks kofaktor
     */
    private function matrixCofactor($matrix)
    {
        // Inisialisasi matriks kofaktor
        $cofactorMatrix = [];

        // Buat matriks kofaktor dengan menggunakan rumus
        for ($i = 0; $i < count($matrix); $i++) {
            $cofactorRow = [];
            for ($j = 0; $j < count($matrix[$i]); $j++) {
                $subMatrix = $this->matrixMinor($matrix, $i, $j);
                $cofactorRow[] = pow(-1, $i + $j) * $this->matrixDeterminant($subMatrix);
            }
            $cofactorMatrix[] = $cofactorRow;
        }

        return $cofactorMatrix;
    }

    /**
     * Melakukan perkalian matriks.
     *
     * @param array $matrix1 Matriks pertama
     * @param array $matrix2 Matriks kedua
     * @return array Hasil perkalian matriks
     */
    private function matrixMultiply($matrix1, $matrix2)
    {
        // Inisialisasi hasil perkalian matriks
        $result = [];

        // Lakukan perkalian matriks dengan menggunakan rumus
        for ($i = 0; $i < count($matrix1); $i++) {
            $resultRow = [];
            for ($j = 0; $j < count($matrix2[0]); $j++) {
                $sum = 0;
                for ($k = 0; $k < count($matrix1[0]); $k++) {
                    $sum += $matrix1[$i][$k] * $matrix2[$k][$j];
                }
                $resultRow[] = $sum;
            }
            $result[] = $resultRow;
        }

        return $result;
    }
}
