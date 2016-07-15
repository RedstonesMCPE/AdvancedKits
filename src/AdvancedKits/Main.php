<?php

namespace AdvancedKits;

use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\permission\Permission;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as C;
use pocketmine\Server;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getLogger()->info("AdvancedKits by CaptainDuck enabled!");
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        $this->saveResource("config.yml");
    }
    public function onDisable(){
        $this->getLogger()->info("ExtraCommands by CaptainDuck disaled! :o");
    }
    public function onLoad(){
        $this->getLogger()->info("Loading ExtraCommands by CaptainDuck!");
    }
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        
        switch($cmd->getName()){
            case "advancedkits":
                if($sender->hasPermission("ak.command")){
                   $sender->sendMessage(C::ITALIC. C::WHITE. "AdvancedKits Commands & Info!");
                   $sender->sendMessage(C::ITALIC. C::BLUE. "/advancedkits or /ak get -> Get all the Kit options!");
                   $sender->sendMessage(C::ITALIC. C::WHITE. "/advancedkits or /ak list -> See all the kits!");
                   if(isset($args[0])){
                       switch($args[0]){
                           case "list":
                               if($sender->hasPermission("ak.command.list")){
                                   $sender->sendMessage(C::ITALIC. C::LIGHT_GREEN. "List of all kits!");
                                   $sender->sendMessage(C::ITALIC. $this->getConfig()->get("custom_message"));
                                   return true;
                                   break;
                               }
                           case "get":
                               #Give item -> $player->getInventory()->addItem(Item::get(0,0,0));
                               $player = $event->getPlayer();
                               $item = $player->getInventory()->getItemInHand();
                               $pos = new Vector3($player->getX() + 1, $player->getY() + 1, $player->getZ());
                               $level = $player->getLevel();
                               if($sender->hasPermission("ak.command.get")){
                                   
                               }
                       }
                   }
                }
        }
    }
}
