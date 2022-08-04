<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminrecord = [
            ['id'=>1 , 'name'=>'Super Admin' ,'type'=>'superadmin','vendor_id'=>0,'mobile'=>'8675654540','email'=>'admin@admin.com','password'=>'$2a$12$DRZuw0QV6cCsaFwNHyzmZulX17vZGvjru0vSfLPtViOmtHvhtCN8S','image'=>'','status'=>1]
        ];
        Admin::insert($adminrecord);
    }
}
