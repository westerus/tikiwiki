<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
// 
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: upgrade_novice_admin_assistance.php 57961 2016-03-17 20:01:56Z jonnybradley $

require_once('lib/wizard/wizard.php');

/**
 * The Wizard's language handler 
 */
class UpgradeWizardNoviceAdminAssistance extends Wizard
{
    function pageTitle ()
    {
        return tra('Novice Admin Assistance');
    }

	function isEditable ()
	{
		return true;
	}
	
	function onSetupPage ($homepageUrl) 
	{
		// Run the parent first
		parent::onSetupPage($homepageUrl);
		
		$showPage = true;
		
		return $showPage;
	}

	function getTemplate()
	{
		$wizardTemplate = 'wizard/upgrade_novice_admin_assistance.tpl';
		return $wizardTemplate;
	}

	function onContinue ($homepageUrl) 
	{
		// Run the parent first
		parent::onContinue($homepageUrl);
	}
}
