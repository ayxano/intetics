<?php

namespace Libraries;

class Config
{
    private $configData = [];

    public function __construct()
    {
        $this->loadEnv();
    }

    public function get($key, $default = null)
    {
        return isset($this->configData[$key]) ? $this->configData[$key] : $default;
    }

    private function loadEnv()
    {
        $envFile = '../.env';
        if (!file_exists($envFile)) {
            throw new \Exception('.env file not found.');
        }

        $envContents = file_get_contents($envFile);
        $lines = explode("\n", $envContents);

        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || strpos($line, '#') === 0) {
                continue; // Skip empty lines and comments
            }

            $parts = explode('=', $line, 2);
            if (count($parts) === 2) {
                $key = trim($parts[0]);
                $value = trim($parts[1], " \t\n\r\0\x0B\"'");
                $this->configData[$key] = $value;
            }
        }
    }
}
