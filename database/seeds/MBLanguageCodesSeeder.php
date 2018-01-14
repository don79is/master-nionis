<?php

use App\Models\MBLanguage_codes;
use Illuminate\Database\Seeder;

class MBLanguageCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language_codes = [
            ["id" => "lt","language_code" => "lt", "name" => "Lietuvių", "is_active" => 0 ],
            ["id" => "en","language_code" => "en", "name" => "English", "is_active" => 0],
            ["id" => "ru","language_code" => "ru", "name" => "Русский", "is_active" => 0]

        ];
        DB::beginTransaction();
        try {
            foreach ($language_codes as $item) {
                $record = MBLanguage_codes::find($item['id']);
                if (!$record) {
                    MBLanguage_codes::create($item);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            echo 'Point of failure ' . $e->getCode() . ' ' . $e->getMessage();
            throw new Exception($e);
        }
        DB::commit();
    }
}
