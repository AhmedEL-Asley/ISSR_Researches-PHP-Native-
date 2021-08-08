$(function () {

    // Show Password On Required Field
    $('.password').each(function () {
      if ($(this).attr('type') === 'password') {
        $(this).after('<i class="show-password fa fa-eye text-blue fa-2x"></i>');
      }
    })

    var passField = $('.password');
    $('.show-password').hover(function () {
      passField.attr('type','text');
    }, function (){
      passField.attr('type','password');
    });

    
  // Confirmation Message On Button
  $('.confirm').click(function () {
    return confirm('Are You Sure ?');
  });

function showTime(){
  
  var date = new Date();          // to get current time/ date.
  var h = date.getHours();        // to get the current hour
  var m = date.getMinutes();      // to get the current minutes
  var s = date.getSeconds();      //to get the current second
  var session = "AM";             // AM, PM setting

  //conditions for times behavior 
  if ( h == 0 ) { h = 12; }
  if( h >= 12 ) { session = "PM"; }
  if ( h > 12 ) { h = h - 12; }
  m = ( m < 10 ) ? m = "0" + m : m;
  s = ( s < 10 ) ? s = "0" + s : s;

  var time = h + ":" + m + ":" + s + " " + session;        //putting time in one variable
  $('#clock').html(time);         //putting time in our div
  setTimeout( showTime, 1000 );        //to change time in every seconds
}
showTime();

});