<?php

interface CacheInterface
{
    /**
     * Get a value from cache
     *
     * @param string $key Key to get from cache
     *
     * @return mixed
     */
    public function get($key);

    /**
     * Set a value to cache
     *
     * @param string $key Cache key
     * @param mixed  $val Value to set
     *
     * @return mixed
     */
    public function set($key, $val);
}

class MemcacheCache implements CacheInterface
{
    public function get($key)
    {
        return $key . ' from memcache';
    }

    public function set($key, $val)
    {
        return 'set ' . $val . ' to memcache under ' . $key;
    }
}

class FilesystemCache implements CacheInterface
{

    public function get($key)
    {
        return $key . ' from file system cache';
    }

    public function set($key, $val)
    {
        return 'set ' . $val . ' to file system cache under ' . $key;
    }
}

class MoneyCache implements CacheInterface
{
    public function get($key)
    {
        return $key . ' from money cache';
    }

    public function set($key, $val)
    {
        return 'set ' . $val . ' to money cache under ' . $key;
    }
}