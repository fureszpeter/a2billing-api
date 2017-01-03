<?php

namespace A2billingApi\Console\Commands;

use A2billingApi\User;
use Illuminate\Console\Command;
use InvalidArgumentException;

class AddUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:add {--U|username= : U} {--E|email=} {--P|password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating a user';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userDetails = $this->input->getOptions();

        try {
            $this->assertNotEmpty($userDetails, 'password');
            $this->assertNotEmpty($userDetails, 'email');
            $this->assertNotEmpty($userDetails, 'username');

            $user = User::create([
                'name'      => $userDetails['username'],
                'email'     => $userDetails['email'],
                'password'  => bcrypt($userDetails['password']),
            ]);

            $this->info($user->toJson());
        } catch (InvalidArgumentException $e) {
            $this->error($e->getMessage());
        }
    }

    /**
     * @param array  $inputs
     * @param string $optionKey
     */
    private function assertNotEmpty(array $inputs, string $optionKey)
    {
        if (empty(trim($inputs[$optionKey]))) {
            throw new InvalidArgumentException(
                sprintf('Mandatory value missing. [key: %s]', $optionKey)
            );
        }
    }
}
