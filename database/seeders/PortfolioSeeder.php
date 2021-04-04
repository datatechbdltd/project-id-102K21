<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 6; $i++) {
            $portfolio = new Portfolio();
            $portfolio->short_title = 'Protfolio short title '.$i;
            $portfolio->long_title = 'Protfolio long title '.$i;
            $portfolio->short_description = 'Protfolio short description '.$i;
            $portfolio->long_description = 'Protfolio long description '.$i;
            $portfolio->category_id = $i;
            $portfolio->slug = 'Protfolio short title '.$i.time().'-'.Str::random(12);
            $portfolio->save();
        }
    }
}
