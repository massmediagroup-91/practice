<?php

namespace App\Console\Commands;

use App\File;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteInTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:inTime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes the file at the set time';

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
     * @throws \Exception
     */
    public function handle()
    {
        File::query()->whereDate('when_delete', '<=', Carbon::now())->delete();
    }
}
