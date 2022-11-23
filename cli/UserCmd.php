<?php

namespace cli;

use App\Modules\User\UserRepository;

class UserCmd
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = $this->userRepository ?? new UserRepository();
    }

    public function all(int $limit)
    {
        return $this->userRepository->all();
    }

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
}