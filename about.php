<div class="about-content-body">
  <div class="about-content">
    <div class="about-part">
      <div class="about-ghazal-number-part">
        <div class="about-ghazal-number-lbl"><span>به نام خداوند بخشنده مهربان</div>

        <div class="about-ghazal-number-text">

          <div class="about-lbl-title">نام و نام خانوادگی: </div>
          <div class="about-lbl-name">طیبه علی خواصی</div>
          <div class="about-lbl-title">شماره دانشجویی: </div>
          <div class="about-lbl-name">982103029</div>

          <hr style="margin-top: 15px; margin-bottom: 15px">

          <div class="about-lbl-title">نام و نام خانوادگی: </div>
          <div class="about-lbl-name">معموعه گودرزی</div>
          <div class="about-lbl-title">شماره دانشجویی: </div>
          <div class="about-lbl-name">982103037</div>

          <hr style="margin-top: 20px; margin-bottom: 20px">

          <div class="about-lbl-title">نام و نام خانوادگی استاد: </div>
          <div class="about-lbl-name" style="font-size: 15px !important;">جناب مهندس سید حسین احمدپناه</div>
          <hr style="margin-top: 20px; margin-bottom: 20px">

          <div class="about-ostad">
            جناب آقای مهندس سید حسین احمدپناه
از اینکه با تلاش های بی‌وقفه و خستگی ناپذیر جهت تولید و اشاعه علم و معرفت، در سالیان فعالیت خویش همت گماردید؛ در کمال احترام و به رسم ادب و اخلاص روز استاد را به شما استاد فرهیخته تبریک عرض نموده و این لوح سپاس ، تقدیم همت رفیع حضرت عالی می گردد.
رحمت ذات الهی همواره شامل حالتان، چراغ نورانی تجربه،گرما بخش زندگیتان و موفقیت روز افزون قرین لحظه های نابتان باد

          </div>

        </div>
      </div>

      <button class="about-btn" id="btn-back-home">بازگشت به صفحه اصلی</button>
    </div>
  </div>
</div>

<script>
  $(function () {
    var root = $('.about-content-body').parent();

    const btnBackHome = $('#btn-back-home');
    btnBackHome.on('click', function () {
      $.ajax({
        url: 'home.php'
      }).done(function (output) {
        root.html(output);
      });
    });
  });
</script>
