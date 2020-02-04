<?php 
include_once 'bootstrap.php';
include_once 'footer.php';
?>

<div class="container">
<h2>Thank you for visiting Bonne Appetit. You're logged out!</h2>
<p>You will be redirected in <span id="counter">5</span> second(s).</p>
</div>
<script type="text/javascript">
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
        location.href = 'homepage.php';
    }
if (parseInt(i.innerHTML)!=0) {
    i.innerHTML = parseInt(i.innerHTML)-1;
}
}
setInterval(function(){ countdown(); },1000);
</script>