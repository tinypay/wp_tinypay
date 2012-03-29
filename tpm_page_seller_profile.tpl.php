<?php include('includes/getUserProfile.inc.php'); ?><!-- The shortcode for this page is [tpm-user-profile] -->


<div class="tpm-page-wrapper">
    <!-- Let's add the search box -->
    <?php include('tpm_widget_search_box.tpl.php');?>

    <div class="tpm-subhead-wrapper clearfix">
        <div class="tpm-subhead-left">
            Shop
        </div>

        <div class="tpm-more">
            <a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_SHOPS; ?>">Browse more shops</a>
        </div>
    </div>

    <div class="tpm-dotted"></div>

    <div class="tpm-profile">
        <div class="tpm-avatar"><img src="<?php echo $user_info->avatar; ?>"></div>

        <div class="tpm-info">
            <div class="tpm-name">
                <?php echo $user_info->name; ?>
            </div>

            <div class="tpm-bio">
                <?php echo $user_info->bio; ?>
            </div>

            <div class="tpm-meta">
                <div class="tpm-social">
                    <?php if (isset($user_info->facebook)): ?><a class="tpm-facebook" href="<?php echo $user_info->facebook; ?>">facebook</a> <?php endif; ?> <?php if (isset($user_info->twitter)): ?> <a class="tpm-twitter" href="<?php echo $user_info->twitter; ?>">twitter</a> <?php endif; ?> <?php if (isset($user_info->linkedin)): ?> <a class="tpm-linkedin" href="<?php echo $user_info->linkedin; ?>">linkedin</a> <?php endif; ?>
                </div>
            </div>
        </div><div class="clearfix"></div>
        <div class="tpm-subhead-grey">
            My items
        </div>

        <div id="tpm-paging" class="container">
            <div class="content clearfix">
                <?php if (!empty($user_items)): ?>
                <?php foreach($user_items as $user_item) : ?>

                <div id="tooltip_<?php echo $user_item->item_id; ?>" class="tpm-item tooltip">
                    <div class="image">
                        <a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item=<?php echo $user_item->item_id; ?>">
                        <?php if (isset($user_item->images[0]->xsmall)):?>
	                        <img src="<?php echo $user_item->images[0]->xsmall; ?>">
                        <?php endif; ?></a>
                    </div>

                    <div class="tpm-title">
                        <a href="/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item=<?php echo $user_item->item_id; ?>"><?php echo truncate($user_item->title,24);?></a>
                    </div>

                    <div class="price <?php echo $user_item->currency; ?>">
                        <?php echo $user_item->price; ?>
                    </div>

                    <div id="data_tooltip_<?php echo $user_item->item_id; ?>" class="hidden">
                        <div class="tooltip-inner">
                            <div class="tooltip-title">
                                <?php echo $user_item->title; ?>
                            </div>
                            <?php echo truncate($user_item->description,180);?>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <?php endif; ?>
            </div>

            <div class="tpm-dotted"></div>
            <!-- Only show navigation if needed -->
            <?php if (count($user_items)>12): ?>

            <div class="page_navigation"></div>
            <?php endif; ?>
        </div>
    </div>
</div>
        <div class="clearfix"></div>

