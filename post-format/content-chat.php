<?php $chat = rwmb_meta( 'cookingwp_chat' ); ?>
        <?php if($chat != ''): ?>
            <div class="entry-chat">
                <?php echo $chat; ?>
            </div>
        <?php endif; ?>

<header class="entry-header">
	<h1 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
</header><!-- .entry-header -->

<div class="entry">
	<?php the_excerpt(''); ?>
</div> <!-- End: .entry -->	