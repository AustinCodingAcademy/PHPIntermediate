// Create an interface called CacheInterface
// CacheInterface has two methods, get($key) and set($key, $val)

// Create a class called MemCache that implements the CacheInterface
// Create a class called RedisCache that implements the CacheInterface

// We want to force both MemCache and RedisCache to have the methods
// get($key) and set($key, $val)
<?php

interface CacheInterface
{
    public function get($key);

    public function set($key, $val);
}

class MemCache implements CacheInterface
{
    public function get($key)
    {
    }

    public function set($key, $val)
    {
    }
}