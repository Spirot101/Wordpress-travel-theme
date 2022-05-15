<footer class="site-footer">
  <div class="site-footer__inner container container--narrow">
    <div class="group">
      <div class="site-footer__col-one">
        <h1 class="school-logo-text school-logo-text--alt-color">
          <a href="<?php echo site_url() ?>"><strong>OLKA</strong></a>
        </h1>
        <p><a class="site-footer__link" href="<?php echo site_url('/om-olka') ?>">Om OLKA</a></p>
        <p><a class="site-footer__link" href="<?php echo site_url('/kontakt') ?>">Kontakta Oss</a></p>
      </div>

      <div class="site-footer__col-two-three-group">
        <div class="site-footer__col-two">
          <h3 class="headline headline--small">Utforska</h3>
          <nav class="nav-list">
            <ul>
            <li><a href="<?php echo site_url('travel-matches') ?>">Träningsresor</a></li>
            <li><a href="<?php echo site_url('travel-cup') ?>">Cuper</a></li>
            <li><a href="<?php echo site_url('travel-soccer') ?>">Fotbollsresor</a></li>
            <li><a href="<?php echo site_url('travel-camp') ?>">Sportsresor</a></li>
            </ul>
          </nav>
        </div>

        <div class="site-footer__col-three">
          <h3 class="headline headline--small">Lär</h3>
          <nav class="nav-list">
            <ul>
              <li><a href="<?php echo site_url('/jobba-hos-oss') ?>">Jobba Hos Oss</a></li>
              <li><a href="<?php echo site_url('/nyheter') ?>">Nyheter</a></li>
              <li><a href="<?php echo site_url('/information-om-kakor') ?>">Kakor</a></li>
              <li><a href="<?php echo site_url('/integritetspolicy') ?>">Privacy</a></li>
            </ul>
          </nav>
        </div>
      </div>

      <div class="site-footer__col-four">
        <h3 class="headline headline--small">Anslut Med Oss</h3>
        <nav>
          <ul class="min-list social-icons-list group">
            <li>
              <a href="#" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#" class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>