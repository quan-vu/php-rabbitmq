<?php

namespace Prabbit;

class App
{
    protected PrinterCmd $printerCmd;
    protected UserCmd $userCmd;

    protected array $registry = [];

    public function __construct()
    {
        $this->printerCmd = $this->printerCmd ?? new PrinterCmd();
        $this->userCmd = $this->userCmd ?? new UserCmd();
    }

    public function getPrinterCmd(): PrinterCmd
    {
        return $this->printerCmd;
    }

    public function getUserCmd(): UserCmd
    {
        return $this->userCmd;
    }

    public function registerCommand($name, $callable)
    {
        $this->registry[$name] = $callable;
    }

    public function getCommand($command)
    {
        return $this->registry[$command] ?? null;
    }

    public function runCommand(array $argv = [])
    {
        $command_name = "help";

        if (isset($argv[1])) {
            $command_name = $argv[1];
        }

        $command = $this->getCommand($command_name);
        if ($command === null) {
            $this->getPrinterCmd()->display("ERROR: Command \"$command_name\" not found.");
            exit;
        }

        call_user_func($command, $argv);
    }
}