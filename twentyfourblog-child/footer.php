
<?php
/**
 * The template for displaying the footer.
 *
 * @package Betheme
 * @author Muffin group
 * @link http://muffingroup.com
 */


$back_to_top_class = mfn_opts_get('back-top-top');

if( $back_to_top_class == 'hide' ){
	$back_to_top_position = false;
} elseif( strpos( $back_to_top_class, 'sticky' ) !== false ){
	$back_to_top_position = 'body';
} elseif( mfn_opts_get('footer-hide') == 1 ){
	$back_to_top_position = 'footer';
} else {
	$back_to_top_position = 'copyright';
}

?>

<?php do_action( 'mfn_hook_content_after' ); ?>

<footer id="Footer" class="clearfix">
			<div class="footer-new-container-tt">
			    <!-- Hotline -->
			    <div class="custom-footer-hotline-tt footer-title-tt">
			          <a href="tel:19006626"><i class="zmdi zmdi-phone"></i> Hotline: 1900.6626</a>(8:00 - 21:00)
			    </div>
			    <!-- Liên hệ -->
			    <div class="custon-footer-lienhe-tt">
			        <div class="main-lienhe-tt footer-title-tt">Liên hệ <i class="icon-down-open"></i><i class="icon-up-open"></i></div>
			            <div class="footer-show-tt">
			                <div class="lienhe-main-tt">
			                    <h4>Hà Nội</h4>
			                    <ul>
			                        <li><a href="tel:0981166641"><span>143 Thái Hà - Đống Đa</span><br />Hotline: 0981.166.641</a></li>
			                        <li><a href="tel:0981166642"><span>356 Cầu Giấy - Cầu Giấy</span><br />Hotline: 0981.166.642</a></li>
			                        <li><a href="tel:0981166671"><span>151 Nguyễn Văn Cừ - Long Biên</span><br />Hotline: 0981.166.671</a></li>
			                        <li><a href="tel:0981166658"><span>744 Quang Trung - Hà Nội</span><br />Hotline: 0981.166.658</a></li>
			                    </ul>
			                    <h4>Nam Định</h4>
			                    <ul>
			                        <li><a href="tel:0981166645"><span>256 Trần Hưng Đạo - TP Nam Định</span><br />Hotline: 0981.166.645</a></li>
			                        <li><a href="tel:0981166652"><span>Chợ Cầu - Thị Trấn Yên Định - Hải Hậu</span><br />Hotline: 0981.166.652</a></li>
			                    </ul>
			                    <h4>Ninh Bình</h4>
			                    <ul>
			                        <li><a href="tel:0981166629"><span>1019 Trần Hưng Đạo - TP Ninh Bình</span><br />Hotline: 0981.166.629</a></li>
			                    </ul>
			                    <h4>Hải Dương</h4>
			                    <ul>
			                        <li><a href="tel:0981166632"><span>39B Đại Lộ Hồ Chí Minh - TP Hải Dương</span><br />Hotline: 0981.166.632</a></li>
			                    </ul>
			                    <h4>Thái Bình</h4>
			                    <ul>
			                        <li><a href="tel:0981166650"><span>Shop số 8 - khu Shophouse  - TP Thái Bình</span><br />Hotline: 0981.166.650</a></li>
			                    </ul>
			                    <h4>Hồ Chí Minh</h4>
			                    <ul>
			                        <li><a href="tel:0949742654"><span>578 Lê Hồng Phong - P.10 - Q.10</span><br />Hotline: 0949.742.654</a></li>
			                    </ul>
			                </div>
			            </div>
			    </div>
			    <!-- Gọi khiếu nại -->
			    <div class="custom-footer-khieunai">
			        <div class="main-khieunai footer-title-tt">Gọi khiếu nại <i class="icon-down-open"></i><i class="icon-up-open"></i></div>
			        <div class="footer-show-tt">
			            <a href="tel:0886308688">
			              <p>Mọi ý kiến góp ý liên hệ:</p>
			              <p>MS. HƯƠNG - QUẢN LÝ DỊCH VỤ KHÁCH HÀNG</p>
			              <p>088.630.8688</p>
			              <p>(Hãy để lại tin nhắn nếu máy bận hoặc không liên lạc được, chúng tôi sẽ gọi lại cho bạn sớm nhất)</p>
			            </a>
			        </div>
			    </div>
			    <!-- Thông tin khác -->
			    <div class="custom-footer-moreinfo">
			        <div class="main-moreinfo-tt footer-title-tt">Thông tin khác <i class="icon-down-open"></i><i class="icon-up-open"></i></div>
			        <div class="footer-show-tt">
			            <ul>
			                <li><a href="https://tintuc.shopdunk.com/category/khuyen-mai">Khuyến mại</a></li>
			                <li><a href="#">Tính toán trả góp</a></li>
			                <li><a href="https://shopdunk.com/chinh-sach-bao-hanh">Chính sách bảo hành</a></li>
			                <li><a href="https://shopdunk.com/chinh-sach-tra-gop">Chính sách trả góp</a></li>
			                <li><a href="https://shopdunk.com/bao-hanh-roi-vo-shopdunk">Bảo hành rơi vỡ</a></li>
			                <li><a href="https://shopdunk.com/chinh-sach-ship-cod">Hướng dẫn ship COD</a></li>
			                <li><a href="https://shopdunk.com/gioi-thieu">Giới thiệu về ShopDunk</a></li>
			            </ul>
			        </div>
			    </div>
			    <!-- Website cùng hệ thống -->
			    <div class="custom-footer-websiteht">
			        <div class="main-websiteht footer-title-tt">Website cùng hệ thống <i class="icon-down-open"></i><i class="icon-up-open"></i></div>
			        <div class="footer-show-tt">
			            <ul>
			                <li>
			                    <a href="https://shopdunk.com">
			                        <img src="https://storage.googleapis.com/shopdunk-images/dienthoaixanhnew/2018/06/shopdunk-icon.png">
			                        <p>ShopDunk - Chuỗi Siêu Thị Apple Lớn Nhất Việt Nam</p>
			                    </a>
			                </li>
			                <li>
			                    <a href="https://ischoolvietnam.com/">
			                        <img src="https://storage.googleapis.com/shopdunk-images/dienthoaixanhnew/2018/07/website-cung-he-thong-2.jpg">
			                        <p>iSchool - Học mọi thứ thật đơn giản</p>
			                    </a>
			                </li>
			            </ul>
			        </div>
			    </div>
			    <!-- Theo dõi chúng tôi -->
			    <div class="custom-footer-followme">
			        <div class="main-followme footer-title-tt">Theo dõi chúng tôi <i class="icon-down-open"></i><i class="icon-up-open"></i></div>
			        <div class="footer-show-tt">
			            <ul>
			                <li>
			                    <a href="https://www.facebook.com/shopdunk.apple/"> 
			                        <span><i class="icon-facebook-circled"></i></span><span>330N</span>
			                    </a>
			                </li>
			                <li>
			                    <a href="https://www.youtube.com/channel/UCNkzEEcWtds4CcfGjJP1bmA">
			                        <span><i class="icon-youtube"></i></span><span>250N</span>
			                    </a>
			                </li>
			            </ul>
			        </div>
			    </div>
			</div>
		</footer>
</div><!-- #Wrapper -->
<?php
	// Responsive | Side Slide
	if( mfn_opts_get( 'responsive-mobile-menu' ) ){
		get_template_part( 'includes/header', 'side-slide' );
	}
?>
<?php
	if( $back_to_top_position == 'body' ){
		echo '<a id="back_to_top" class="button button_js '. $back_to_top_class .'" href=""><i class="icon-up-open-big"></i></a>';
	}
?>
<?php do_action( 'mfn_hook_bottom' ); ?>
<!-- wp_footer() -->
<?php wp_footer(); ?>

</body>
</html>
