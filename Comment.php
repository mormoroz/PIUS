<?php

class Comment
{
    protected User $user;
    public string $message;
    public string $timestamp;

    /**
     * @param User $user
     * @param string $message
     */
    function __construct(User $user, string $message){
        $this->user = $user;
        $this->message = $message;
        $this->timestamp = date("H:i:s");
    }
}