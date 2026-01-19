<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="<?php $this->options->charset(); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php $this->archiveTitle(array('category'=>_t('分类 %s'),'search'=>_t('搜索 %s'),'tag'=>_t('标签 %s'),'author'=>_t('作者 %s')), '', ' - '); ?><?php $this->options->title(); ?></title>

<script>
    (function() {
        const theme = localStorage.getItem('theme') || 'light';
        if (theme === 'dark') document.documentElement.setAttribute('data-theme', 'dark');
    })();
</script>

<?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&antiSpam=&atom='); ?>
<link rel="stylesheet" href="<?php cjUrl('style.min.css') ?>" />
</head>

<body class="<?php if ($this->options->OneCOL): ?>one-col<?php else: ?>bd<?php endif; ?>">
<header id="header">
    <div class="container clearfix">
        <div class="site-name">
            <a class="site-title" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>
        </div>
        <div id="nav">
            <ul class="nav-menu">
                <li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while($pages->next()): ?>
                <li><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
                <?php endwhile; ?>
                
                <li style="margin-left: 10px;">
                    <a id="theme-toggle" style="cursor:pointer; font-weight:bold; padding: 0 5px;">🌓 模式</a>
                </li>
            </ul>
        </div>
    </div>
</header>

<script>
    // 切换逻辑
    document.getElementById('theme-toggle').addEventListener('click', () => {
        const root = document.documentElement;
        if (root.getAttribute('data-theme') === 'dark') {
            root.removeAttribute('data-theme');
            localStorage.setItem('theme', 'light');
        } else {
            root.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        }
    });
</script>

<div id="body">
    <div class="container clearfix">
