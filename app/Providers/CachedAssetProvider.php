<?php

namespace App\Providers;

use Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Cached\CachedAdapter;
use League\Flysystem\Cached\Storage\Memory;
use League\Flysystem\Filesystem;

class CachedAssetProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('s3-cached', function ($app, $config) {
            $adapter = $app['filesystem']->createS3Driver($config);
            $store = new Memory();

            return new Filesystem(new CachedAdapter($adapter->getDriver()->getAdapter(), $store));
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
