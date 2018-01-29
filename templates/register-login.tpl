{* $Id: register-login.tpl 62695 2017-05-22 23:53:25Z jyhem $ *}
{if $prefs.login_autogenerate eq 'y'}
	{*do nothing*}
{elseif $prefs.user_register_prettytracker eq 'y' and $prefs.user_register_prettytracker_tpl and $prefs.socialnetworks_user_firstlogin != 'y'}
	<input type="text" name="name" id="name" class="form-control" >
	{if $prefs.user_register_prettytracker_hide_mandatory neq 'y'}<strong class='mandatory_star text-danger tips' title=":{tr}This field is mandatory{/tr}">*</strong>{/if}
{else}
	<div class="form-group">
		<label class="col-sm-4 control-label" for="name">{if $prefs.login_is_email eq 'y'}{tr}Email{/tr}{else}{tr}Username{/tr}{/if} {if $trackerEditFormId}<strong class='mandatory_star text-danger tips' title=":{tr}This field is mandatory{/tr}">*</strong>{/if}</label>
		<div class="col-sm-8">
		{if $prefs.login_is_email eq 'y'}
			<input type="email" name="name" id="name" value="{if !empty($smarty.post.name)}{$smarty.post.name}{/if}" class="form-control" >
			<div class="help-block">{tr}Use your email address as your log-in name{/tr}</div>
		{else}
			<input type="text" name="name" id="name" value="{if !empty($smarty.post.name)}{$smarty.post.name}{/if}" class="form-control" >
			{if $prefs.feature_jquery_validation eq 'n'}
				{if $prefs.min_username_length gt 1}
					<div class="highlight"><em>{tr _0=$prefs.min_username_length}Minimum %0 characters long{/tr}</em></div>
				{/if}
				{if $prefs.lowercase_username eq 'y'}
					<div class="highlight"><em>{tr}Lowercase only{/tr}</em></div>
				{/if}
			{/if}
		{/if}
		</div>
	</div>
{/if}
