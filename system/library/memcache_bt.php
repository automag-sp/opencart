<?php

class MemCache_BT {
  public $expire;
  private $cache;
  private $prefix;

  public function __construct($expire = 7200) {
    $this->expire = $expire;
    $this->cache  = new Memcache();
    $this->prefix = $_SERVER['HTTP_HOST'];
    $this->cache->pconnect('localhost', '11211');
  }

  public function get($key) {
    return $this->cache->get($this->prefix . $key);
  }

  public function set($key, $value, $expire = 0) {
    return $this->cache->set($this->prefix . $key, $value, MEMCACHE_COMPRESSED, $expire ?: $this->expire);
  }

  public function delete($key) {
    $this->cache->delete($this->prefix . $key);
  }
}
