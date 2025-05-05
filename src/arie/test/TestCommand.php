<?php
declare(strict_types=1);

namespace arie\test;

use galaxygames\ovommand\BaseCommand;
use galaxygames\ovommand\Ovommand;
use galaxygames\ovommand\parameter\BooleanParameter;
use galaxygames\ovommand\parameter\IntParameter;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class TestCommand extends BaseCommand{
	public function onRun(CommandSender $sender, string $label, array $args) : void{
		if (empty($args)) {
			$sender->sendMessage("HEY! :C");
			$sender->sendMessage($this->getUsage());
			return;
		}
		if ($sender instanceof Player) {
			$sender->sendMessage(print_r($args, true));
		}
		var_dump($args);
	}

	public function setup() : void{
		$this->setPermission("hello");
		$this->doSendingUsageMessage = true;
		$this->registerSubCommands(new TestSubCommand("sub1", hiddenAliases: ["hidden1"], visibleAliases: ["alias1"]));

		$this->registerParameters(
			new BooleanParameter("c")
		);
		$this->registerParameters(
			new BooleanParameter("d"),
			new IntParameter("dd")
		);
	}
}
