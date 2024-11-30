<?php

namespace App;

use Symfony\Component\Yaml\Yaml;

class Config
{
    private static $config;

    public static function get(string $key)
    {
        if (self::$config === null) {
            $env = getenv('APP_ENV') ?: 'prod';
            $configFile = __DIR__ . "/../config.$env.yml";

            if (!file_exists($configFile)) {
                throw new \Exception("Configuration file not found: $configFile");
            }

            // Remove debug output
            self::$config = Yaml::parseFile($configFile);
        }

        $keys = explode('.', $key);
        $value = self::$config;

        foreach ($keys as $keyPart) {
            if (!isset($value[$keyPart])) {
                throw new \Exception("Configuration key not found: $key");
            }
            $value = $value[$keyPart];
        }

        return $value;
    }
}
