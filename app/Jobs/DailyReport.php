<?php

namespace App\Jobs;

use App\Mail\DailyReportMail;
use App\Models\Number;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class DailyReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            $path = '/daily_reports/'.Carbon::today()->toDateString().'_report.txt';
            Storage::disk('public')->put($path, '');
            $list = Number::query()
                ->select('id', 'value')
                ->whereDate('created_at', '=', Carbon::today()->toDateString())
                ->get();

            Storage::disk('public')->put($path, json_encode($list));
            $numbers = Storage::disk('public')->get($path);
            Mail::to($_ENV['ADMIN_EMAIL'])->send(new DailyReportMail($numbers));
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
