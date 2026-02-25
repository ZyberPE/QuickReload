<?php

declare(strict_types=1);

namespace QuickReload;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class Main extends PluginBase {

    public function onEnable(): void {
        $this->getLogger()->info(TextFormat::GREEN . "QuickReload enabled!");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if(strtolower($command->getName()) === "reload") {
            if(!$sender->hasPermission("quickreload.reload")) {
                $sender->sendMessage(TextFormat::RED . "You do not have permission to use this command.");
                return true;
            }

            $sender->sendMessage(TextFormat::YELLOW . "Reloading plugins and configuration...");
            
            // Reload all plugins
            $this->getServer()->getPluginManager()->reloadPlugins();

            $sender->sendMessage(TextFormat::GREEN . "Reload complete!");
            return true;
        }

        return false;
    }
}
