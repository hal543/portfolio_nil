$(function() {
    $('#login-show').click(function(){
      $('#login-modal').fadeIn();
    });
    
    $('.signup-show').click(function(){
      $('#signup-modal').fadeIn();
    });
    
    // 「.close-modal」要素にclickイベントを設定してください
    $(".close-modal").click(function(){
      $("#signup-modal").fadeOut();
      $("#login-modal").fadeOut();
    });

    $('.click').click(function(){
        $('.up').fadeIn();
      });
      
      // 「.close-modal」要素にclickイベントを設定してください
      $(".close-modal").click(function(){
        $("#signup-modal").fadeOut();
        $("#login-modal").fadeOut();
      });
      
      //home変更ボタン
      $('.home-set-button').click(function(){
        $('.home-set').fadeIn();
      });

      $(".home-cancel").click(function(){
        $(".home-set").fadeOut();
      });

      $(".file-post").click(function(){
        $(".homepic-check").fadeIn();
      });

      //seller_topサイドバー
      $('.mypage_button').hover(
        function () {
          $(this).find('.mypage_button_content').addClass("textactive");
        },
        function () {
          $(this).find('.mypage_button_content').removeClass("textactive");
        }
      );

      $('.post_button').hover(
        function () {
          $(this).find('.post_button_content').addClass("textactive");
        },
        function () {
          $(this).find('.post_button_content').removeClass("textactive");
        }
      );

      $('.account_button').hover(
        function () {
          $(this).find('.account_button_content').addClass("textactive");
        },
        function () {
          $(this).find('.account_button_content').removeClass("textactive");
        }
      );

  });


  function previewImage(obj)
{
	let fileReader = new FileReader();
	fileReader.onload = (() => {
    document.getElementById('preview').src = fileReader.result;
  });
	fileReader.readAsDataURL(obj.files[0]);
}




