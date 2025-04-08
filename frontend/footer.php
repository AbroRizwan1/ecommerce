<!--
    - FOOTER
  -->

<footer>

  <div class="footer-nav ">

    <div class="container">

      <ul class="footer-nav-list">

        <h1>Clickfy</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores harum placeat praesentium impedit ipsa non nesciunt maiores dolor excepturi, deleniti, veritatis voluptatibus natus odio nisi similique tempore saepe dicta rerum?</p>

      </ul>

      <ul class="footer-nav-list">

        <li class="footer-nav-item">
          <h2 class="nav-title">Contact</h2>
        </li>

        <li class="footer-nav-item flex">
          <div class="icon-box">
            <ion-icon name="location-outline"></ion-icon>
          </div>

          <address class="content">
            419 State 414 Rte
            Beaver Dams, New York(NY), 14812, USA
          </address>
        </li>

        <li class="footer-nav-item flex">
          <div class="icon-box">
            <ion-icon name="call-outline"></ion-icon>
          </div>

          <a href="tel:+607936-8058" class="footer-nav-link">(607) 936-8058</a>
        </li>

        <li class="footer-nav-item flex">
          <div class="icon-box">
            <ion-icon name="mail-outline"></ion-icon>
          </div>

          <a href="mailto:example@gmail.com" class="footer-nav-link">example@gmail.com</a>
        </li>

      </ul>

      <ul class="footer-nav-list">

        <li class="footer-nav-item">
          <h2 class="nav-title">Follow Us</h2>
        </li>

        <li>

        </li>

      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    <p class="copyright">
      Copyright &copy; <a href="#">Anon</a> all rights reserved.
    </p>


  </div>

</footer>

<!--
    - custom js link
  -->
<script src="./assets/js/script.js"></script>


<!--
    - ionicon link
  -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<!--===================== backend links -->

<!-- bundle -->
<script src="assets/backend_css/js/vendor.min.js"></script>
<script src="assets/backend_css/js/app.min.js"></script>



<!-- third party js -->
<script src="assets/backend_css/js/vendor/apexcharts.min.js"></script>
<script src="assets/backend_css/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/backend_css/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="assets/backend_css/ js/pages/demo.dashboard.js"></script>
<!-- end demo js-->




<script src="/ecommerce/Theme1/frontend/jquery-3.7.1.min.map"></script>
<script src="myscript.js"></script>


<script>
  let sideBarClose = document.querySelector('#checkbox');
  let sideBarOpen = document.querySelector('#open');
  let sideNav = document.querySelector('#side-nav1');

  sideBarClose.addEventListener('click', () => {
    sideNav.style.width = "0";
  })


  sideBarOpen.addEventListener('click', () => {
    sideNav.style.width = "290px";
  })



  // JavaScript to handle the accordion functionality
  document.addEventListener('DOMContentLoaded', function() {
    var accordions = document.querySelectorAll('.accordion');

    accordions.forEach(function(accordion) {
      accordion.addEventListener('click', function() {
        this.classList.toggle('active');
      });
    });
  });
</script>