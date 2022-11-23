<?php

namespace cli;

class PrinterCmd
{
    public function out($message)
    {
        echo $message;
    }

    public function newline()
    {
        $this->out("\n");
    }

    public function display($message)
    {
        $this->newline();
        $this->out($message);
        $this->newline();
        $this->newline();
    }

    public function print($data)
    {
        if (is_array($data)) {
            print_r($data);
        } else {
            print $data;
        }
    }
}