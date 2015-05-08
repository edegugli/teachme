<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateTables(array(
            'migrations',
            'password_resets',
            'tickets',
            'ticket_comments',
            'ticket_votes',
            'users',
        ));

        $this->call('UserTableSeeder');
        $this->call('TicketTableSeeder');
        $this->call('TicketVoteTableSeeder');
        $this->call('TicketCommentTableSeeder');
    }

    public function truncateTables($tables)
    {
        $this->checkForeignKeys(false);
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        $this->checkForeignKeys(true);
    }

    public function checkForeignKeys($check)
    {
        $check = $check ? '1' : '0';
        DB::statement("SET FOREIGN_KEY_CHECKS = $check");
    }
}
