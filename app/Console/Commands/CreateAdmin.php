<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;
use Hash;
use DB;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createAdmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $input['title'] = $this->ask('Please enter title?');
        $input['first_name'] = $this->ask('What is your first name?');
        $input['last_name'] = $this->ask('What is your last name?');
        $input['email'] = $this->ask('What is your email?');
        $input['password'] = $this->secret('What is the password?');
        $input['password'] = Hash::make($input['password']);
        $input['user_type'] = "Admin";
        $input['created_at'] = date('Y-m-d');
        $input['updated_at'] = date('Y-m-d');

        DB::table('users')->insert($input);
        $this->info('Admin Created Successfully.');
    }
}
