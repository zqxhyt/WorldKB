<?php

declare(strict_types=1);

namespace zqxhyt\worldkb;

use pocketmine\plugin\PluginBase;
use zqxhyt\worldkb\api\KnockbackAPI;
use zqxhyt\worldkb\command\KBEditCommand;
use zqxhyt\worldkb\command\KBInfoCommand;
use zqxhyt\worldkb\command\KBReloadCommand;
use zqxhyt\worldkb\listener\KnockbackListener;

final class WorldKB extends PluginBase{

    private KnockbackAPI $knockbackAPI;

    protected function onEnable() : void{
        $this->saveDefaultConfig();
        $this->knockbackAPI = new KnockbackAPI($this);

        $this->getServer()->getPluginManager()->registerEvents(new KnockbackListener($this->knockbackAPI), $this);

        $this->registerCommands();
    }

    public function getKnockbackAPI() : KnockbackAPI{
        return $this->knockbackAPI;
    }

    private function registerCommands() : void{
        $kbEdit = $this->getCommand("kbedit");
        if($kbEdit !== null){
            $kbEdit->setExecutor(new KBEditCommand($this));
        }

        $kbInfo = $this->getCommand("kbinfo");
        if($kbInfo !== null){
            $kbInfo->setExecutor(new KBInfoCommand($this->knockbackAPI));
        }

        $kbReload = $this->getCommand("kbreload");
        if($kbReload !== null){
            $kbReload->setExecutor(new KBReloadCommand($this->knockbackAPI));
        }
    }
}
