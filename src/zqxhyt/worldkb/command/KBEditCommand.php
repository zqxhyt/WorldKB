<?php

declare(strict_types=1);

namespace zqxhyt\worldkb\command;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use zqxhyt\worldkb\ui\KnockbackEditForm;
use zqxhyt\worldkb\WorldKB;

final class KBEditCommand implements CommandExecutor{

    public function __construct(private WorldKB $plugin){}

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        if(!$sender instanceof Player){
            $sender->sendMessage("§cThis command can only be used in-game.");
            return true;
        }

        (new KnockbackEditForm($this->plugin->getKnockbackAPI()))->send($sender);
        return true;
    }
}
