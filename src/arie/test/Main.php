<?php
declare(strict_types=1);

namespace arie\test;

use galaxygames\ovommand\enum\SoftEnum;
use galaxygames\ovommand\OvommandHook;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use shared\galaxygames\ovommand\GlobalEnumPool;

class Main extends PluginBase implements Listener{

	public function onEnable() : void{
		Server::getInstance()->getPluginManager()->registerEvents($this, $this);
		OvommandHook::register($this);
		OvommandHook::getEnumManager()->register(new SoftEnum("sound", ["meow cat" => "cat", "goof" => "dog"]));
//		var_dump(GlobalEnumPool::getHookerRegisteredHardEnums(OvommandHook::getInstance()));

//		var_dump(GlobalHookPool::getHooks());
//		var_dump($hook = GlobalHookPool::getHook($this)::getOwnedPlugin());

		$this->getServer()->getCommandMap()->register("ovo", new TestCommand("test", "Test ovo command", aliases: ["t", "ovo"]));
	}
}
