<?php

if (! function_exists('console')) {
    /**
     * @return \Harrk\LaravelConsole\Console
     */
    function console() {
        return app(\Harrk\LaravelConsole\Console::class);
    }
}