<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new Acme\DemoBundle\AcmeDemoBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }

    /**
     * Cache folders for production deployment
     *
     * @return string
     */
    public function getCacheDir()
    {
        if ($this->getEnvironment() == 'prod') {
            if (!is_dir(sys_get_temp_dir() . '/sf2standard/cache')) {
                mkdir(sys_get_temp_dir() . '/sf2standard/cache', 0777, true);
            }

            return sys_get_temp_dir() . '/sf2standard/cache';
        }

        return parent::getCacheDir();
    }

    /**
     * Log folders for production deployment
     *
     * @return string
     */
    public function getLogDir()
    {
        if ($this->getEnvironment() == 'prod') {
            if (!is_dir(sys_get_temp_dir() . '/sf2standard/logs')) {
                mkdir(sys_get_temp_dir() . '/sf2standard/logs', 0777, true);
            }


            return sys_get_temp_dir() . '/sf2standard/logs';
        }

        return parent::getLogDir();
    }
}
