<?php

namespace Testify;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class CommandHandler implements CommandHandlerInterface
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @var array
     */
    protected $configFiles = [
        __DIR__ . '/config/services.yml'
    ];

    /**
     * @inheritdoc
     */
    public function execute($command, $context)
    {
        $this->get($command)->handle($context);
    }

    /**
     * @param $serviceId
     * @return object
     */
    public function get($serviceId)
    {
        return $this->getContainer()->get($serviceId);
    }

    /**
     * @return ContainerBuilder
     */
    public function getContainer()
    {
        $container = new ContainerBuilder();

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__));

        foreach ($this->configFiles as $config) {
            $loader->load($config);
        }

        $container->compile();

        return $container;
    }

    /**
     * @param $configFile
     */
    protected function addConfigFile($configFile)
    {
        if (!file_exists($configFile)) {
            throw new \InvalidArgumentException('Given config file doesnt exists');
        }

        $this->configFiles[] = $configFile;
    }
}
