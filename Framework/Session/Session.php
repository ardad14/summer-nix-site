<?php

namespace Framework\Session;

class Session
{
    public function start(): bool
    {
        return session_start();
    }

    public function getName(): string
    {
        return session_name();
    }

    public function setName($name): void
    {
        session_name($name);
    }

    public function getId(): string
    {
        return session_id();
    }

    public function setId($id): void
    {
        session_id($id);
    }

    public function cookieExists(): bool
    {
        return !empty($_COOKIE);
    }

    public function sessionExists(): bool
    {
        return !empty($_SESSION);
    }

    public function destroy(): bool
    {
        return session_destroy();
    }

    public function setSavePath($savePath): void
    {
        session_save_path($savePath);
    }

    public function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return $_SESSION[$key];
    }

    public function contains($key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function delete($key): void
    {
        unset($_SESSION[$key]);
    }

}