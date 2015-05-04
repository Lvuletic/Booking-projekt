
<nav class="navbar navbar-default">
  <div class="container">

  <ul class="nav navbar-nav">
    <li> <?php echo $this->tag->linkTo(array("index", "home page")) ?> </li>
    <li> <?php echo $this->tag->linkTo(array("apartment/list", "list")) ?> </li>
    <li> <?php echo $this->tag->linkTo(array("admin/price", "prices")) ?> </li>
  </ul>
  </div><!-- /.container-fluid -->
</nav>