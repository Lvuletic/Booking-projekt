
<nav class="navbar navbar-default">
  <div class="container">

  <ul class="nav navbar-nav">
    <li> <?php echo $this->tag->linkTo(array("index", "home page")) ?> </li>
    <li> <?php echo $this->tag->linkTo(array("apartment/list", "list")) ?> </li>

    <li> <?php echo $this->tag->linkTo(array("user/index", "register")) ?> </li>

    <?php if ($this->session->get("user_id")){ ?>
    <li> <?php echo $this->tag->linkTo(array("login/logout", "logout")) ?> </li>
    <?php }
    else { ?>
       <li> <?php echo $this->tag->linkTo(array("login/index", "login")) ?> </li>
    <?php  } ?>
    <?php if($this->session->get("user_id")==1)
    { ?>
    <li> <?php echo $this->tag->linkTo(array("admin/season", "seasons")) ?> </li>
    <li> <?php echo $this->tag->linkTo(array("admin/apartment", "admin-units")) ?> </li>
    <li> <?php echo $this->tag->linkTo(array("admin/specification", "admin-specs")) ?> </li>
    <?php } ?>

  </ul>
  </div><!-- /.container-fluid -->
</nav>