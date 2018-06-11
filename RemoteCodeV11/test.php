<?php include("php/header.php")?>

<link rel="stylesheet" href="css/style.css">

<div id="page" class="container">

<form action="" method="post">
  <div class="dropdown">
      <button type="button" onclick="dropClick()" class="dropbtn">Nenhuma</button>
      <div id="myDropdown" class="dropdown-content">
          <p class="select">Nenhuma</p>
          <p class="select">Home</p>
          <p class="select">About</p>
          <p class="select">Contact</p>
      </div>
  </div>
</form>


        </div>
    </div>
</div>
<?php include("php/footer.php")?>

<script>
function dropClick() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>