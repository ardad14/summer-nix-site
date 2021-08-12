<?php

namespace Framework\Session;

class Session
{
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function start(): bool
    {
        if($this->sessionExists()) {
            return false;
        }
        return session_start();
    }

    public function getName(): ?string
    {
        if($this->sessionExists()) {
            return session_name();
        }
        return null;
    }

    public function setName($name): bool
    {
        if($this->sessionExists()) {
            session_name($name);
            return true;
        }
        return false;
    }

    public function getId(): ?string
    {
        if($this->sessionExists()) {
            return session_id();
        }
        return null;
    }

    public function setId($id): bool
    {
        if($this->sessionExists()) {
            session_id($id);
            return true;
        }
        return false;
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
        if($this->sessionExists()) {
            return session_destroy();
        }
        return false;
    }

    public function setSavePath($savePath): bool
    {
        if($this->sessionExists()) {
            session_save_path($savePath);
            return true;
        }
        return false;
    }

    public function setKey($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function getKey($key)
    {
        if($this->sessionExists() && $this->containsKey($key)) {
            return $_SESSION[$key];
        }
        return null;
    }

    public function containsKey($key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function deleteKey($key)
    {
        unset($_SESSION[$key]);
    }

}