<div class="ganjoor-content-body">
  <div class="ganjoor-content">
    <button class="ganjoor-btn" id="btn-back-home">بازگشت به صفحه اصلی</button>


    <div class="ganjoor-meaning-text-part"></div>


    <div class="ganjoor-ghazal-text-part">
      <img src="image/ganjoor-left-bg.png" class="ganjoor-left-image">
    </div>

    <div class="btn-part">
      <div class="ganjoor-btn-left" id="ganjoor-btn-left-id">
        <img src="image/back.png" class="ganjoor-btn-left-img">
      </div>

      <div class="ganjoor-btn-right" id="ganjoor-btn-right-id">
        <img src="image/forward.png" class="ganjoor-btn-right-img">
      </div>
    </div>

    <div class="ganjoor-poet-part1">
      <div class="ganjoor-poet-part2" id="ganjoor-poet-part-id" data-transform="0"></div>
    </div>

  </div>
</div>

<script>
  $(function () {
    var root = $('.ganjoor-content-body').parent();

    const btnBackHome = $('#btn-back-home');
    btnBackHome.on('click', function () {
      $.ajax({
        url: 'home.php'
      }).done(function (output) {
        root.html(output);
      });
    });

    var ganjoorPoetPartId = $('#ganjoor-poet-part-id');
    var ganjoorPoetItemTotalCount = 0;

    const url = 'https://ganjgah.ir/api/ganjoor/poets';
    $.ajax(url, {
      dataType: 'JSON',
      success: function (data) {
        jQuery(data).each(function (i, item) {

          var ganjoorPoetitemImg = '<img src="https://ganjgah.ir' + item.imageUrl + '" class="ganjoor-poet-item-img"/>';
          var ganjoorPoetItemLbl = '<div class="ganjoor-poet-item-lbl">' + item.name + '</div>';

          var ganjoorPoetItem = '<div onclick="openDetailGanjoor(' + item.id + ', \'' + item.imageUrl + '\')" class="ganjoor-poet-item">' + ganjoorPoetitemImg + ganjoorPoetItemLbl + '</div>';
          ganjoorPoetPartId.append(ganjoorPoetItem);

          ganjoorPoetItemTotalCount++;
        });
      }
    });

    var ganjoorBtnRightId = $('#ganjoor-btn-right-id');
    var ganjoorBtnLeftId = $('#ganjoor-btn-left-id');

    var widthValue = 227; //$('.ganjoor-poet-item').width();
    const xValue = 187;

    ganjoorBtnRightId.on('click', function () {
      var translateX = ganjoorPoetPartId.data('transform');
      var endTranslateX = (widthValue * (ganjoorPoetItemTotalCount - 3)) * -1;

      if (translateX > endTranslateX) {
        var whatever = translateX - xValue;
        ganjoorPoetPartId.css('transform', "translateX(" + whatever + "px)");
        ganjoorPoetPartId.data('transform', whatever);
      }
    });

    ganjoorBtnLeftId.on('click', function () {
      var translateX = ganjoorPoetPartId.data('transform');

      if (translateX != 0) {
        var whatever = translateX + xValue;
        ganjoorPoetPartId.css('transform', "translateX(" + whatever + "px)");
        ganjoorPoetPartId.data('transform', whatever);
      }
    });

  });

  function openDetailGanjoor(poetId, imageUrl) {
    var root = $('.ganjoor-content-body').parent();

    $.ajax({
      url: 'detail-ganjoor.php',
      method: 'POST',
      data: {
        poetId: poetId,
        imageUrl: imageUrl
      }
    }).done(function (output) {
      root.empty();
      root.html(output);
    });
  }

</script>