<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialSeeder extends Seeder
{
    public function run()
    {
        // We no longer call the generic ServicesSeeder to avoid conflicts.
        // We rely on specific seeders for each service type.
        $this->call('ProductsSeeder');
        $this->call('FacebookServiceSeeder');
        $this->call('ZaloAppServiceSeeder');
        $this->call('ZaloMarketingSeeder');
        $this->call('ContentServiceSeeder');
        $this->call('AcademySeeder');
        $this->call('CourseSeeder');
        $this->call('WebDemoSeeder');
        $this->call('TiktokServiceSeeder');
        $this->call('VpsManagementSeeder');
        $this->call('SslSeeder');
        $this->call('MoreProductsSeeder');
        $this->call('DesignServiceSeeder');
        $this->call('ProjectSeeder');
        $this->call('NewsCategorySeeder');
        $this->call('NewsSeeder');
    }
} 