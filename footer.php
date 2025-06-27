    </main>
  <footer>
    <div class="container">
      <div class="footer-wrapper">

        <?php
        // Get global ACF options
        $footer_logo = get_field('footer_logo', 'option'); // Image ID
        $address = get_field('contact_address', 'option');
        $phone = get_field('contact_phone', 'option');
        $email = get_field('contact_email', 'option');
        $social_links = get_field('social_links', 'option'); // Repeater
        ?>

        <div class="footer-details">
          <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            if ($custom_logo_id) {
              echo wp_get_attachment_image($custom_logo_id, 'full', false, ['class' => 'img-fluid']);
            }
          ?>


          <div class="details">
            <?php if ($address): ?>
              <div class="item">
                <!-- Address SVG here -->
                <?php echo esc_html($address); ?>
              </div>
            <?php endif; ?>

            <?php if ($phone): ?>
              <div class="item">
                <!-- Phone SVG here -->
                <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
              </div>
            <?php endif; ?>

            <?php if ($email): ?>
              <div class="item">
                <!-- Email SVG here -->
                <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
              </div>
            <?php endif; ?>
          </div>

          <?php if ($social_links): ?>
            <div class="footer-socials">
              <?php foreach ($social_links as $social): ?>
                <?php if (!empty($social['url']) && !empty($social['icon'])): ?>
                  <a href="<?php echo esc_url($social['url']); ?>" target="_blank" rel="noopener">
                    <?php echo $social['icon']; ?>
                  </a>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="footer-menu">
          <div class="menu-row">
            <div class="item menu-1">
              <?php
              wp_nav_menu([
                'theme_location' => 'footer_menu_1',
                'container'      => false,
                'items_wrap'     => '%3$s', // Removes <ul>
                'link_before'    => '',
                'link_after'     => '',
                'fallback_cb'    => false,
                'depth'          => 1,
                'walker'         => new Walker_Nav_Flat(),
              ]);
              ?>
            </div>

            <div class="item menu-2">
              <div class="dropdown-title">
                <a href="/">Solutions</a>
                <!-- SVG caret -->
              </div>
              <div class="subs">
                <?php
                wp_nav_menu([
                  'theme_location' => 'footer_menu_2',
                'container'      => false,
                'items_wrap'     => '%3$s', // Removes <ul>
                'link_before'    => '',
                'link_after'     => '',
                'fallback_cb'    => false,
                'depth'          => 1,
                'walker'         => new Walker_Nav_Flat(),
                ]);
                ?>
              </div>
            </div>

            <div class="item menu-3">
              <div class="dropdown-title">
                <a href="/">Platform</a>
                <!-- SVG caret -->
              </div>
              <div class="subs">
                <?php
                wp_nav_menu([
                  'theme_location' => 'footer_menu_3',
                'container'      => false,
                'items_wrap'     => '%3$s', // Removes <ul>
                'link_before'    => '',
                'link_after'     => '',
                'fallback_cb'    => false,
                'depth'          => 1,
                'walker'         => new Walker_Nav_Flat(),
                ]);
                ?>
              </div>
            </div>
          </div>
        </div>

        <div class="footer-search">
          <div class="input-search-wrapper">
            <input type="text" placeholder="Search" class="form-control input-search">
          </div>
          <a href="/contact" class="btn btn-solid">Contact</a>
        </div>

      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>

  
  <!-- </main>
  <footer>
    <div class="container">
      <div class="footer-wrapper">
        
        <div class="footer-details">
          <img src="./assets/images/logo-footer.png" class="img-fluid">

          <div class="details">
            <div class="item">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
              <path d="M14.9297 11.4922C14.9297 13.1102 13.618 14.4219 12 14.4219C10.382 14.4219 9.0703 13.1102 9.0703 11.4922C9.0703 9.87417 10.382 8.5625 12 8.5625C13.618 8.5625 14.9297 9.87417 14.9297 11.4922Z" stroke="#0000FF" stroke-width="1.5"/>
              <path d="M13.4735 21.4456C13.0782 21.8263 12.5499 22.0391 12.0002 22.0391C11.4504 22.0391 10.9221 21.8263 10.5268 21.4456C6.90737 17.9384 2.05685 14.0205 4.4223 8.3325C5.70127 5.25702 8.7714 3.28906 12.0002 3.28906C15.229 3.28906 18.299 5.25703 19.578 8.3325C21.9405 14.0134 17.1019 17.9505 13.4735 21.4456Z" stroke="#0000FF" stroke-width="1.5"/>
              </svg>Level 5, 20 Bond Street Sydney NSW, 2000
            </div>
            <div class="item">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
              <path d="M9.1585 6.37629L8.75584 5.47031C8.49256 4.87794 8.36092 4.58174 8.16405 4.35507C7.91732 4.071 7.59571 3.862 7.23592 3.75191C6.94883 3.66406 6.6247 3.66406 5.97645 3.66406C5.02815 3.66406 4.554 3.66406 4.15597 3.84635C3.68711 4.06108 3.26368 4.52734 3.09497 5.01466C2.95175 5.42835 2.99278 5.85349 3.07482 6.70376C3.94815 15.7543 8.91006 20.7162 17.9605 21.5895C18.8108 21.6716 19.236 21.7126 19.6496 21.5694C20.137 21.4007 20.6032 20.9772 20.818 20.5084C21.0002 20.1103 21.0002 19.6362 21.0002 18.6879C21.0002 18.0396 21.0002 17.7155 20.9124 17.4284C20.8023 17.0686 20.5933 16.747 20.3092 16.5003C20.0826 16.3034 19.7864 16.1718 19.194 15.9085L18.288 15.5058C17.6465 15.2207 17.3257 15.0782 16.9998 15.0472C16.6878 15.0175 16.3733 15.0613 16.0813 15.175C15.7762 15.2938 15.5066 15.5185 14.9672 15.9679C14.4304 16.4153 14.162 16.639 13.834 16.7588C13.5432 16.865 13.1588 16.9044 12.8526 16.8592C12.5071 16.8083 12.2426 16.667 11.7135 16.3842C10.0675 15.5046 9.15977 14.5969 8.28011 12.9508C7.99738 12.4218 7.85602 12.1572 7.80511 11.8118C7.75998 11.5055 7.79932 11.1211 7.90554 10.8304C8.02536 10.5023 8.24905 10.2339 8.69643 9.69706C9.14586 9.15774 9.37058 8.88808 9.48939 8.58297C9.60309 8.291 9.64686 7.97646 9.61719 7.66454C9.58618 7.33858 9.44362 7.01782 9.1585 6.37629Z" stroke="#0000FF" stroke-width="1.5" stroke-linecap="round"/>
              </svg><a href="tel:1300 356 204">1300 356 204</a>
            </div>
            <div class="item">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
              <path d="M2 6.66406L8.91302 10.581C11.4616 12.0251 12.5384 12.0251 15.087 10.581L22 6.66406" stroke="#0000FF" stroke-width="1.5" stroke-linejoin="round"/>
              <path d="M2.01577 14.1397C2.08114 17.2053 2.11383 18.738 3.24496 19.8735C4.37608 21.0089 5.95033 21.0484 9.09883 21.1275C11.0393 21.1763 12.9607 21.1763 14.9012 21.1275C18.0497 21.0484 19.6239 21.0089 20.7551 19.8735C21.8862 18.738 21.9189 17.2053 21.9842 14.1397C22.0053 13.154 22.0053 12.1742 21.9842 11.1885C21.9189 8.12292 21.8862 6.59015 20.7551 5.45472C19.6239 4.31929 18.0497 4.27974 14.9012 4.20063C12.9607 4.15187 11.0393 4.15187 9.09882 4.20062C5.95033 4.27972 4.37608 4.31927 3.24495 5.45471C2.11382 6.59014 2.08114 8.12291 2.01576 11.1885C1.99474 12.1742 1.99475 13.154 2.01577 14.1397Z" stroke="#0000FF" stroke-width="1.5" stroke-linejoin="round"/>
              </svg><a href="mailto:info@maintainyourwebsite.com.au">info@maintainyourwebsite.com.au</a>
            </div>
          </div>

          <div class="footer-socials">
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M0 16.6641C0 7.82751 7.16344 0.664062 16 0.664062C24.8366 0.664062 32 7.82751 32 16.6641C32 25.5006 24.8366 32.6641 16 32.6641C7.16344 32.6641 0 25.5006 0 16.6641ZM16 8.66406C20.4 8.66406 24 12.2641 24 16.6641C24 20.6641 21.1 24.0641 17.1 24.6641V18.9641H19L19.4 16.6641H17.2V15.1641C17.2 14.5641 17.5 13.9641 18.5 13.9641H19.5V11.9641C19.5 11.9641 18.6 11.7641 17.7 11.7641C15.9 11.7641 14.7 12.8641 14.7 14.8641V16.6641H12.7V18.9641H14.7V24.5641C10.9 23.9641 8 20.6641 8 16.6641C8 12.2641 11.6 8.66406 16 8.66406Z" fill="#0000FF"/>
              </svg>
            </a>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
              <path d="M16 19.4641C14.5 19.4641 13.2 18.2641 13.2 16.6641C13.2 15.1641 14.4 13.8641 16 13.8641C17.5 13.8641 18.8 15.0641 18.8 16.6641C18.8 18.1641 17.5 19.4641 16 19.4641Z" fill="#0000FF"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M19.4 9.86406H12.6C11.8 9.96406 11.4 10.0641 11.1 10.1641C10.7 10.2641 10.4 10.4641 10.1 10.7641C9.86261 11.0014 9.75045 11.2388 9.61489 11.5258C9.57916 11.6014 9.5417 11.6807 9.5 11.7641C9.48453 11.8105 9.46667 11.8593 9.44752 11.9116C9.34291 12.1974 9.2 12.5878 9.2 13.2641V20.0641C9.3 20.8641 9.4 21.2641 9.5 21.5641C9.6 21.9641 9.8 22.2641 10.1 22.5641C10.3374 22.8014 10.5748 22.9136 10.8617 23.0492C10.9374 23.0849 11.0165 23.1223 11.1 23.1641C11.1464 23.1795 11.1952 23.1974 11.2475 23.2165C11.5333 23.3212 11.9238 23.4641 12.6 23.4641H19.4C20.2 23.3641 20.6 23.2641 20.9 23.1641C21.3 23.0641 21.6 22.8641 21.9 22.5641C22.1374 22.3267 22.2495 22.0893 22.3851 21.8024C22.4209 21.7267 22.4583 21.6475 22.5 21.5641C22.5155 21.5177 22.5333 21.4688 22.5525 21.4165C22.6571 21.1307 22.8 20.7403 22.8 20.0641V13.2641C22.7 12.4641 22.6 12.0641 22.5 11.7641C22.4 11.3641 22.2 11.0641 21.9 10.7641C21.6626 10.5267 21.4252 10.4145 21.1383 10.2789C21.0627 10.2432 20.9833 10.2057 20.9 10.1641C20.8536 10.1486 20.8048 10.1307 20.7525 10.1116C20.4667 10.007 20.0762 9.86406 19.4 9.86406ZM16 12.3641C13.6 12.3641 11.7 14.2641 11.7 16.6641C11.7 19.0641 13.6 20.9641 16 20.9641C18.4 20.9641 20.3 19.0641 20.3 16.6641C20.3 14.2641 18.4 12.3641 16 12.3641ZM21.4 12.2641C21.4 12.8163 20.9523 13.2641 20.4 13.2641C19.8477 13.2641 19.4 12.8163 19.4 12.2641C19.4 11.7118 19.8477 11.2641 20.4 11.2641C20.9523 11.2641 21.4 11.7118 21.4 12.2641Z" fill="#0000FF"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M0 16.6641C0 7.82751 7.16344 0.664062 16 0.664062C24.8366 0.664062 32 7.82751 32 16.6641C32 25.5006 24.8366 32.6641 16 32.6641C7.16344 32.6641 0 25.5006 0 16.6641ZM12.6 8.36406H19.4C20.3 8.46406 20.9 8.56406 21.4 8.76406C22 9.06406 22.4 9.26406 22.9 9.76406C23.4 10.2641 23.7 10.7641 23.9 11.2641C24.1 11.7641 24.3 12.3641 24.3 13.2641V20.0641C24.2 20.9641 24.1 21.5641 23.9 22.0641C23.6 22.6641 23.4 23.0641 22.9 23.5641C22.4 24.0641 21.9 24.3641 21.4 24.5641C20.9 24.7641 20.3 24.9641 19.4 24.9641H12.6C11.7 24.8641 11.1 24.7641 10.6 24.5641C10 24.2641 9.6 24.0641 9.1 23.5641C8.6 23.0641 8.3 22.5641 8.1 22.0641C7.9 21.5641 7.7 20.9641 7.7 20.0641V13.2641C7.8 12.3641 7.9 11.7641 8.1 11.2641C8.4 10.6641 8.6 10.2641 9.1 9.76406C9.6 9.26406 10.1 8.96406 10.6 8.76406C11.1 8.56406 11.7 8.36406 12.6 8.36406Z" fill="#0000FF"/>
              </svg>
            </a>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
              <path d="M18.6 16.6641L14.4 14.2641V19.0641L18.6 16.6641Z" fill="#0000FF"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M0 16.6641C0 7.82751 7.16344 0.664062 16 0.664062C24.8366 0.664062 32 7.82751 32 16.6641C32 25.5006 24.8366 32.6641 16 32.6641C7.16344 32.6641 0 25.5006 0 16.6641ZM22.2 11.3641C22.9 11.5641 23.4 12.0641 23.6 12.7641C24 14.0641 24 16.6641 24 16.6641C24 16.6641 24 19.2641 23.7 20.5641C23.5 21.2641 23 21.7641 22.3 21.9641C21 22.2641 16 22.2641 16 22.2641C16 22.2641 10.9 22.2641 9.7 21.9641C9 21.7641 8.5 21.2641 8.3 20.5641C8 19.2641 8 16.6641 8 16.6641C8 16.6641 8 14.0641 8.2 12.7641C8.4 12.0641 8.90001 11.5641 9.60001 11.3641C10.9 11.0641 15.9 11.0641 15.9 11.0641C15.9 11.0641 21 11.0641 22.2 11.3641Z" fill="#0000FF"/>
              </svg>
            </a>
          </div>
        </div>

        <div class="footer-menu">
          <div class="menu-row">
            <div class="item menu-1">
              <a href="#">About</a>
              <a href="#">Pricing</a>
              <a href="#">Free Website Audit</a>
              <a href="#">FAQs</a>
              <a href="#">Resources</a>
            </div>
            <div class="item menu-2">
              <div class="dropdown-title">
                <a href="/">Solutions</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                <path d="M5.18926 11.6759C4.24431 10.7309 4.91356 9.11523 6.24992 9.11523L18.0992 9.11523C19.4355 9.11523 20.1048 10.7309 19.1598 11.6759L13.2352 17.6005C12.6494 18.1863 11.6997 18.1863 11.1139 17.6005L5.18926 11.6759Z" fill="#0000FF"/>
                </svg>
              </div>
              <div class="subs">
                <a href="#">Marketing Teams</a>
                <a href="#">Small Business</a>
                <a href="#">Agencies</a>
              </div>
            </div>
            <div class="item menu-3">
              <div class="dropdown-title">
                <a href="/">PLATFORM</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                <path d="M5.18926 11.6759C4.24431 10.7309 4.91356 9.11523 6.24992 9.11523L18.0992 9.11523C19.4355 9.11523 20.1048 10.7309 19.1598 11.6759L13.2352 17.6005C12.6494 18.1863 11.6997 18.1863 11.1139 17.6005L5.18926 11.6759Z" fill="#0000FF"/>
                </svg>
              </div>
              <div class="subs">
                <a href="#">WordPress</a>
                <a href="#">Joomla</a>
                <a href="#">Drupal</a>
                <a href="#">Shopify</a>
                <a href="#">Magneto</a>
              </div>
            </div>
          </div>
        </div>

        <div class="footer-search">
          <div class="input-search-wrapper">
            <input type="text" placeholder="Search" class="form-control input-search">
          </div>
          <a href="#" class="btn btn-solid">Contact</a>
        </div>

      </div>
    </div>
  </footer>

build:js scripts/main.min.js -->
  <!-- <script src="./scripts/vendors/jquery.min.js"></script>
  <script src="./scripts/vendors/popper.min.js"></script>
  <script src="./scripts/vendors/bootstrap.min.js"></script>
  <script src="./scripts/vendors/slick.min.js"></script>
  <script src="./scripts/vendors/swiper.min.js"></script>
  <script src="./scripts/core/base.js"></script>
  <script src="./scripts/modules/theme-module.js"></script>
  <script src="./scripts/bootstrapper.js"></script> -->
  
  <!-- endbuild -->

  <!--[if lte IE 9]>
    <script src="javascripts/non-responsive.js"></script>
  <![endif]
</body>

</html> -->