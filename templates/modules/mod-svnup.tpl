{* $Id: mod-svnup.tpl 61985 2017-04-01 01:04:28Z jyhem $ *}
{strip}
{tikimodule error=$module_params.error title=$tpl_module_title name=$tpl_module_name flip=$module_params.flip decorations=$module_params.decorations nobox=$module_params.nobox notitle=$module_params.notitle}
	{if !empty($lastup)}
		<div class="cvsup">{tr}Last update from SVN{/tr} ({$tiki_version}): {$lastup|tiki_long_datetime}
	{/if}
	{if !empty($svnrev)}
		- REV {$svnrev}
	{/if}
	{if !empty($lastup) or !empty($svnrev)}
		</div>
	{/if}
{/tikimodule}
{/strip}
