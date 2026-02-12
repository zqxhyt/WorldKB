<?php

declare(strict_types=1);

namespace zqxhyt\worldkb\command;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use zqxhyt\worldkb\api\KnockbackAPI;

final class KBInfoCommand implements CommandExecutor{

    public function __construct(private KnockbackAPI $knockbackAPI){}

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        if(!$sender instanceof Player){
            $sender->sendMessage("§cThis command can only be used in-game.");
            return true;
        }

        $worldName = $sender->getWorld()->getFolderName();
        $settings = $this->knockbackAPI->getWorldSettings($worldName);

        $sender->sendMessage("§6[WorldKB] §fWorld: §e{$worldName}");
        $sender->sendMessage("§6[WorldKB] §fEnabled: " . ($settings["enabled"] ? "§atrue" : "§cfalse"));
        $sender->sendMessage("§6[WorldKB] §fHorizontal: §b{$settings["horizontal"]}");
        $sender->sendMessage("§6[WorldKB] §fVertical: §b{$settings["vertical"]}");
        return true;
    }
}
