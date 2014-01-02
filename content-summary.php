<?php
/**
 * @package Theme_Name
 */
?>
<article itemscope itemtype="http://schema.org/Article">
	<h2 itemprop="name"><a itemprop="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	by <span itemprop="author"><?php the_author(); ?></span>
	<div itemprop="description"><?php the_excerpt(); ?></div>
</article>