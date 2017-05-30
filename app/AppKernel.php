<?php
/**
 * This file is autogenerated by ANT.
 */
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

require __DIR__ . '/BaseKernel.php';

class AppKernel extends BaseKernel
{
    /**
     * {@inheritdoc}
     *
     * @api
     */
    public function getCacheDir()
    {
        return '/storage/system/cache';
    }

    /**
     * {@inheritdoc}
     *
     * @api
     */
    public function getLogDir()
    {
        return '/storage/system/logs';
    }
}
