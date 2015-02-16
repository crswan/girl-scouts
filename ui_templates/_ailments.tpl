{foreach from=$ailments_options item=row name=loop}
  {$id = $row->getField('id')}
   {if $id|@array_search:$ailments !==false}
   <label><input checked="checked" type="checkbox" name="ailments[]" value="{$row->getField('id')}"/>{$row->getField('name')}</label><br/>
   {else}
     <label><input type="checkbox" name="ailments[]" value="{$row->getField('id')}" />{$row->getField('name')}</label><br/>
   {/if}
{/foreach}