<?php

namespace Yanoox;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityRegainHealthEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class healthTag extends PluginBase implements Listener{

    public $time = 10;
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GOLD . "Plugin created by Yanoox");
    }

    public function setNameTag(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        $player->setNameTag($player->getName() . "\n" . TextFormat::WHITE . round($player->getHealth(), 1) . TextFormat::RED . "❤");
    }

    public function onDamage(EntityDamageEvent $event){
        $player = $event->getEntity();
        if ($player instanceof Player){
            $player->setNameTag($player->getName() . "\n" . TextFormat::RED . round($player->getHealth(), 1) . TextFormat::RED . "❤");
        }
        $player->setNameTag($player->getName() . "\n" . TextFormat::WHITE . round($player->getHealth(), 1) . TextFormat::RED . "❤");
    }

    public function onRegain(EntityRegainHealthEvent $event){
        $player = $event->getEntity();

        if ($player instanceof Player) {
            $player->setNameTag($player->getName() . "\n" . TextFormat::GREEN . round($player->getHealth(), 1) . TextFormat::RED . "❤");
        }
        $player->setNameTag($player->getName() . "\n" . TextFormat::WHITE . round($player->getHealth(), 1) . TextFormat::RED . "❤");
    }
}
