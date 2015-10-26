<?php

namespace Testify;

interface HandlerInterface
{
    /**
     * @param Context $context
     * @return mixed
     */
    public function handle(Context $context);
}
