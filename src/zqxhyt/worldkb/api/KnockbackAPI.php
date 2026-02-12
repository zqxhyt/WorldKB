<?php

declare(strict_types=1);

namespace zqxhyt\worldkb\api;

use pocketmine\utils\Config;
use zqxhyt\worldkb\WorldKB;

final class KnockbackAPI{

    private Config $config;

    public function __construct(private WorldKB $plugin){
        $this->config = $plugin->getConfig();
    }

    public function reload() : void{
        $this->plugin->reloadConfig();
        $this->config = $this->plugin->getConfig();
    }

    /**
     * @return array{enabled: bool, horizontal: float, vertical: float}
     */
    public function getWorldSettings(string $worldName) : array{
        $default = $this->normalize($this->config->get("default", []));
        $worlds = $this->config->get("worlds", []);

        $settings = [];
        if(isset($worlds[$worldName]) && is_array($worlds[$worldName])){
            $settings = $worlds[$worldName];
        }

        return $this->normalize(array_merge($default, $settings));
    }

    public function setWorldSettings(string $worldName, bool $enabled, float $horizontal, float $vertical) : void{
        $worlds = $this->config->get("worlds", []);
        $worlds[$worldName] = [
            "enabled" => $enabled,
            "horizontal" => $horizontal,
            "vertical" => $vertical,
        ];

        $this->config->set("worlds", $worlds);
        $this->config->save();
    }

    public function isEnabled(string $worldName) : bool{
        return $this->getWorldSettings($worldName)["enabled"];
    }

    /**
     * @param array<mixed> $settings
     * @return array{enabled: bool, horizontal: float, vertical: float}
     */
    private function normalize(array $settings) : array{
        return [
            "enabled" => (bool)($settings["enabled"] ?? true),
            "horizontal" => (float)($settings["horizontal"] ?? 0.4),
            "vertical" => (float)($settings["vertical"] ?? 0.4),
        ];
    }
}
