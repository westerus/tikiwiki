{* $Id: list.tpl 62022 2017-04-02 06:27:52Z lindonb $ *}
<div class="adminoptionbox preference form-group clearfix {$p.tagstring|escape}{if isset($smarty.request.highlight) and $smarty.request.highlight eq $p.preference} highlight{/if}" style="text-align: left;">
	<label class="col-sm-4 control-label" for="{$p.id|escape}">{$p.name|escape|breakline}</label>
	<div class="col-sm-8">
		{if !empty($p.units)}
			<div class="input-group">
		{/if}
		<select
			class="form-control"
			name="{$p.preference|escape}"
			id="{$p.id|escape}"
			data-tiki-admin-child-block=".{$p.preference|escape}_childcontainer"
			data-tiki-admin-child-mode="{$mode|escape}"
		>
			{foreach from=$p.options key=value item=label}
				<option value="{$value|escape}"{if $value eq $p.value} selected="selected"{/if} {$p.params}>
					{$label|escape}
				</option>
			{/foreach}
		</select>
		{if !empty($p.units)}
			<span class="input-group-addon">{$p.units}</span></div>
		{/if}
		{include file="prefs/shared-flags.tpl"}
		{if $p.shorthint}
			<div class="help-block">{$p.shorthint|simplewiki}</div>
		{/if}
		{if $p.detail}
			<div class="help-block">{$p.detail|simplewiki}</div>
		{/if}
		{if $p.hint}
			<div class="help-block">{$p.hint|simplewiki}</div>
		{/if}
		{include file="prefs/shared-dependencies.tpl"}
	</div>
</div>
