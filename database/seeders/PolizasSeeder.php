<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Poliza; 

class PolizasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
           
            [1, '16/02/2021', 180504],
            [2, '18/12/2028', 102299],
            [3, '31/07/2021', 102299],
            [4, '13/02/2026', 146882],
            [5, '14/07/2021', 161561],
            [1, '27/11/2024', 134667],
            [2, '07/02/2026', 163806],
            [3, '18/10/2021', 150851],
            [4, '03/05/2023', 101701],
            [5, '17/05/2022', 98396],
            [1, '24/07/2020', 114821],
            [2, '13/08/2028', 173831],
            [3, '22/04/2021', 162488],
            [4, '04/09/2026', 117995],
            [5, '27/10/2022', 129208],
            [1, '22/09/2019', 89630],
            [2, '30/08/2022', 96522],
            [3, '19/07/2025', 146880],
            [4, '12/07/2021', 122659],
            [5, '12/02/2029', 163368],
            [1, '06/08/2019', 118462],
            [2, '07/10/2025', 167446],
            [3, '16/10/2022', 125933],
            [4, '16/11/2022', 157968],
            [5, '14/04/2026', 108267],
            [1, '23/06/2025', 178127],
            [2, '20/01/2022', 131447],
            [3, '06/10/2022', 117002],
            [4, '20/01/2024', 89628],
            [5, '08/07/2027', 131335],
            [1, '11/05/2024', 76206],
            [2, '03/04/2024', 147514],
            [3, '16/08/2022', 102293],
            [4, '21/04/2023', 116391],
            [5, '25/11/2020', 157967],
            [1, '08/09/2024', 99557],
            [2, '09/05/2019', 90114],
            [3, '24/09/2024', 160177],
            [4, '26/08/2024', 164459],
            [5, '12/08/2024', 141735],
            [1, '08/11/2022', 92810],
            [2, '30/03/2026', 142767],
            [3, '17/09/2019', 170423],
            [4, '06/02/2023', 173830],
            [5, '19/03/2023', 82718],
            [1, '23/03/2025', 178233],
            [2, '17/01/2025', 95907],
        ];

        foreach ($data as $item) {
            Poliza::create([
                'ID' => $item[0],
                'FECHA_VENCIMIENTO_LICENCIA' => $item[1],
                'NRO_POLIZA' => $item[2],
            ]);
        }
    }
}