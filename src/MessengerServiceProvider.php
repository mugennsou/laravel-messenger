<?php

namespace Mugennsou\LaravelMessenger;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use Mugennsou\LaravelMessenger\Notifications\Channels\MessengerChannel;
use Overtrue\EasySms\EasySms;

class MessengerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/messenger.php' => config_path('messenger.php'),
            ]);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfig();

        $this->registerMessenger();

        $this->registerChannels();
    }

    /**
     * Merge config file.
     */
    protected function mergeConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/messenger.php', 'messenger');
    }

    /**
     * Register Messenger service.
     */
    protected function registerMessenger(): void
    {
        $this->app->singleton('messenger', function (Application $app) {
            return new EasySms($app->make('config')->get('messenger'));
        });

        $this->app->alias('messenger', EasySms::class);
    }

    /**
     * Register channels.
     */
    protected function registerChannels(): void
    {
        Notification::extend('messenger', function () {
            return $this->app->make(MessengerChannel::class);
        });
    }
}
