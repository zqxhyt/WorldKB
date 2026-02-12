# WorldKB

WorldKB is a PocketMine-MP API 5 plugin that provides per-world custom knockback controls for PvP.

## Features

- Per-world knockback settings (`enabled`, `horizontal`, `vertical`)
- Custom knockback application when a player damages another player
- `/kbedit` form UI for editing current world knockback values
- `/kbinfo` command to view the current world's knockback values
- `/kbreload` command to reload `config.yml` without restarting the server

## Requirements

- PocketMine-MP 5.x
- PHP 8.1+
- Optional but recommended: [FormAPI](https://github.com/jojoe77777/FormAPI) for `/kbedit`

## Installation

1. Put this repository folder into your PocketMine-MP `plugins/` directory (or build and copy as needed).
2. Ensure the folder name is `WorldKB`.
3. Start or restart the server.
4. (Optional) Install and enable FormAPI to use `/kbedit`.

## Commands

- `/kbedit` - Open the knockback editor form for your current world.
- `/kbinfo` - Show current world knockback settings.
- `/kbreload` - Reload configuration from disk.

## Permissions

- `worldkb.edit` (default: op)
- `worldkb.info` (default: true)
- `worldkb.reload` (default: op)

## Configuration

Default `config.yml`:

```yaml
default:
  enabled: true
  horizontal: 0.4
  vertical: 0.4
worlds:
  world:
    enabled: true
    horizontal: 0.4
    vertical: 0.4
```

Each world can define:

- `enabled` (bool)
- `horizontal` (float)
- `vertical` (float)

## Development Helpers

Use the provided `Makefile`:

- `make lint` - Syntax-check all PHP files.
- `make tree` - Show project file tree.
