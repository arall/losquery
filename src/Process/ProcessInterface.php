<?php

namespace Wrcx\Losquery\Process;

interface ProcessInterface
{
    /**
     * @param string        $command
     * @param callable|null $onData
     * @param callable|null $onError
     *
     * @return mixed
     */
    public function run($command, $onData = null, $onError = null);
}
