<?php
declare(strict_types=1);

namespace arie\test;

use galaxygames\ovommand\OvommandHook;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use shared\galaxygames\ovommand\GlobalHookPool;

class Main extends PluginBase implements Listener{

	public function onEnable() : void{
		OvommandHook::register($this);
		Server::getInstance()->getPluginManager()->registerEvents($this, $this);
		
//		var_dump(GlobalHookPool::getHooks());
//		var_dump($hook = GlobalHookPool::getHook($this)::getOwnedPlugin());

		$this->getServer()->getCommandMap()->register("ovo", new TestCommand("test", "Test ovo command", aliases: ["t", "ovo"]));
	}
}
