<?php
declare(strict_types=1);

namespace src\arie\test;

use galaxygames\ovommand\BaseSubCommand;
use galaxygames\ovommand\parameter\EnumParameter;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class TestSubSub2Command extends BaseSubCommand{
	public function onRun(CommandSender $sender, string $label, array $args) : void{
		if (empty($args)) {
			$sender->sendMessage($this->getUsage());
		}
		if ($sender instanceof Player) {
			$sender->sendMessage(print_r($args, true));
		}
		var_dump($args);
	}

	public function setup() : void{
		$this->setPermission("hello");

		$this->registerParameters(
			new EnumParameter("sound", "sound", true)
		);
	}
}