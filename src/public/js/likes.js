$(function(){
  let like = $('#likeBtn');
  like.on('click',function(){
    $this = $(this);
    likePostId = $this.data('post-id');
    $.ajax({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      url: "/post/like",
      type: "POST",
      data : { "post_id" : likePostId },
    })
    .done(function (data){
      console.log(data);
      console.log($this);
      $this.toggleClass('liked');
      $this.next('.like-counter').html(data.post_likes_count);
    })
    .fail(function(){
      console.log('通信失敗');
    });
  });
});
