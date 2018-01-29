<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: ListExecuteCommand.php 62428 2017-05-02 14:34:27Z kroky6 $

namespace Tiki\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ListExecuteCommand extends Command
{
	protected function configure()
	{
		$this
			->setName('list:execute')
			->setDescription('Performs Plugin ListExecute command on a particular page')
			->addArgument(
				'page',
				InputArgument::REQUIRED,
				'Page name where Plugin ListExecute is setup'
			)
			->addArgument(
				'action',
				InputArgument::REQUIRED,
				'Name of the action to be executed as defined on the target page'
			)
			->addArgument(
				'input',
				InputArgument::OPTIONAL,
				'If action takes a variable input parameter, specify it here'
			)
			;
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$page = $input->getArgument('page');
		$action = $input->getArgument('action');

		$tikilib = \TikiLib::lib('tiki');
		if (! $pageInfo = $tikilib->get_page_info($page)) {
			$output->writeln("Page $page not found.");
			return false;
		}

		$_POST['list_action'] = $action;
		$_POST['objects'] = array('ALL');
		$_POST['list_input'] = $input->getArgument('input');

		\TikiLib::lib('parser')->parse_data($pageInfo['data']);

		$output->writeln("Action $action executed on page $page.");
	}
}
