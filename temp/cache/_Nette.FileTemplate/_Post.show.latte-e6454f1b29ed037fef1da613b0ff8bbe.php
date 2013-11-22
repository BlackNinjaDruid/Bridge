<?php //netteCache[01]000387a:2:{s:4:"time";s:21:"0.32253000 1385121708";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:65:"P:\Documents\Entwicklung\www\Bridge\app\templates\Post\show.latte";i:2;i:1385121498;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: P:\Documents\Entwicklung\www\Bridge\app\templates\Post\show.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '0md29ibkyy')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbbb010ec870_content')) { function _lbbb010ec870_content($_l, $_args) { extract($_args)
?><p><a href="<?php echo htmlSpecialChars($_control->link("Homepage:default")) ?>
">← back to posts list</a></p>

<div class="date"><?php echo Nette\Templating\Helpers::escapeHtml($template->date($post->created_at, 'F j, Y'), ENT_NOQUOTES) ?></div>

<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<div class="post"><?php echo Nette\Templating\Helpers::escapeHtml($post->content, ENT_NOQUOTES) ?></div>



<h2>Comments</h2>

<div class="comments">
<?php $iterations = 0; foreach ($comments as $comment): ?>
        <p><b><?php if ($_l->ifs[] = ($comment->email)): ?><a href="mailto:<?php echo htmlSpecialChars($comment->email) ?>
"><?php endif ;echo Nette\Templating\Helpers::escapeHtml($comment->name, ENT_NOQUOTES) ;if (array_pop($_l->ifs)): ?>
</a><?php endif ?>
</b> said:</p>
        <div><?php echo Nette\Templating\Helpers::escapeHtml($comment->content, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>
</div>


<?php $_ctrl = $_control->getComponent("commentForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ;
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbf25a950ce0_title')) { function _lbf25a950ce0_title($_l, $_args) { extract($_args)
?><h1><?php echo Nette\Templating\Helpers::escapeHtml($post->title, ENT_NOQUOTES) ?></h1>
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