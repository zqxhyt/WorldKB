<?php

declare(strict_types=1);

namespace zqxhyt\worldkb\command;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use zqxhyt\worldkb\api\KnockbackAPI;

final class KBReloadCommand implements CommandExecutor{

    public function __construct(private KnockbackAPI $knockbackAPI){}

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        $this->knockbackAPI->reload();
        $sender->sendMessage("§aWorldKB config reloaded.");
        return true;
    }
}
