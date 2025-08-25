<?php

namespace App\Jobs;

use App\Http\Controllers\Admin\CustomerController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessCustomerCreation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $customerData;

    /**
     * Create a new job instance.
     *
     * @param array $customerData
     * @return void
     */
    public function __construct(array $customerData)
    {
        $this->customerData = $customerData;
    }

    /**
     * Execute the job.
     *
     * @param CustomerController $customerController
     * @return void
     */
    public function handle(CustomerController $customerController)
    {
        try {
            $customerController->createCustomer($this->customerData);
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            Log::error('Failed to create customer: ' . $e->getMessage());
            $this->fail($e);
        }
    }
}
