<?php

namespace Harrk\LaravelConsole;

use Illuminate\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider {

    /**
     * Register Console Singleton
     */
    public function register() {
        $this->app->singleton(Console::class, function() {
            return new Console();
        });
    }

}