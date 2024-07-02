<?php

namespace Box\Loader;

use pocketmien\plugin\PluginBase;
use pocketmine\utils\Config;
use Box\event\OffHandListener;


class Loader extends PluginBase {

    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        $this->getServer()->getPluginManager()->registerEvents(new OffHandListener($this), $this);
    }
}