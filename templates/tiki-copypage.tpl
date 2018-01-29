{* $Id: tiki-copypage.tpl 61837 2017-03-24 10:26:59Z jyhem $ *}
{title}{tr}Copy page:{/tr} {$page}{/title}

<div class="t_navbar">
	{assign var=thispage value=$page|escape:url}
	{button href="tiki-index.php?page=$thispage" _text="{tr}View page{/tr}"}
</div>

<form action="tiki-copypage.php" method="post" class="form-horizontal">
	<input type="hidden" name="page" value="{$page|escape}">
	{if isset($page_badchars_display)}
		{if $prefs.wiki_badchar_prevent eq 'y'}
			<div class="form-group">
				<div class="col-sm-10"><br>
				{remarksbox type=errors title="{tr}Invalid page name{/tr}"}
					{tr _0=$page_badchars_display|escape}The page name specified contains unallowed characters. It will not be possible to save the page until those are removed: <strong>%0</strong>{/tr}
				{/remarksbox}
				</div>
			</div>
		{else}
			<div class="form-group">
				<div class="col-sm-12">
				{remarksbox type=tip title="{tr}Tip{/tr}"}
					{tr _0=$page_badchars_display|escape}The page name specified contains characters that may render the page hard to access. You may want to consider removing those: <strong>%0</strong>{/tr}
				{/remarksbox}
				</div>
			</div>
			<input type="hidden" name="badname" value="{$newname|escape}">
			<input type="submit" class="btn btn-default btn-sm" name="confirm" value="{tr}Use this name anyway{/tr}">
		{/if}
	{elseif isset($msg)}
		{remarksbox type=errors}
			{$msg}
		{/remarksbox}
	{/if}

	<div class="form-group">
		<label class="col-sm-3 control-label">{tr}New name{/tr}</label>
		<div class="col-sm-7">
			<input type='text' id='newpage' name='newpage' size='40' value='{$newname|escape}' class="form-control">
		</div>
	</div>

	{if $tiki_p_add_object eq 'y' and $prefs.feature_categories == 'y' }
		<div class="form-group">
			<label class="col-sm-3 control-label" for="duplicate_categories">{tr}Duplicate categories{/tr}</label>
			<div class="col-sm-7">
				<input type="checkbox" name="dupCateg" id="duplicate_categories" value="y" checked="checked">
			</div>
		</div>
	{/if}

	{if $tiki_p_freetags_tag eq 'y' and $prefs.feature_freetags == 'y' }
		<div class="form-group">
			<label class="col-sm-3 control-label" for="duplicate_freetags">{tr}Duplicate tags{/tr}</label>
			<div class="col-sm-7">
				<input type="checkbox" name="dupTags" id="duplicate_freetags" value="y" checked="checked">
			</div>
		</div>
	{/if}

	<div class="form-group">
		<label class="col-sm-3 control-label"></label>
		<div class="col-sm-7">
			<input type="submit" class="btn btn-default btn-sm" name="copy" value="{tr}Copy{/tr}">
		</div>
	</div>
</form>
