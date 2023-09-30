<?php
declare(strict_types=1);

namespace arie\test;

use galaxygames\ovommand\OvommandHook;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class Main extends PluginBase implements Listener{

	public function onEnable() : void{
		OvommandHook::register($this);
		Server::getInstance()->getPluginManager()->registerEvents($this, $this);

		$this->getServer()->getCommandMap()->register("ovo", new TestCommand($this, "test", "Test ovo command", aliases: ["t", "ovo"]));
	}
}
