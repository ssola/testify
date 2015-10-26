<?php

namespace Testify;

interface CommandHandlerInterface
{
    /**
     * @param $command
     * @return mixed
     */
    public function execute($command, $context);
}
