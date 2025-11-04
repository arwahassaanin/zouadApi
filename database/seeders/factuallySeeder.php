<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class factuallySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        //
        Faculty::create([
            'id'=>'1',
            'name'=>'الهندسة ',
        ]);
            Faculty::create([
            'id'=>'2',
            'name'=>'الطب',
        ]);
            Faculty::create([
            'id'=>'3',
            'name'=>' الصيدلة',
        ]);
            Faculty::create([
            'id'=>'4',
            'name'=>'العلوم الصحية ',
        ]);
            Faculty::create([
            'id'=>'5',
            'name'=>'الشريعة والدراسات الاسلامية ',
        ]);
            Faculty::create([
            'id'=>'6',
            'name'=>' العلوم الإجتماعية',
        ]);
            Faculty::create([
            'id'=>'7',
            'name'=>'التجارة ',
        ]);
            Faculty::create([
            'id'=>'8',
            'name'=>'المحاسبة ',
        ]);
            Faculty::create([
            'id'=>'9',
            'name'=>' تكنولوجيا المعلومات ',
        ]);
            Faculty::create([
            'id'=>'10',
            'name'=>'التربية ',
        ]);
            Faculty::create([
            'id'=>'11',
            'name'=>' الآداب',
        ]);
            Faculty::create([
            'id'=>'12',
            'name'=>'الحقوق ',
        ]);
            Faculty::create([
            'id'=>'13',
            'name'=>' الاقتصاد والعلوم الإدارية',
        ]);
            Faculty::create([
            'id'=>'14',
            'name'=>' العلوم المالية والإدارية ',
        ]);
            Faculty::create([
            'id'=>'15',
            'name'=>'الفنون الجميلة  ',
        ]);
            Faculty::create([
            'id'=>'16',
            'name'=>'العلوم التطبيقية ',
        ]);
            Faculty::create([
            'id'=>'17',
            'name'=>' إدارة الأعمال',
        ]);

    }
}
