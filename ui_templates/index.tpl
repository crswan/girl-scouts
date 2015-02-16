{include file='_header.tpl' title='Health Forms'}
<p class="pageName">Pending Health Forms</p>
<p>Welcome, {$guardian_name}</p>
<p>Please fill out any health forms below that don't already have a checkmark <img alt="CheckMark" src="/images/checkmark.png"></p>

<table border="0" cellspacing="0" cellpadding="4" class="rowdata">
    <tr>
        <th>&#x2713;</th>
        <th>Name</th>
        <th>Date Completed</th>
        <th></th>
    </tr>

{foreach from=$family item=row name=loop}
{$date_completed = $row->getField('web_people.WEB_HEALTH::date_completed')}
{$registrant_type = $row->getField('Camper_Aide_Staff')}
    <tr>
    	<td>{if $date_completed != ''}<img alt="CheckMark" src="/images/checkmark.png">{/if}</td>
      <td>{$row->getField('Full Name')}</td>
			<td>{$date_completed}</td>

{if $registrant_type eq "3-Staff"}
      <td><a href="adult_form.php?reg_num={$row->getField('Reg. #')}"/>View Health Form</a> (Adult)</td>
{else}
      <td><a href="camper_form.php?reg_num={$row->getField('Reg. #')}"/>View Health Form</a> (Camper)</td>
{/if}
    </tr>
{foreachelse}
<tr>
    <td colspan="4"><p><i>There are no health forms for you at this time. If you believe this to be in error please contact Debbie DeRuy at <a href="mailto:dderuy@comcast.net">dderuy@comcast.net</a></p></i></td>
</tr>
{/foreach}
</table>
{include file='_footer.tpl'}