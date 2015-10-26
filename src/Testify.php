<?php

namespace Testify;

use React\Socket\Connection;

class Testify
{
    /**
     * @var array
     */
    protected $commands = [
        'start' => 'command.handler.start'
    ];

    /**
     * @var CommandHandlerInterface
     */
    private $commandHandler;

    /**
     * @param CommandHandlerInterface $commandHandler
     */
    public function __construct(CommandHandlerInterface $commandHandler)
    {
        $this->commandHandler = $commandHandler;
    }

    public function welcome()
    {
        return 'Welcome to Testify! Type submit in order to send your test to us.';
    }

    public function handle($data, Connection $conn)
    {
        $data = trim($data);

        if (isset($this->commands[$data])) {
            $this->commandHandler->execute($this->commands[$data], new Context($conn, $data));
        }
    }
}
