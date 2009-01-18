<?php use_helper('opDiary') ?>

<div class="dparts homeRecentList"><div class="parts">
<div class="partsHeading"><h3><?php echo __('My Diaries') ?></h3></div>
<div class="block">

<?php if (count($diaryList)): ?>
<ul class="articleList">
<?php foreach ($diaryList as $diary): ?>
<li><span class="date"><?php echo op_diary_format_date($diary->getCreatedAt(), 'XShortDateJa') ?></span><?php echo link_to($diary->getTitleAndCount(), 'diary_show', $diary) ?><?php if ($diary->hasImages()) : ?> <?php echo image_tag('icon_camera.gif', array('alt' => 'photo')) ?><?php endif; ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<div class="moreInfo">
<ul class="moreInfo">
<?php if (count($diaryList)): ?>
<li><?php echo link_to(__('More'), 'diary_list_mine') ?></li>
<?php endif; ?>
<li><?php echo link_to(__('Post a diary'), 'diary_new') ?></li>
</ul>
</div>

</div>
</div></div>
