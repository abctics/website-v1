function getTopic() {
$('.list-group-item').click(function(){
var topic_ID=$(this).children('span').text();
var request_type='topic_get';
$.ajax({
    url: 'PHP-ajax-request/request.php',
    dataType: "json",
    type: 'GET',
    data:{
      topic_ID:topic_ID,
      request_type:request_type
    },
    success: function(response){
      var array = $.parseJSON(response);
      $('.title').html(array[0]['tittle-content']);
      $('.topic-content').html(array[0]['content']);
    },
    error: function () {
    }
});
});
};
getTopic();
