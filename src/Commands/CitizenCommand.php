<?php

namespace Citizen\Commands;

use Illuminate\Console\Command;

class CitizenCommand extends Command
{
    public $signature = 'laravel-citizen';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
