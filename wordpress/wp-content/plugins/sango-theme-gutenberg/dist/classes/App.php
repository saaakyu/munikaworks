<?php

namespace SangoBlocks;

class App
{
    private static $singleton;
    private $instances = [];
    private $dirName = '';
    private $url = '';
    private $is_plugin = false;

    public static function isPlugin() {
      $self = self::singleton();
      return $self->is_plugin;
    }

    public static function setIsPlugin($is_plugin) {
      $self = self::singleton();
      $self->is_plugin = $is_plugin;
    }

    public static function getUrl($url) {
      $args = array(
        "version" => SGB_VER_NUM,
      );
      if (is_user_logged_in()) {
        $args["wexal"] = "purge";
      }
      $script_url = "";
      if (App::isPlugin()) {
        $script_url = plugins_url($url, dirname(__FILE__));
      } else {
        $script_url = get_template_directory_uri().'/library/sango-theme-gutenberg/dist/'.$url;
      }
      return add_query_arg($args, $script_url);
    }

    public static function getDirUrl($url) {
      if (App::isPlugin()) {
        return plugins_url($url, dirname(__FILE__)) . '/';
      }
      return get_template_directory_uri().'/library/sango-theme-gutenberg/dist/'. $url . '/';
    }

    public static function register($name, $class)
    {
        $singleton = self::singleton();
        $singleton->instances[$name] = new $class();
    }

    public static function singleton()
    {
        if (!isset(self::$singleton)) {
            self::$singleton = new App();
        }
        return self::$singleton;
    }

    public static function get($name)
    {
        $singleton = self::singleton();
        if (!isset($singleton->instances[$name])) {
            return null;
        }
        return $singleton->instances[$name];
    }

    public static function requireDir($dirName)
    {
        if (!is_dir($dirName)) {
          return;
        }
        foreach (scandir($dirName) as $filename) {
            $path = $dirName . '/' . $filename;
            $pathInfo = pathinfo($path);
            if (is_file($path) && $pathInfo['extension'] === 'php') {
                include_once $path;
            }
        }
    }

    public static function setRootPluginDir($dirName)
    {
        $singleton = self::singleton();
        $singleton->dirName = $dirName;
    }

    public static function getRootPluginDir()
    {
        $singleton = self::singleton();
        return $singleton->dirName;
    }

    public static function getRootPluginUrl()
    {
        $singleton = self::singleton();
        return $singleton->url;
    }

    public static function setRootPluginUrl($url)
    {
        $singleton = self::singleton();
        $singleton->url = $url;
    }

    public static function rootPluginDir()
    {
        $singleton = self::singleton();
        return $singleton->dirName;
    }

    public static function rootPluginUrl()
    {
        $singleton = self::singleton();
        return $singleton->url;
    }

    public static function run()
    {
        self::hook('init');
    }

    public static function hook($hookName)
    {
        $singleton = self::singleton();
        $instances = $singleton->instances;
        foreach ($instances as $instance) {
          $instance->$hookName();
        }
    }
}
