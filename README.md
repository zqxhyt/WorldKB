# WorldKB

WorldKB is a PocketMine-MP API 5 plugin that provides configurable custom knockback settings per world.  
It includes a clean KnockbackAPI architecture and an in-game Form UI editor for easy configuration.

Author: zqxhyt  
API: 5.0.0  
Version: 1.0.0  

---

## ✨ Features

- Per-world knockback settings
- Custom horizontal and vertical multipliers
- Enable/disable knockback per world
- In-game Form UI editor
- Clean modular KnockbackAPI system
- Lightweight and optimized
- Config auto-generation
- Runtime reload support

---

## 📦 Installation

1. Download or compile the plugin.
2. Place the `WorldKB` folder or compiled `.phar` file into your server's `plugins/` directory.
3. Restart the server.
4. The plugin will automatically generate `config.yml`.

---

## ⚙️ Configuration

Default `config.yml`:

```yaml
worlds:
  world:
    enabled: true
    horizontal: 0.4
    vertical: 0.4

Configuration Fields
Field	Type	Description
enabled	bool	Enables custom knockback in this world
horizontal	float	Horizontal knockback multiplier
vertical	float	Vertical knockback multiplier
🖥 Commands
Command	Description	Permission
/kbedit	Opens knockback editor for current world	worldkb.edit
/kbinfo	Displays current world knockback settings	worldkb.info
/kbreload	Reloads configuration file	worldkb.reload
🔐 Permissions

worldkb.edit:
  default: op

worldkb.info:
  default: true

worldkb.reload:
  default: op

🧠 Architecture

WorldKB uses a modular structure:

src/zqxhyt/worldkb/
 ├── WorldKB.php
 ├── api/KnockbackAPI.php
 ├── listener/KnockbackListener.php
 ├── ui/KnockbackForm.php
 └── command/

KnockbackAPI Responsibilities

    Manage world knockback settings

    Load & save config

    Provide world configuration access

    Apply custom knockback physics

This separation allows easy expansion for:

    Multiple knockback profiles

    Air/ground modifiers

    Sprint reset detection

    Combo scaling

    PvP practice modes

📈 Future Improvements (Optional)

    Per-kit knockback profiles

    Area-based knockback zones

    Advanced friction control

    Sprint reset multipliers

    Knockback presets (Sumo, Combo, Nodebuff)

    Performance profiling tools

🛠 Compatibility

    PocketMine-MP API 5.x

    Tested on latest stable PMMP release

📜 License

This project is open-source.
You may modify and redistribute it with proper credit.
💬 Support

For issues or feature requests, open a GitHub issue.
