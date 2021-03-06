<?php

namespace Prettus\RequestLogger\Jobs\Compatibility;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;

/**
 * Class LogTask53
 * @package Prettus\RequestLogger\Jobs\Compatibility
 * @author Anderson Andrade [contato@andersonandra.de]
 */
class LogTask53 implements ShouldQueue
{
    use Queueable, InteractsWithQueue, SerializesModels;

    protected $request;
    protected $response;

    /**
     * LogTask constructor.
     * @param $request
     * @param $response
     */
    public function __construct($request, $response)
    {
        $this->request  = $request;
        $this->response = $response;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $requestLogger = app(\Prettus\RequestLogger\ResponseLogger::class);
        $requestLogger->log($this->request, $this->response);
    }
}
