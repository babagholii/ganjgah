<div class="detail-ganjoor-content-body">
  <img src="image/detail-ganjoor-right-bg.png" class="detail-ganjoor-right-image">
  <button class="detail-ganjoor-btn" id="btn-back-home">بازگشت به صفحه اصلی</button>

  <div class="detail-ganjoor-content">
    <?$poetId = isset($_POST['poetId']) ? $_POST['poetId'] : 0;?>
    <input id="detail-ganjoor-poet-id" type="hidden" value="<?= $poetId ?>">

    <?$imageUrl = isset($_POST['imageUrl']) ? $_POST['imageUrl'] : "image/detail-ganjoor-img-poet.png";?>
    <input id="detail-ganjoor-poet-imageUrl" type="hidden" value="<?= $imageUrl ?>">

    <div class="detail-ganjoor-ghazal-text-part1">
      <img src="image/detail-ganjoor-img-poet.png" id="detail-ganjoor-poet-image">

      <div class="detail-ganjoor-ghazal-text-part2">
        <div class="detail-ganjoor-ghazal-number-part">
          <span id="detail-ganjoor-ghazal-number">غزل شماره 4</span><span>:</span>
        </div>

        <div id="detail-ganjoor-ghazal-text" class="detail-ganjoor-ghazal-text-part">
          <span id="detail-ganjoor-ghazal-text-verse-odd">مصرع اول</span>
          <span id="detail-ganjoor-ghazal-text-verse-even">مصرع دم</span>
        </div>

      </div>

      <img src="image/available-updates.png" class="detail-ganjoor-available-update-image"
           id="detail-ganjoor-btn-update">
    </div>

    <div class="detail-ganjoor-meaning-text-part">
      <div id="detail-ganjoor-meaning-text">
        یرجه ۶۰۴ لاس رد یو .تسا یرمق یرجه متفه نرق گرزب رعاش یولوم هب روهشم یخلب دمحم نیدلا‌لالج انالوم ناطلس و وا نیب
        هک یشجنر ببس هب دوب دوخ نامز گرزب نایفوص و املع زا هک نیدلاءاهب یو ردپ .دش هداز خلب رد یرمق ردپ توف زا دعب
        انالوم .تفر هینوق هب تحایس و ریس یتدم زا دعب و دمآ نوریب خلب زا دوب هدمآ دیدپ هاشمزراوخ دمحم رد یبالقنا یرمق
        یرجه ۶۴۲ لاس رد یزیربت سمش اب یو تاقالم .تفرگ رارق یذمرت ققحم نیدلا‌ناهرب تامیلعت تحت لاس رد یو .تخادرپ نطاب
        بیهذت و سفن تبقارم هب و دش یو یاوتف و سیردت دنسم کرت بجوم هک دروآ دیدپ یو ،تابوتکم ،تایعابر ،سمش تایلک ای تایلزغ
        ناوید ،یونثم هب ناوت‌یم وا راثآ زا .تفای تافو هینوق رد یرمق یرجه ۶۷۲ .درک هراشا هعبس سلاجم و هیفام هیف
      </div>
    </div>
  </div>
</div>

<script>
  $(function () {
    var root = $('.detail-ganjoor-content-body').parent();

    const btnBackHome = $('#btn-back-home');
    btnBackHome.on('click', function () {
      $.ajax({
        url: 'home.php'
      }).done(function (output) {
        root.html(output);
      });
    });

    var detailGanjoorImageUrl = $('#detail-ganjoor-poet-imageUrl');
    var detailGanjoorPoetImage = $('#detail-ganjoor-poet-image');
    detailGanjoorPoetImage.attr('src', 'https://ganjgah.ir' + detailGanjoorImageUrl.val());

    var detailGanjoorPoetId = $('#detail-ganjoor-poet-id');
    var poetId = detailGanjoorPoetId.val();

    if (poetId != 0) {
      ganjoorPoemRando(poetId);
      var detailGanjoorBtnUpdate = $('#detail-ganjoor-btn-update');

      detailGanjoorBtnUpdate.on('click', function() {
        ganjoorPoemRando(poetId);
      });
    }

    function ganjoorPoemRando(poetId) {
      const url = 'https://ganjgah.ir/api/ganjoor/poem/random?poetId=' + poetId;
      $.ajax(url, {
        dataType: 'JSON',
        success: function (data) {
          var detailGanjoorGhazalNumber = $('#detail-ganjoor-ghazal-number');
          detailGanjoorGhazalNumber.html(data.title);

          var detailGanjoorGhazalText = $('#detail-ganjoor-ghazal-text');
          detailGanjoorGhazalText.empty();

          jQuery(data.verses).each(function (i, item) {
            var number = item.vOrder

            if (number % 2 == 0) {
              detailGanjoorGhazalText.append('<span id="detail-ganjoor-ghazal-text-verse-even">' + item.text + '</span>');
              detailGanjoorGhazalText.append('<br>');
            } else {
              detailGanjoorGhazalText.append('<span id="detail-ganjoor-ghazal-text-verse-odd">' + item.text + '</span>');
            }
          });

          var detailGanjoorMeaningText = $('#detail-ganjoor-meaning-text');
          detailGanjoorMeaningText.html(data.top6RelatedPoems[0].htmlExcerpt);
        }
      });
    }
  });

</script>
