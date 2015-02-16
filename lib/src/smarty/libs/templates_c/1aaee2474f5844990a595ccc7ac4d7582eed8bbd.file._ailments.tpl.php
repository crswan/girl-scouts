<?php /* Smarty version Smarty-3.1.7, created on 2012-02-04 21:03:47
         compiled from "/home/peninsul/public_html/ui_templates/_ailments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12503296384f2e0db32ed0e5-52604352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1aaee2474f5844990a595ccc7ac4d7582eed8bbd' => 
    array (
      0 => '/home/peninsul/public_html/ui_templates/_ailments.tpl',
      1 => 1328082135,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12503296384f2e0db32ed0e5-52604352',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ailments_options' => 0,
    'row' => 0,
    'id' => 0,
    'ailments' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f2e0db3477fc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f2e0db3477fc')) {function content_4f2e0db3477fc($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ailments_options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
  <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['row']->value->getField('id'), null, 0);?>
   <?php if (array_search($_smarty_tpl->tpl_vars['id']->value,$_smarty_tpl->tpl_vars['ailments']->value)!==false){?>
   <label><input checked="checked" type="checkbox" name="ailments[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->getField('id');?>
"/><?php echo $_smarty_tpl->tpl_vars['row']->value->getField('name');?>
</label><br/>
   <?php }else{ ?>
     <label><input type="checkbox" name="ailments[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->getField('id');?>
" /><?php echo $_smarty_tpl->tpl_vars['row']->value->getField('name');?>
</label><br/>
   <?php }?>
<?php } ?><?php }} ?>