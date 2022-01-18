<div class="fal-content-body">
  <div class="fal-content">
    <div class="fal-part">
      <div class="fal-ghazal-number-part">
        <div class="fal-ghazal-number-lbl"><span id="fal-ghazal-title">غزل شماره </span><span> :</span></div>

        <div id="div-fal-ghazal-number-text" class="fal-ghazal-number-text">
          <span id="fal-ghazal-text-verse-odd">مصرع اول</span>
          <span id="fal-ghazal-text-verse-even">مصرع دم</span>
        </div>

        <div class="fal-ghazal-music-prat">

          <div class="controls">
            <div id="showPopupNotification" class="play">
              <img src="image/play-button.png" style="width: 10px">
            </div>

            <div class="pause">
              <img src="image/pause-button.png" style="width: 10px">
            </div>
          </div>

          <div class="volumeIcon">
            <img src="image/volume-up-interface-symbol.png" style="width: 10px">

            <div class="volume"></div>
          </div>

          <!-- Section three -->
          <ul class="playlist" id="playlist">
            <!--            <li audioURL="https://ganjgah.ir/api/audio/file/5916.mp3" artist="Artist 1"> </li>-->
          </ul>
          <!-- Section four -->

          <div id="tracker">
            <div id="progress-bar">
              <span id="progress"></span>
            </div>
            <span id="duration">0:00 / 00:00</span>
          </div>

        </div>
      </div>

      <div class="fal-ghazal-text-part">
        <div class="fal-ghazal-text-lbl">
          <span>ای صاحب فال: </span>
        </div>

        <div class="fal-ghazal-text">
          <div id="fal-ghazal-text-htmlExcerpt"></div>
        </div>
      </div>

      <button class="fal-btn" id="btn-back-home">بازگشت به صفحه اصلی</button>
    </div>
  </div>
</div>

<script>
  $(function () {
    var falGhazalTitle = $('#fal-ghazal-title');
    //var falGhazalHtmlText = $('#fal-ghazal-htmlText');
    var falGhazalTextHtmlExcerpt = $('#fal-ghazal-text-htmlExcerpt');
    var falGhazalTextVerseEven = $('#fal-ghazal-text-verse-even');
    var falGhazalTextVerseOdd = $('#fal-ghazal-text-verse-odd');
    var divFalGhazalNumberText = $('#div-fal-ghazal-number-text');
    var detailMp3 = $('ul#playlist');

    const url = 'https://ganjgah.ir/api/ganjoor/hafez/faal';
    $.ajax(url, {
      //type: 'post',
      //dataType: 'json',
      //        data: {
      //          keyword: value
      //        },
      success: function (data) {
        falGhazalTitle.html(data.title);
        divFalGhazalNumberText.empty();

        detailMp3.html('<li audioURL="' + data.recitations[3].mp3Url + '" artist="Artist 1"> </li>');
        playerInit();

        jQuery(data.verses).each(function (i, item) {
          var number = item.vOrder

          if (number % 2 == 0) {
            divFalGhazalNumberText.append('<span id="fal-ghazal-text-verse-even">' + item.text + '</span>');
            divFalGhazalNumberText.append('<br>');
          } else {
            divFalGhazalNumberText.append('<span id="fal-ghazal-text-verse-odd">' + item.text + '</span>');
          }
        })

        jQuery(data.top6RelatedPoems).each(function (i, item) {
          falGhazalTextHtmlExcerpt.html(item.htmlExcerpt);
        })
      }
    });

    var root = $('.fal-content-body').parent();

    const btnBackHome = $('#btn-back-home');
    btnBackHome.on('click', function () {
      $.ajax({
        url: 'home.php'
      }).done(function (output) {
        detailMp3.empty();
        root.html(output);
      });
    });
  });


</script>