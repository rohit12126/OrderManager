<?php

namespace App\Console\Commands;

use PDO;
use PDOException;
use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;

class SetupProject extends Command
{

    use ConfirmableTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'setup of the project';

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
        $this->info('Setting up env');
        $this->info('Setting up App Url');
        $this->call('cache:clear');
        $this->call('config:cache');
        $this->setAppUrl();
        $this->call('key:generate');
        $this->setDBCredentials();
        $this->info('Setup Done Successfully');
    }

    protected function setDBCredentials(){

        $db['DB_DATABASE'] = $this->ask('Provide DB Name:');
        $db['DB_HOST'] = $this->ask('Provide DB Host:');
        $db['DB_USERNAME'] = $this->ask('Provide DB Username:');
        $db['DB_PASSWORD'] = $this->ask('Provide DB Password:');
        $db['DB_CONNECTION'] = $this->ask('Provide DB Connection:');
        $db['DB_PORT'] = $this->ask('Provide DB Port:');

        if (count($db) !== 0 && (! $this->confirmToProceed())) {
            return false;    
        }

        $this->info('Setting up Database Credentials');
        
        foreach ($db as $key => $value) {
            if(!empty(trim($value)))
                $this->writeNewEnvironmentFileWith($key,$value);
        }

        $this->info('Setting Up Database Credentials Completed');
        return true;
    }


    protected function setAppUrl(){
        $app_url = $this->ask('Give App Url:');
        $this->writeNewEnvironmentFileWith('APP_URL',$app_url);
    }

    protected function writeNewEnvironmentFileWith($key,$value)
    {
        file_put_contents($this->laravel->environmentFilePath(), preg_replace(
            $this->keyReplacementPattern($key),
            $key.'='.$value,
            file_get_contents($this->laravel->environmentFilePath())
        ));

        
    }

    protected function keyReplacementPattern($key)
    {
        $escaped = preg_quote('='.env($key), '/');
        $this->info("Escapted for ".$key.":".$escaped);
        return "/^$key{$escaped}/m";
    }
}
