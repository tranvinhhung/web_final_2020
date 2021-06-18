<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}
	// $sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id'"); 
	$sql_chitiet = oci_parse($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id'"); 
	oci_execute($sql_chitiet);

?>
<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Trang chủ</a>
						<i>|</i>
					</li>
					<li>Single Product 1</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<?php
	while($row_chitiet = oci_fetch_array($sql_chitiet)){ 
	?>
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								
									<div class="thumb-image">
                                    <img src="images/<?php echo $row_chitiet['SANPHAM_IMAGE'] ?>" data-imagezoom="true" class="img-fluid" alt=""> 
                                    </div>
								</li>
						
							</ul>
							
						</div>
					</div>
                </div>
   
                      <!-- -->
				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo $row_chitiet['SANPHAM_NAME'] ?></h3>
					<p class="mb-3">
						<span class="item_price"><?php echo number_format($row_chitiet['SANPHAM_GIAKHUYENMAI']).'vnđ' ?></span>
						<del class="mx-2 font-weight-light"><?php echo number_format($row_chitiet['SANPHAM_GIA']).'vnđ' ?></del>
						<label>Miễn phí vận chuyển</label>
					</p>
					
					<div class="product-single-w3l">
						<p><?php echo $row_chitiet['SANPHAM_CHITIET'] ?></p><br><br>
						<p><?php echo $row_chitiet['SANPHAM_MOTA'] ?></p>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="?quanly=giohang" method="post">
								<fieldset>
									<input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['SANPHAM_NAME'] ?>" />
									<input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['SANPHAM_ID'] ?>" />
									<input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['SANPHAM_GIA'] ?>" />
									<input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['SANPHAM_IMAGE'] ?>" />
									<input type="hidden" name="soluong" value="1" />			
									<input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<!-- -->
			</div>
		</div>
	</div>
	<!-- //Single Page -->
	<?php
	} 
	?>