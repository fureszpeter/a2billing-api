<?php

namespace A2billingApi\Console\Commands;

use A2billingApi\User;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\Console\Helper\Table;

class ListUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List API users';

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
        /** @var Collection $users */
        $users = User::all(['name', 'email', 'password', 'created_at']);

        $table = new Table($this->getOutput());
        $table->setHeaders([
            'name',
            'email',
            'created',
        ]);

        $table->setRows($users->toArray());

        $table->render();
    }
}
