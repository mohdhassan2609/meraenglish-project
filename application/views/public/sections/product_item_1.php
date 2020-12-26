	<div class="ps-product bg-white">
		<?php if($product->highlight == "sale" || $product->highlight == "offer"):?>
			<div class="product-badge <?=$product->highlight?>-badge">
				<?=ucfirst($product->highlight)?>
			</div>
		<?php endif; ?>
		<div class="ps-product__thumbnail">
			<a href="<?=base_url()?><?=$product->slug?>">
				<img src="<?=base_url()?>uploads/products/<?=$product->product_image?>" alt="<?=ucfirst($product->name)?>">
			</a>
		</div>
		<div class="ps-product__container">
			<div class="ps-product__content" data-mh="clothing">
				<a class="ps-product__title" href="<?=base_url()?><?=$product->slug?>">
					<?=ucfirst($product->name)?>
				</a>
				<p class="ps-product__price">
					₹<?=number_format($product->price, 2)?>
					<?php if($product->strikeout_price != 0){ echo "<del> ₹" . number_format($product->strikeout_price, 2) . "</del>"; } ?>
				</p>
			</div>
		</div>
	</div>