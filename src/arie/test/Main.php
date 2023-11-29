<?php
declare(strict_types=1);

namespace arie\test;

use galaxygames\ovommand\enum\EnumManager;
use galaxygames\ovommand\enum\HardEnum;
use galaxygames\ovommand\OvommandHook;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class Main extends PluginBase implements Listener{

	public function onEnable() : void{
		Server::getInstance()->getPluginManager()->registerEvents($this, $this);
		OvommandHook::register($this);
		OvommandHook::getEnumManager()->register(new HardEnum("sound", ["meow cat" => "cat", "goof" => "dog"]));

//		var_dump(GlobalHookPool::getHooks());
//		var_dump($hook = GlobalHookPool::getHook($this)::getOwnedPlugin());

		$this->getServer()->getCommandMap()->register("ovo", new TestCommand("test", "Test ovo command", aliases: ["t", "ovo"]));
	}
}
