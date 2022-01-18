<div class="content-body">
  <div class="header">
    <nav class="navbar navbar-expand-lg">
      <div class="container">

        <a class="navbar-brand" href="">
          <img src="image/logo-g.png" style="height: 100px;width: 100px;" alt="">
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <span id="menu-faal" class="nav-link smoothScroll">فال حافظ</span>
            </li>

            <li class="nav-item">
              <span id="menu-poem" class="nav-link">گنجینه اشعار</span>
            </li>

            <li class="nav-item">
              <span id="menu-about" class="nav-link">درباره ما</span>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="content">
    <div class="image-left-background"></div>

    <div class="content-item">
      <img src="image/index-book.png" class="img-index-book">

      <div style="display: inline-block; margin-right: 10px">
        <pre class="block-justify" style="padding: 8px; margin-top: 25px;">
  تاریخ کهن ایران زمین با پیشینه ای غنی از فرهنگ و هنر، از دیرباز با شعر و ادبیات در هم
  پیجیده و ایران، مهد پرورش شاعران بزرگی بوده و درگیر و دار فراز و نشیب هایی که در طول
  تاریخ بر آن گذشته، اما شاهنامه وزین و پارسی پرور فردوسی بزرگ، اشعار روح بخش مولانا و
  عش بازی اش با حق، غزل های عاشقانه و عارفانه عالم گیر در دیوان حافظ، اندیشه ژرف و عرفان
  ناب عطار نیشابوری همه و همه همچون مرهمی بر زخم های کوچک و بزرگش تسکین داده اند.
        </pre>

        <div style="text-align: center">
          <button id="btn-faal" type="submit" class="btn" name="btn-submit" style="vertical-align: middle; margin-left: 10px">فال حافظ</button>
          <button id="btn-poem" type="submit" class="btn" name="btn-submit" style="vertical-align: middle;">گنجینه اشعار</button>
        </div>
      </div>
    </div>
  </div>

  <div id="footer-wrapper">
    <div id="footer-design">@2021 Tala Alikhasi & Masume Godarzi, All Rights Reserved</div>
  </div>
</div>

<script>
  $(function() {
    var root = $('.content-body').parent();

    const menuFaal = $('#menu-faal');
    menuFaal.on('click', function () {
      openFaal(root);
    });

    const menuPoem = $('#menu-poem');
    menuPoem.on('click', function () {
      openGanjoor(root);
    });

    const menuAbout = $('#menu-about');
    menuAbout.on('click', function () {
      openAbout(root);
    });

    const btnFaal = $('#btn-faal');
    btnFaal.on('click', function () {
      openFaal(root);
    });

    const btnPoem = $('#btn-poem');
    btnPoem.on('click', function () {
      openGanjoor(root);
    });

  });

  function openFaal(root) {
    $.ajax({
      url: 'faal.php'
    }).done(function (output) {
      root.html(output);
    });
  }

  function openGanjoor(root) {
    $.ajax({
      url: 'ganjoor.php'
    }).done(function (output) {
      root.html(output);
    });
  }

  function openAbout(root) {
    $.ajax({
      url: 'about.php'
    }).done(function (output) {
      root.html(output);
    });
  }
</script>