<?php

namespace Harrk\LaravelConsole;

use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Output\ConsoleOutput;

class Console {

    /**
     * @var ConsoleOutput
     */
    private $console;

    /**
     * @var OutputFormatter=
     */
    private $formatter;

    /**
     * Console constructor.
     */
    public function __construct() {
        $this->registerConsole();
        $this->registerStyles();
    }

    /**
     * Register the console
     */
    protected function registerConsole() {
        $this->console = new ConsoleOutput(ConsoleOutput::VERBOSITY_NORMAL, true);
        $this->formatter = new OutputFormatter(true);

        $this->console->setFormatter($this->formatter);
    }

    /**
     * Register additional styles
     */
    protected function registerStyles() {
        $this->setStyle('warning', new OutputFormatterStyle('yellow'));
    }

    /**
     * @return bool
     */
    protected function isEnabled() {
        return app()->runningInConsole();
    }

    /**
     * Set a new style
     *
     * @param string $name
     * @param OutputFormatterStyle $outputFormatterStyle
     */
    public function setStyle($name, OutputFormatterStyle $outputFormatterStyle) {
        $this->formatter->setStyle($name, $outputFormatterStyle);
    }

    /**
     * Write a line to the console
     *
     * @param string $msg
     * @param string|null $style
     */
    public function writeLine($msg, $style = null) {
        if ($this->isEnabled()) {
            if (null !== $style) {
                $this->console->writeln('<' . $style . '>' . $msg . '</' . $style . '>');
            } else {
                $this->console->writeln($msg);
            }
        }
    }

    /**
     * Write a warning message to the console
     *
     * @param string $msg
     */
    public function warning($msg) {
        $this->writeLine($msg, 'warning');
    }

    /**
     * Write an info message to the console
     *
     * @param string $msg
     */
    public function info($msg) {
        $this->writeLine($msg, 'info');
    }

    /**
     * Write an error message to the console
     *
     * @param string $msg
     */
    public function error($msg) {
        $this->writeLine($msg, 'error');
    }

    /**
     * Alias for error
     * @param $msg
     */
    public function danger($msg) {
        $this->error($msg);
    }

    /**
     * Write a comment message to the console
     *
     * @param string $msg
     */
    public function comment($msg) {
        $this->writeLine($msg, 'comment');
    }

    /**
     * Write a question message to the console
     *
     * @param string $msg
     */
    public function question($msg) {
        $this->writeLine($msg, 'question');
    }

}