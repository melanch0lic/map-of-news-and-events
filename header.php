<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<header class="p-3 bg-black text-white">
    <script>
        function AddBorder1(){
            document.getElementById("first").classList.add("word-border");
            document.getElementById("second").classList.remove("word-border");
        }
        function AddBorder2(){
            document.getElementById("first").classList.remove("word-border");
            document.getElementById("second").classList.add("word-border");
        }
    </script>
      <div class="container">
        <div id ="header" class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <ul id ="navigation" class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 ">
            <li><a href="#" class="px-2 text-white"></a></li>
            <li><a href="#" class="px-2 text-white"></a></li>
            <li><a href="#" class="px-2 text-white"></a></li>
            <li><a href="index.php" id ="first" class="nav-link px-2 text-white">Карта</a></li>
            <li><a href="#" class="px-2 text-white"></a></li>
            <li><a href="#" class="px-2 text-white"></a></li>
            <li><a href="#" class="px-2 text-white"></a></li>
            <li><a href="newslist.php" id ="second"  class="nav-link px-2 text-white" >Лента Новостей</a></li>
          </ul>
          <script>$(function($) {
  let url = window.location.href;
  $('li a').each(function() {
    if (this.href === url) {
      $(this).closest('li>a').addClass('word-border');
    }
  });
});</script>
           <div class = "logotext" id="logotext"><a class="logo" href ="index.php"><img src ="logo.png" width = "300" height="65"></a></div> 
        </div>
      </div>
    </header>
