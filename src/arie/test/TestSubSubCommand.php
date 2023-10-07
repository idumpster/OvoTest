<?php
declare(strict_types=1);

namespace arie\test;

use galaxygames\ovommand\BaseSubCommand;
use galaxygames\ovommand\parameter\BooleanParameter;
use galaxygames\ovommand\parameter\TargetParameter;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class TestSubSubCommand extends BaseSubCommand{
	public function onRun(CommandSender $sender, string $label, array $args, string $preLabel = "") : void{
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
		$this->registerParameters(new TargetParameter("mode"));
	}
}