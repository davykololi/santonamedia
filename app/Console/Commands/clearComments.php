<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Comment;
use Illuminate\Console\Command;

class ClearComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:comments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear post comments monthly';

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
        //
        $data = Carbon::today()->subDays(30);
        Comment::where('created_at','<=',$data)->delete();
        $this->info('Thirty days old comments deleted from database successfully');
    }
}
