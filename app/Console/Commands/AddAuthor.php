<?php

namespace App\Console\Commands;

use App\Providers\Services\ApiService;
use App\Providers\Services\AuthService;
use Illuminate\Console\Command;

class AddAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'author:add {first_name} {last_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new author via the API';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $token = AuthService::loginAsAdmin();
        ApiService::sendAuthorizedRequest(
            config('api.base_uri') . config('api.authors.create'),
            [
                'first_name' => $this->argument('first_name'),
                'last_name' => $this->argument('last_name'),
                "birthday" => "2024-04-14T17:35:39.171Z", // This should be dynamic but easier for testing
                "biography" => "bla bla",
                "gender" => "male",
                "place_of_birth" => "TestCity"
            ],
            'post',
            $token
        );
        // This could be error handled better
        $this->info('Author added successfully!');
    }
}
