<?php //netteCache[01]000394a:2:{s:4:"time";s:21:"0.95115800 1385121702";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:72:"P:\Documents\Entwicklung\www\Bridge\app\templates\Homepage\default.latte";i:2;i:1385121497;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: P:\Documents\Entwicklung\www\Bridge\app\templates\Homepage\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'czzbslc4vb')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb1ff33273c0_content')) { function _lb1ff33273c0_content($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<a href="<?php echo htmlSpecialChars($_control->link("Post:create")) ?>">Write new post</a>

<?php $iterations = 0; foreach ($posts as $post): ?>
<div class="post">
    <div class="date"><?php echo Nette\Templating\Helpers::escapeHtml($template->date($post->created_at, 'F j, Y'), ENT_NOQUOTES) ?></div>

    <h2><a href="<?php echo htmlSpecialChars($_control->link("Post:show", array($post->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($post->title, ENT_NOQUOTES) ?></a></h2>

    <div><?php echo Nette\Templating\Helpers::escapeHtml($post->content, ENT_NOQUOTES) ?></div>
</div>
<?php $iterations++; endforeach ;
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb85a498f029_title')) { function _lb85a498f029_title($_l, $_args) { extract($_args)
?><h1>My awesome blog</h1>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 