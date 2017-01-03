<?php

namespace A2billingApi\Console\Commands;

use A2billingApi\User;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ChangeUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:change {email : The email of the user} {--P|password= : The new password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change user';

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
        $email = $this->argument('email');

        $this->info('User: ' . $email);

        try {
            $user = User::where(['email' => $email])->firstOrFail();

            if ($password = $this->option('password')) {
                $user->password = bcrypt($password);
                $user->save();
            }

        } catch (ModelNotFoundException $exception) {
            $this->error(
                sprintf('User not found with email. [email: %s]', $email)
            );

            return;
        }
    }
}
