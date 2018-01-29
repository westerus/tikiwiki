<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: Goal.php 62176 2017-04-10 06:01:52Z drsassafras $

namespace Tiki\Command\ProfileExport;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Goal extends ObjectWriter
{
	protected function configure()
	{
		$this
			->setName('profile:export:goal')
			->setDescription('Export a goal')
			->addArgument(
				'goal',
				InputArgument::REQUIRED,
				'Goal ID'
			);

		parent::configure();
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$goal = $input->getArgument('goal');

		$writer = $this->getProfileWriter($input);

		if (\Tiki_Profile_InstallHandler_Goal::export($writer, $goal)) {
			$writer->save();
		} else {
			$output->writeln("<error>Goal not found: $goal</error>");
			return;
		}
	}
}
