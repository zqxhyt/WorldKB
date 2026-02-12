<?php

declare(strict_types=1);

namespace zqxhyt\worldkb\ui;

use jojoe77777\FormAPI\CustomForm;
use pocketmine\player\Player;
use zqxhyt\worldkb\api\KnockbackAPI;

final class KnockbackEditForm{

    public function __construct(private KnockbackAPI $knockbackAPI){}

    public function send(Player $player) : void{
        if(!class_exists(CustomForm::class)){
            $player->sendMessage("§cFormAPI is not installed. Please install FormAPI to use /kbedit.");
            return;
        }

        $worldName = $player->getWorld()->getFolderName();
        $settings = $this->knockbackAPI->getWorldSettings($worldName);

        $form = new CustomForm(function(Player $player, ?array $data) use ($worldName) : void{
            if($data === null){
                return;
            }

            $enabled = (bool)($data[0] ?? true);
            $horizontalRaw = trim((string)($data[1] ?? ""));
            $verticalRaw = trim((string)($data[2] ?? ""));

            if(!is_numeric($horizontalRaw) || !is_numeric($verticalRaw)){
                $player->sendMessage("§cHorizontal and vertical values must be numeric.");
                return;
            }

            $horizontal = (float)$horizontalRaw;
            $vertical = (float)$verticalRaw;

            if($horizontal < 0 || $vertical < 0){
                $player->sendMessage("§cHorizontal and vertical values must be >= 0.");
                return;
            }

            $this->knockbackAPI->setWorldSettings($worldName, $enabled, $horizontal, $vertical);
            $player->sendMessage("§aKnockback settings updated for world §e{$worldName}§a.");
        });

        $form->setTitle("WorldKB Editor");
        $form->addToggle("Enable custom knockback", $settings["enabled"]);
        $form->addInput("Horizontal", "0.4", (string)$settings["horizontal"]);
        $form->addInput("Vertical", "0.4", (string)$settings["vertical"]);

        $player->sendForm($form);
    }
}
