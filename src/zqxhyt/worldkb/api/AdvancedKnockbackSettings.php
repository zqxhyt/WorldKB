<?php

namespace zqxhyt\worldkb\api;

class AdvancedKnockbackSettings {

    // Player vs Player Knockback Settings
    private $playerVsPlayerKnockback;

    // Player vs Mob Knockback Settings
    private $playerVsMobKnockback;

    // Knockback Resistance
    private $knockbackResistance;

    // Velocity Modifiers
    private $velocityModifiers;

    public function __construct() {
        // Default settings
        $this->playerVsPlayerKnockback = 1.0;
        $this->playerVsMobKnockback = 1.0;
        $this->knockbackResistance = 0.0;
        $this->velocityModifiers = [];
    }

    // Setters and getters for each property
    public function setPlayerVsPlayerKnockback($value) {
        $this->playerVsPlayerKnockback = $value;
    }

    public function getPlayerVsPlayerKnockback() {
        return $this->playerVsPlayerKnockback;
    }

    public function setPlayerVsMobKnockback($value) {
        $this->playerVsMobKnockback = $value;
    }

    public function getPlayerVsMobKnockback() {
        return $this->playerVsMobKnockback;
    }

    public function setKnockbackResistance($value) {
        $this->knockbackResistance = $value;
    }

    public function getKnockbackResistance() {
        return $this->knockbackResistance;
    }

    public function addVelocityModifier($type, $value) {
        $this->velocityModifiers[$type] = $value;
    }

    public function getVelocityModifiers() {
        return $this->velocityModifiers;
    }
}

?>