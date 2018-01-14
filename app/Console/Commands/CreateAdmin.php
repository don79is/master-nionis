<?php

namespace App\Console\Commands;

use App\Models\Users;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mb:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin';

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
        $this->comment('Creating admin user');
        $name = $this->ask('insert name');
        $email = $this->ask('insert email');
        $password = $this->secret('insert password');

         Users::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),

        ]);
    }
}
