<?php 
function footer_show(){
  $temp = '
  <div class="footer-new-container-tt">
    <!-- Hotline -->
    <div class="custom-footer-hotline-tt footer-title-tt">
          <a href="tel:0934688685"><i class="zmdi zmdi-phone"></i> Hotline: 0934.688.685</a>(8:00 - 20:00)
    </div>
    <!-- Liên hệ -->
    <div class="custon-footer-lienhe-tt">
        <div class="main-lienhe-tt footer-title-tt">Liên hệ <i class="icon-down-open"></i><i class="icon-up-open"></i></div>
            <div class="footer-show-tt">
                <div class="lienhe-main-tt">
                    <ul>
                        <li><a href="tel:0971688685"><span>Văn phòng Karseell - Nguyễn Đức Cảnh - Hoàng Mai - Hà Nội</span><br />SĐT: 0971 688 685 <br />(Giờ hành chính)</a></li>
                    </ul>
                </div>
            </div>
    </div>
    <!-- Gọi khiếu nại -->
    <div class="custom-footer-khieunai">
        <div class="main-khieunai footer-title-tt">Gọi khiếu nại <i class="icon-down-open"></i><i class="icon-up-open"></i></div>
        <div class="footer-show-tt">
            <a href="tel:0934688685">
              <p>Mọi ý kiến góp ý liên hệ:</p>
              <p>MS. HIỀN - GIÁM ĐỐC</p>
              <p>0934 688 685</p>
              <p>(Hãy để lại tin nhắn nếu máy bận hoặc không liên lạc được, chúng tôi sẽ gọi lại cho bạn sớm nhất)</p>
            </a>
        </div>
    </div>
    <!-- Thông tin khác -->
    <div class="custom-footer-moreinfo">
        <div class="main-moreinfo-tt footer-title-tt">Thông tin khác <i class="icon-down-open"></i><i class="icon-up-open"></i></div>
        <div class="footer-show-tt">
            <ul>
                <li><a href="https://blog.karseell.com/chuyen-muc/khuyen-mai/">Khuyến mại</a></li>
                <li><a href="https://blog.karseell.com/chuyen-muc/su-kien/">Sự kiện</a></li>
                <li><a href="https://karseell.com/chinh-sach-bao-mat/</a>Chính sách bảo mật</li>
                <li><a href="https://karseell.com/thong-tin-thanh-toan/">Chính sách thanh toán</a></li>
                <li><a href="https://karseell.com/chinh-sach-van-chuyen/">Chính sách vận chuyển</a></li>
                <li><a href="https://karseell.com/chinh-sach-doi-tra/">Chính sách đổi trả</a></li>
                <li><a href="https://karseell.com/chinh-sach-hoat-dong-chung/">Chính sách hoạt động chung</a></li>
                <li><a href="https://karseell.com/gioi-thieu/">Giới thiệu về Karseell</a></li>
            </ul>
        </div>
    </div>
    <!-- Website cùng hệ thống -->
    <div class="custom-footer-websiteht">
        <div class="main-websiteht footer-title-tt">Website cùng hệ thống <i class="icon-down-open"></i><i class="icon-up-open"></i></div>
        <div class="footer-show-tt">
            <ul>
                <li>
                    <a href="https://karseell.com">
                        <img src="https://blog.karseell.com/wp-content/uploads/2020/03/logo-kr-no-background-mini.png">
                        <p>karseell.com - Công ty TNHH thương mại xuất nhập khẩu K&R Việt Nam</p>
                    </a>
                </li>
                <li>
                    <a href="https://karseellvietnam.com/">
                        <img src="https://blog.karseell.com/wp-content/uploads/2020/03/Logo-karseell-mini.png">
                        <p>karseellvietnam.com - Sản phẩm chăm sóc tóc Chính Hãng thương hiệu Karseell, Pallamina, Berdywin</p>
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
                    <a href="https://www.facebook.com/myphamtocchinhhangitalia"> 
                        <span><i class="icon-facebook-circled"></i></span><span>330N</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UCGiOn91I78-0iX4NSNE_BSQ">
                        <span><i class="icon-youtube"></i></span><span>250N</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
  </div>';
return $temp;
}
add_shortcode('mobile_footer_show','footer_show');
?>