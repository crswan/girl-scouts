<?php /* Smarty version Smarty-3.1.7, created on 2012-02-05 02:35:59
         compiled from "/home/peninsul/public_html/ui_templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19118869854f2e5b8f7e6b50-54242461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b666b369458e575d54cf294071bafe60e56246d9' => 
    array (
      0 => '/home/peninsul/public_html/ui_templates/login.tpl',
      1 => 1327792305,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19118869854f2e5b8f7e6b50-54242461',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error_message' => 0,
    'WEB_ROOT_ENCRYPT' => 0,
    'php_self' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f2e5b8f86282',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f2e5b8f86282')) {function content_4f2e5b8f86282($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>'Health Forms'), 0);?>


<div id="form" style="margin-left: 30px; padding-left: 10px; width: 600px;">
<h3>Login to submit your online health forms</h3>
<!-- form start -->
<p><span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
</span></p>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT_ENCRYPT']->value;?>
<?php echo $_smarty_tpl->tpl_vars['php_self']->value;?>
" name="login">


<table border="0" cellspacing="0" cellpadding="4" class="form-table">
    <tr>
        <th>Username (email address):</th>
        <td><input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
"/></td>
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

<?php echo $_smarty_tpl->getSubTemplate ('_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>