{include file='_header.tpl' title='Health Forms'}

<div id="form" style="margin-left: 30px; padding-left: 10px; width: 600px;">
<h3>Login to submit your online health forms</h3>
<!-- form start -->
<p><span style="color:red;">{$error_message}</span></p>

<form method="post" action="{$WEB_ROOT_ENCRYPT}{$php_self}" name="login">


<table border="0" cellspacing="0" cellpadding="4" class="form-table">
    <tr>
        <th>Username (email address):</th>
        <td><input type="text" name="username" value="{$username}"/></td>
    </tr>
    <tr>
        <th>Password:</th>
        <td><input type="password" name="password"/></td>
    </tr>
</table>
<p>
<input type="submit" name="submit" value="Log in &raquo;" />
</p>
</form>
</div> <!-- END form div -->

{include file='_footer.tpl'}