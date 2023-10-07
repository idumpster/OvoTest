<?php
declare(strict_types=1);

namespace arie\test;

use galaxygames\ovommand\BaseSubCommand;
use galaxygames\ovommand\enum\DefaultEnums;
use galaxygames\ovommand\parameter\BooleanParameter;
use galaxygames\ovommand\parameter\EnumParameter;
use galaxygames\ovommand\parameter\PositionParameter;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class TestSubCommand extends BaseSubCommand{
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

		$this->registerSubCommands(new TestSubSubCommand("second"));

		$this->registerParameters(
			new PositionParameter("a"),
			new EnumParameter("aa", DefaultEnums::PM_GAMEMODE),
		);
		$this->registerParameters(new BooleanParameter("yes madam"));
	}
}