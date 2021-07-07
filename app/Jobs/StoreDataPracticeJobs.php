<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Repository\PracticeRepository;

class StoreDataPracticeJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $name;
    protected $description;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $practiceRepo = new PracticeRepository();
//         dd($this->name);
        $requestArr = ['testName'=>$this->name, 'testDescription'=>$this->description];
     	$practiceRepo->storeDataPractice($requestArr);   
    }
}
