<?php

namespace Testify\Handler;

use React\Socket\Connection;
use Testify\Context;
use Testify\HandlerInterface;

class StartHandler implements HandlerInterface
{
    /**
     * @param Context $context
     * @return mixed
     */
    public function handle(Context $context)
    {
        $context->getConnection()->write('Which test are you gonna do? ');
        $testId = $email = null;

        $context->getConnection()->once('data', function($testId, Connection $conn) use ($context, $testId, $email) {
            $context->getConnection()->write('Ok you will do task' . $testId);
            $context->getConnection()->write('Please type your email: ');

            $context->getConnection()->once('data', function ($data, Connection $conn) use ($context, $testId, $email) {
                $context->getConnection()->write('Your email is ' . $data);
            });
        });
    }
}
