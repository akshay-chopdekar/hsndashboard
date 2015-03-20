
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js">
</script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js">
</script>
<script type="text/javascript">
  $(document).ready(function(){
    var tz = jstz.determine(); // Determines the time zone of the browser client
    var timezone = tz.name(); //'Asia/Kolhata' for Indian Time.
    alert(timezone);
    $.post("url-to-function-that-handles-time-zone", {tz: timezone}, function(data) {
       //Preocess the timezone in the controller function and get
       //the confirmation value here. On success, refresh the page.
     });
  });
</script>