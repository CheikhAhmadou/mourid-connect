<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('groups')
            ->where('name', 'Dahira Moustarchidine Paris')
            ->update([
                'name' => 'Dahira Diawartoulah Paris',
                'slug' => 'dahira-diawartoulah-paris',
            ]);
    }

    public function down(): void
    {
        DB::table('groups')
            ->where('name', 'Dahira Diawartoulah Paris')
            ->update([
                'name' => 'Dahira Moustarchidine Paris',
                'slug' => 'dahira-moustarchidine-paris',
            ]);
    }
};
