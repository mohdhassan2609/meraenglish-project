
	<div class="ps-product ps-product--wide">		
		<div class="ps-product__thumbnail">
			<?php if($product->highlight == "sale" || $product->highlight == "offer"):?>
				<div class="product-badge <?=$product->highlight?>-badge">
					<?=ucfirst($product->highlight)?>
				</div>
			<?php endif; ?>
			<a href="<?=base_url()?><?=$product->slug?>">
				<img src="<?=base_url()?>uploads/products/<?=$product->product_image?>" alt="<?=ucfirst($product->name)?>">
			</a>
		</div>
		<div class="ps-product__container">
			<div class="ps-product__content col-md-8">
				<a class="ps-product__title" href="<?=base_url()?><?=$product->slug?>">
					<?=ucfirst($product->name)?>
				</a>
				<p class="ps-product__vendor">
					Sold by: 
					<a href="<?=base_url()?>store/<?=$tis->slugify($this->frontend_model->get_record('tbl_stores', "store_id='" . $product->store_id . "'", "name"))?>/<?=$product->store_id?>">
						<?=$this->frontend_model->get_record('tbl_stores', "store_id='" . $product->store_id . "'", "name")?>
					</a>
				</p>
				<p>
					<?=$product->short_description?>
				</p>
			</div>
			<div class="ps-product__shopping col-md-4">
				<p class="ps-product__price">
					₹<?=number_format($product->price, 2)?>
					<?php if($product->strikeout_price != 0){ echo "<del> ₹" . number_format($product->strikeout_price, 2) . "</del>"; } ?>
				</p>
				<form class="single-add-to-cart-form">
					<input type="hidden" name="product_id" value="<?=$product->id?>"/>
					<input type="hidden" value="<?=($product->moq <= 0)?"1":$product->moq?>" name="product_quantity">
					<?php if(isset($_SESSION['is_login'])): ?>
						<button type="submit" class="ps-btn">Add to cart</button>
					<?php else: ?>
						<a title="Add to cart" class="ps-btn" href="javascript:void(0)" data-target="#login" data-toggle="modal">
							Add to cart
						</a>
					<?php endif; ?>
				</form>
				<ul class="ps-product__actions">
					<li>					
						<?php if(isset($_SESSION['is_login'])): ?>
							<?php if(sizeof($this->frontend_model->get_records("tbl_wishlist", "status = '0' and user_id = '$_SESSION[login_id]' and product_id = '" . $product->id . "'")) > 0): ?>
								<a href="javascript:void(0)" class="product-wishlist" data-product="<?=$product->id?>">
									<i class="icon-heart"></i> Remove from favourites
								</a>
							<?php else: ?>
								<a href="javascript:void(0)" class="product-wishlist" data-product="<?=$product->id?>">
									<i class="icon-heart"></i> Add as favourite
								</a>
							<?php endif; ?>
						<?php else: ?>
							<a title="Wishlist" href="javascript:void(0)" data-target="#login" data-toggle="modal">
								<i class="icon-heart"></i> Add as favourite
							</a>
						<?php endif; ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
	