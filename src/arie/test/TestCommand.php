<?php
declare(strict_types=1);

namespace arie\test;

use galaxygames\ovommand\parameter\EnumParameter;
use galaxygames\ovommand\parameter\IntParameter;
use galaxygames\ovommand\BaseCommand;
use galaxygames\ovommand\parameter\BooleanParameter;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

//
//class TestSubCMD extends BaseSubCommand{
//	public function onRun(CommandSender $sender, string $label, array $args, string $preLabel = "") : void{
//		var_dump($args);
//	}
//
//	public function prepare() : void{
//		$this->setPermission("hello");
//
//		//		$this->registerParameters(0,
//		//			new EnumParameter("a", DefaultEnums::ONLINE_PLAYER, false, 0),
//		//			new EnumParameter("ab", DefaultEnums::BOOLEAN, false, 0),
//		//		);
//		$this->registerParameters(0,
//			new EnumParameter("a", DefaultEnums::ONLINE_PLAYER, false, 1),
//			new EnumParameter("aa", DefaultEnums::GAMEMODE, false, 0),
//		);
//		$this->registerParameters(1,
//			new StringParameter("c", false, 0),
//			new EnumParameter("cc", DefaultEnums::BOOLEAN, false, 0),
//		);
//		$this->registerParameters(2,
//			new TargetParameter("d", false, 0),
//			new EnumParameter("dd", DefaultEnums::BOOLEAN, false, 0),
//		);
//	}
//}


class TestCommand extends BaseCommand{

	public function onRun(CommandSender $sender, string $label, array $args, string $preLabel = "") : void{
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
		$this->registerSubCommand(new TestSubCommand("sub1", showAliases: []));

		$this->registerParameters(0,
			new BooleanParameter("c")
		);
		$this->registerParameters(1,
			new BooleanParameter("d"),
			new IntParameter("dd")
		);
		$this->registerParameters(2,
			new EnumParameter("sound", "sound", false),
			new EnumParameter("name", "myname", false)
		);
	}
}
