<?php
class Weighted_average
{
    protected $data_a;
    protected $data_b;

    public function __construct(array $data_a, array $data_b)
    {
        $this->data_a = $data_a;
        $this->data_b = $data_b;
    }

    /**
     * Mengambil nilai persamaan
     * Rentang hasil: 0 - 5
     * Rumus: sum(ai * bi) / sum(bi)
     *
     * @return float
     */
    public function calculate(): float
    {
        $top = $this->getTop();
        $div = $this->getDivider();

        return $top / $div;
    }
    /**
     * Kalkulasi nilai atas (angka yang mau dibagi)
     * Rumus: sum(ai * bi)
     *
     * @return float
     */
    private function getTop(): float
    {
        $data_a = $this->data_a;
        $data_b = $this->data_b;

        $sum = 0;
        foreach ($data_a as $i => $a) {
            $b = isset($data_b[$i]) ? $data_b[$i] : null;

            // Jika salah satu dari a atau b nilainya null ...
            if (is_null($a) || is_null($b)) {
                continue; // ... skip
            }

            $sum += $a * $b;
        }

        return $sum;
    }
    /**
     * Kalkulasi nilai bawah (angka pembagi)
     * Rumus: sum(bi)
     *
     * @return float
     */
    private function getDivider(): float
    {
        $data_b = $this->data_b;

        $pjmlh_array = array_sum($data_b);

        return $pjmlh_array;
    }

    /**
     * Static function untuk menyederhanakan
     * pemanggilan fungsi calculate tanpa harus
     * inisiasi class terlebih dehulu
     *
     * @return float
     */
    public static function calc(array $data_a, array $data_b): float
    {
        return (new static($data_a, $data_b))->calculate();
    }
}
