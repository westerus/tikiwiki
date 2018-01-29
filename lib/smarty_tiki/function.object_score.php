<?php
// (c) Copyright 2002-2015 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: function.object_score.php 62176 2017-04-10 06:01:52Z drsassafras $

//this script may only be included - so its better to die if called directly.
if (strpos($_SERVER["SCRIPT_NAME"], basename(__FILE__)) !== false) {
  header("location: index.php");
  exit;
}

function smarty_function_object_score($params, $smarty)
{
    extract($params);
    if (empty($id) || empty($type)) {
        trigger_error("object_score: missing id and/or type parameters");
        return;
    }
    $scorelib = TikiLib::lib("score");

    if (!empty($ruleId)) {
        return $scorelib->getPointsBalanceForRuleId($type,$id,$ruleId);
    } else if ($grouped == 'y'){
        $scoreArr = $scorelib->getGroupedPointsBalance($type,$id);
        if (empty($assign)) {
            return $scoreArr;
        } else {
            $smarty->assign($assign, $scoreArr);
        }
    } else {
        return $scorelib->getPointsBalance($type,$id);
    }
}
