<?php

namespace App\Jobs;

use App\Domain\Contracts\MainContract;
use App\Services\CompletionDateService;
use App\Services\CompletionService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CompletionCount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $rid;
    public function __construct(int $rid)
    {
        $this->rid  =   $rid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CompletionService $completionService,CompletionDateService $completionDateService)
    {
        $completionList =   $completionService->list($this->rid);
        if ($completionDate =   $completionDateService->getByRid($this->rid)) {
            $completionDate->{MainContract::UPLOAD_STATUS_ID}   =   $completionList[MainContract::UPLOAD_STATUS_ID];
            $completionDate->{MainContract::DOCUMENT_ALL}   =   $completionList[MainContract::DOCUMENT_ALL];
            $completionDate->save();
        } else {
            $completionDateService->create([
                MainContract::UPLOAD_STATUS_ID  =>  $completionList[MainContract::UPLOAD_STATUS_ID],
                MainContract::RID   =>  $this->rid,
                MainContract::DOCUMENT_ALL  =>  $completionList[MainContract::DOCUMENT_ALL],
            ]);
        }
    }
}