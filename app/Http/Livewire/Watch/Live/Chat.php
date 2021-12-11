<?php

namespace App\Http\Livewire\Watch\Live;

use Livewire\Component;

class Chat extends Component
{
    public $nickname = 'A';

    public $msgBox = '';

    public $chatTextarea = '';

    public $channel = '';

    private function printOnTextarea($string)
    {
        $this->chatTextarea = $this->chatTextarea . "\n" . $string;
    }

    public function setNickname()
    {
        $this->printOnTextarea('! Nickname set: ' . $this->nickname);
    }

    public function startChat()
    {
        $this->printOnTextarea('! Connected to stream chat.');
    }

    public function clearChat()
    {
        $this->chatTextarea = '';
    }

    public function sendMsg()
    {
        $this->printOnTextarea($this->nickname . ": " . $this->msgBox);
        $this->msgBox = '';
    }

    public function __construct()
    {
        $this->printOnTextarea('! Chat Client Initialized');
    }

    public function render()
    {
        return view('livewire.watch.live.chat');
    }
}
