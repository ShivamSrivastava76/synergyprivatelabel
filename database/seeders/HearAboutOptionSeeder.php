<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HearAboutOption;

class HearAboutOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'Amazon';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();

        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'Call from Us';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();

        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'Email from Us';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();

        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'Facebook';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();

        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'Friend of the Sea';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();

        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'GlobalPets';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();

        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'GOED';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();

        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'LinkedIn';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();

        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'MSC';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();
        
        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'NOAA';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();

        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'Nutrition Industry Executive';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();

        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'Referral or Recommendation';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();

        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'Social Media';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();

        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'Trade Journal';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();

        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'Trade Show';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();

        $hearaboutoption  = new HearAboutOption();
        $hearaboutoption->name = 'Web Search';
        $hearaboutoption->status = 0;
        $hearaboutoption->save();
    }
}
