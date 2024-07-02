<?php

namespace Box\event;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\item\Item;
use pocketmine\inventory\PlayerOffHandInventory;

class OffHandListener implements Listener {
 
    private $plugin;
    private $config;

    public function __construct(PluginBase $plugin) {
        $this->plugin = $plugin;
        $this->config = $plugin->getConfig();
    }

    public function onInteract(PlayerInteractEvent $ev){
        $p = $ev->getPlayer();
        $item = $this->config->get("item");
        $effect2 = $this->config->get("effect");
        $heart = $this->config->get("hearts");
        $item = Item::get($itemID);

        $off = $p->getOffHandInventory()->getItem(0);
        if ($off->getId() === $item) {
            $effect = Effect::getEffect($effect2);
            $effectinstance = new EffectInstance::($effect, 600, 1);
            $p->addEffect($effectinstance);
            $p->setMaxHealth($p->getMaxHealth() + $hearts * 2);
    }
}
}