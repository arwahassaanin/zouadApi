<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormFieldsController extends Controller
{

    public static function registrationFields()
    {
        return [
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'الاسم الكامل:',
                'required' => true,
            ],
            [
                'name' => 'email',
                'type' => 'email',
                'label' => 'البريد الإلكتروني:',
                'required' => true,
            ],
            [
                'name' => 'password',
                'type' => 'password',
                'label' => 'كلمة المرور: ',
                'required' => true,
            ],
            [
                'name' => 'university',
                'type' => 'select',
                'label' => 'الجامعة:',
                'required' => true,
                'options' => [
                    ['value' => 'iug', 'label' => 'الجامعة الإسلامية'],
                ['value' => 'aug', 'label' => 'جامعة الأزهر'],
                ['value' => 'pug', 'label' => 'جامعة فلسطين'],
                ['value' => 'qou', 'label' => 'جامعة القدس المفتوحة'],
                ['value' => 'aqsa', 'label' => 'جامعة الأقصى'],
                ['value' => 'gaza', 'label' => 'جامعة غزة'],
                ['value' => 'GAS', 'label' => 'الكلية الجامعية للعلوم التطبيقية'],
                ['value' => 'PTC', 'label' => 'الكلية التقنية - دير البلح'],
                ['value' => 'CCAST', 'label' => 'الكلية الأهلية للعلوم التطبيقية والتكنولوجيا'],
                ['value' => 'UCAS', 'label' => 'الكلية الجامعية للعلوم التطبيقية'],
                ['value' => 'RCAS', 'label' => 'كلية رفح للعلوم التطبيقية'],
                ['value' => 'GTC', 'label' => 'الكلية التقنية (الأونروا)'],
                ['value' => 'GCC', 'label' => 'كلية غزة للعلوم الإدارية والتكنولوجيا'],
                ['value' => 'GUC', 'label' => 'كلية غزة الجامعية'],

                ],
            ],
            [
                'name' => 'national_id',
                'type' => 'text',
                'label' => 'الرقم الهوية:',
                'required' => true,
            ],
            [
                'name' => 'university_id',
                'type' => 'text',
                'label' => 'رقم الطالب الجامعي:',
                'required' => true,
            ],
            [
                'name' => 'phone_number',
                'type' => 'text',
                'label' => 'رقم الجوال:',
                'required' => true,
            ],
            [
                'name' => 'address',
                'type' => 'select',
                'label' => 'العنوان',
                'required' => true,
                'options' => [
                ['value' => 'north', 'label' => 'شمال غزة'],
                ['value' => 'gaza', 'label' => 'غزة'],
                ['value' => 'bureij', 'label' => 'البريج'],
                ['value' => 'nuseirat', 'label' => 'النصيرات'],
                ['value' => 'maghazi', 'label' => 'المغازي'],
                ['value' => 'rafah', 'label' => 'رفح'],
                ['value' => 'khanyounis', 'label' => 'خان يونس'],
                ['value' => 'deirbalah', 'label' => 'دير البلح'],


                ],
            ],
            [
                'name' => 'department',
                'type' => 'select',
                'label' => 'التخصص',
                'required' => true,
                'options' => [
                ['value' => 'mid', 'label' => 'الطب'],
                ['value' => 'pharmacy', 'label' => 'الصيدلة'],
                ['value' => 'nursing', 'label' => 'التمريض'],
                ['value' => 'engineering', 'label' => 'الهندسة'],
                ['value' => 'business', 'label' => 'إدارة الأعمال'],
                ['value' => 'education', 'label' => 'التربية'],
                ['value' => 'arts', 'label' => 'الآداب'],
                ['value' => 'sciences', 'label' => 'العلوم'],
                ['value' => 'law', 'label' => 'القانون'],
                ['value' => 'information_technology', 'label' => 'تقنية المعلومات'],
                ['value' => 'social_sciences', 'label' => 'العلوم الاجتماعية'],
                ['value' => 'humanities', 'label' => 'العلوم الإنسانية'],
                ['value' => 'agriculture', 'label' => 'الزراعة'],
                ['value' => 'media', 'label' => 'الإعلام'],
                ['value' => 'languages', 'label' => 'اللغات'],
                ['value' => 'environmental_sciences', 'label' => 'العلوم البيئية'],
                ['value' => 'tourism', 'label' => 'السياحة'],
                ['value' => 'hospitality', 'label' => 'الضيافة'],
                ['value' => 'sports', 'label' => 'الرياضة'],
                ['value' => 'arts_and_design', 'label' => 'الفنون والتصميم'],
                ['value' => 'information_systems', 'label' => 'أنظمة المعلومات'],
                ['value' => 'computer_science', 'label' => 'علوم الحاسوب'],
                ['value' => 'software_engineering', 'label' => 'هندسة البرمجيات'],
                ['value' => 'cyber_security', 'label' => 'الأمن السيبراني'],
                ['value' => 'data_science', 'label' => 'علوم البيانات'],
                ['value' => 'artificial_intelligence', 'label' => 'الذكاء الاصطناعي'],
                ['value' => 'networking', 'label' => 'الشبكات'],
                ['value' => 'cloud_computing', 'label' => 'الحوسبة السحابية'],

                ['value' => 'ce', 'label' => 'هندسة الحاسوب'],
                ['value' => 'it', 'label' => 'تقنية المعلومات'],
                ['value' => 'ba', 'label' => 'إدارة الأعمال'],
                ['value' => 'cs', 'label' => 'علوم الحاسوب'],
                ['value' => 'se', 'label' => 'هندسة البرمجيات'],
                ['value' => 'ee', 'label' => 'الهندسة الكهربائية'],
                ['value' => 'me', 'label' => 'الهندسة الميكانيكية'],
                ['value' => 'ce', 'label' => 'الهندسة المدنية'],
                ['value' => 'ar', 'label' => 'الهندسة المعمارية'],
                ['value' => 'me', 'label' => 'هندسة الطيران'],
                ['value' => 'ch', 'label' => 'الهندسة الكيميائية'],
                ['value' => 'bi', 'label' => 'الهندسة البيئية'],
                ['value' => 'ph', 'label' => 'الهندسة الفيزيائية'],
                ['value' => 'ch', 'label' => 'الهندسة الكيميائية'],
                ['value' => 'bi', 'label' => 'الهندسة البيئية'],
                ['value' => 'ph', 'label' => 'الهندسة الفيزيائية'],

                ],
            ],
            [
                'name' => 'levelOfEducation',
                'type' => 'select',
                'label' => 'الدرجة التعليمية:',
                'required' => true,
                'options' => [
                    ['value' => 'undergraduate', 'label' => 'طالب جامعي'],
                    ['value' => 'graduate', 'label' => 'خريج'],
                ],
            ],
        ];
    }
}
