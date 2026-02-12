<?php

declare(strict_types=1);

namespace zqxhyt\worldkb\listener;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use zqxhyt\worldkb\api\KnockbackAPI;

final class KnockbackListener implements Listener{

    public function __construct(private KnockbackAPI $knockbackAPI){}

    public function onDamage(EntityDamageByEntityEvent $event) : void{
        $damager = $event->getDamager();
        $victim = $event->getEntity();

        if(!$damager instanceof Player || !$victim instanceof Player){
            return;
        }

        $worldName = $victim->getWorld()->getFolderName();
        $settings = $this->knockbackAPI->getWorldSettings($worldName);

        if(!$settings["enabled"]){
            return;
        }

        $event->setKnockBack(0.0);

        $delta = $victim->getPosition()->subtractVector($damager->getPosition());
        $horizontalLength = sqrt(($delta->x ** 2) + ($delta->z ** 2));

        if($horizontalLength <= 0.0){
            return;
        }

        $motion = new Vector3(
            ($delta->x / $horizontalLength) * $settings["horizontal"],
            $settings["vertical"],
            ($delta->z / $horizontalLength) * $settings["horizontal"]
        );

        $victim->setMotion($motion);
    }
}
