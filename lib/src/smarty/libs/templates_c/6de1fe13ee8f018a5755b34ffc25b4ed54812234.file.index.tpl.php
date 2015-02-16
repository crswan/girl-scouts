<?php /* Smarty version Smarty-3.1.7, created on 2012-03-18 11:29:53
         compiled from "/home/peninsul/public_html/ui_templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2147062594f2e2268300399-51700336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6de1fe13ee8f018a5755b34ffc25b4ed54812234' => 
    array (
      0 => '/home/peninsul/public_html/ui_templates/index.tpl',
      1 => 1332095375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2147062594f2e2268300399-51700336',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f2e22684ae1a',
  'variables' => 
  array (
    'guardian_name' => 0,
    'family' => 0,
    'row' => 0,
    'date_completed' => 0,
    'registrant_type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f2e22684ae1a')) {function content_4f2e22684ae1a($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>'Health Forms'), 0);?>

<p class="pageName">Pending Health Forms</p>
<p>Welcome, <?php echo $_smarty_tpl->tpl_vars['guardian_name']->value;?>
</p>
<p>Please fill out any health forms below that don't already have a checkmark <img alt="CheckMark" src="/images/checkmark.png"></p>

<table border="0" cellspacing="0" cellpadding="4" class="rowdata">
    <tr>
        <th>&#x2713;</th>
        <th>Name</th>
        <th>Date Completed</th>
        <th></th>
    </tr>

<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['family']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
<?php $_smarty_tpl->tpl_vars['date_completed'] = new Smarty_variable($_smarty_tpl->tpl_vars['row']->value->getField('web_people.WEB_HEALTH::date_completed'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['registrant_type'] = new Smarty_variable($_smarty_tpl->tpl_vars['row']->value->getField('Camper_Aide_Staff'), null, 0);?>
    <tr>
    	<td><?php if ($_smarty_tpl->tpl_vars['date_completed']->value!=''){?><img alt="CheckMark" src="/images/checkmark.png"><?php }?></td>
      <td><?php echo $_smarty_tpl->tpl_vars['row']->value->getField('Full Name');?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['date_completed']->value;?>
</td>

<?php if ($_smarty_tpl->tpl_vars['registrant_type']->value=="3-Staff"){?>
      <td><a href="adult_form.php?reg_num=<?php echo $_smarty_tpl->tpl_vars['row']->value->getField('Reg. #');?>
"/>View Health Form</a> (Adult)</td>
<?php }else{ ?>
      <td><a href="camper_form.php?reg_num=<?php echo $_smarty_tpl->tpl_vars['row']->value->getField('Reg. #');?>
"/>View Health Form</a> (Camper)</td>
<?php }?>
    </tr>
<?php }
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
<tr>
    <td colspan="4"><p><i>There are no health forms for you at this time. If you believe this to be in error please contact Debbie DeRuy at <a href="mailto:dderuy@comcast.net">dderuy@comcast.net</a></p></i></td>
</tr>
<?php } ?>
</table>
<?php echo $_smarty_tpl->getSubTemplate ('_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>