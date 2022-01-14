<!DOCTYPE html>
<html lang="fa">
<head>
  <!-- Favicon and touch icons -->
  <!--  <link rel="shortcut icon" href="--><? //= baseUrl() ?><!--/image/project/logo-64.png">-->

  <meta charset="utf-8">
  <title></title>

  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="asset/style/style.css">
  <!--  <script src="--><? //= baseUrl() ?><!--/theme/page-home/asset/js/custom.js"></script>-->
  <script src="asset/js/jquery-3.6.0.min.js"></script>

</head>
<body>
<div class="fal-content-body">
  <div class="fal-content">
    <div class="fal-part">
      <div class="fal-ghazal-number-part">
        <div class="fal-ghazal-number-lbl"><span id="fal-ghazal-title">غزل شماره </span><span> :</span></div>

        <div id="div-fal-ghazal-number-text" class="fal-ghazal-number-text">
          <span id="fal-ghazal-text-verse-odd">مصرع اول</span>
          <span id="fal-ghazal-text-verse-even">مصرع دم</span>
        </div>

        <div class="fal-ghazal-music-prat"></div>
      </div>

      <div class="fal-ghazal-text-part">
        <div class="fal-ghazal-text-lbl">
          <span>ای صاحب فال: </span>
        </div>

        <div class="fal-ghazal-text">
          <div id="fal-ghazal-text-htmlExcerpt"></div>
        </div>
      </div>

      <button class="fal-btn">بازگشت به صفحه اصلی</button>
    </div>
  </div>
</div>

<div style="direction: ltr" id="test"></div>
</body>
</html>


<script>

  $(function () {
    var falGhazalTitle = $('#fal-ghazal-title');
    //var falGhazalHtmlText = $('#fal-ghazal-htmlText');
    var falGhazalTextHtmlExcerpt = $('#fal-ghazal-text-htmlExcerpt');
    var falGhazalTextVerseEven = $('#fal-ghazal-text-verse-even');
    var falGhazalTextVerseOdd = $('#fal-ghazal-text-verse-odd');
    var divFalGhazalNumberText = $('#div-fal-ghazal-number-text');

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

        jQuery(data.verses).each(function (i, item) {
          var number = item.vOrder

          if (number % 2 == 0) {
            divFalGhazalNumberText.append('<span id="fal-ghazal-text-verse-even">'+ item.text +'</span>');
            divFalGhazalNumberText.append('<br>');
          } else {
            divFalGhazalNumberText.append('<span id="fal-ghazal-text-verse-odd">'+ item.text +'</span>');
          }
        })

        jQuery(data.top6RelatedPoems).each(function (i, item) {
          falGhazalTextHtmlExcerpt.html(item.htmlExcerpt);
        })
      }
    });

  });


</script>
