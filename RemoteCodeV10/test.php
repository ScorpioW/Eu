<style>
.container {
    position: relative;
    width: 50%;
    background-color: black;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.container:hover .image {
  opacity: 0.;
}
</style>

<div class="container">
    <img src="images/pessoas.jpg" alt="Avatar" class="image" style="width:100%">
</div>
