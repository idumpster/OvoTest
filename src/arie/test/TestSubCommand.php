<?php
declare(strict_types=1);

namespace arie\test;

use galaxygames\ovommand\BaseSubCommand;
use galaxygames\ovommand\enum\DefaultEnums;
use galaxygames\ovommand\parameter\EnumParameter;
use galaxygames\ovommand\parameter\PositionParameter;
use galaxygames\ovommand\parameter\result\BrokenSyntaxResult;
use galaxygames\ovommand\parameter\result\ValueResult;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\Server;

class TestSubCommand extends BaseSubCommand{
	/** @param array<string,ValueResult|BrokenSyntaxResult> $args */
	public function onRun(CommandSender $sender, string $label, array $args) : void{
		if (empty($args)) {
			$sender->sendMessage($this->getUsage());
		}
		if ($sender instanceof Player) {
			$sender->sendMessage(print_r($args, true));
		}
		if (isset($args["b"], $args["online"], $args["pmGamemode"])) {
			$player = Server::getInstance()->getPlayerExact($args['online']->getValue());
			$player?->setGamemode($args["pmGamemode"]->getValue());
		}
		var_dump($args);
	}

	public function setup() : void{
		$this->setPermission("hello");
//
		$this->registerSubCommands(new TestSubSubCommand("second"));
		$this->registerSubCommands(new TestSubSub2Command("third"));
//
		$this->registerParameters(
			new PositionParameter("a"),
			new EnumParameter("aa", DefaultEnums::PM_GAMEMODE),
		);
		$this->registerParameters(
			new PositionParameter("b"),
			new EnumParameter("online", DefaultEnums::ONLINE_PLAYERS, true),
			new EnumParameter("pmGamemode", DefaultEnums::PM_GAMEMODE, false)
		);
	}
}