
<nav class="navbar navbar-default">
  <div class="container">
  <?php if($this->session->get("user_id")==1)
      { ?>
      <ul class="nav navbar-nav">
      <li> <?php echo $this->tag->linkTo(array("admin/season", "seasons")) ?> </li>
      <li> <?php echo $this->tag->linkTo(array("admin/apartment", "admin-units")) ?> </li>
      <li> <?php echo $this->tag->linkTo(array("admin/specification", "admin-specs")) ?> </li>
      <li> <?php echo $this->tag->linkTo(array("admin/language", "admin-lang")) ?> </li>
      <li> <?php echo $this->tag->linkTo(array(array("for" => "logout", "language" => $this->dispatcher->getParam("language")), "Logout")) ?> </li>
      </ul>
      <?php } else { ?>
       <ul class="nav navbar-nav">
          <li> <?php echo $this->tag->linkTo(array(array("for" => "homepage", "language" => $this->dispatcher->getParam("language")), $t->_("homepage"))) ?> </li>
          <li> <?php echo $this->tag->linkTo(array(array("for" => "list", "language" => $this->dispatcher->getParam("language")), $t->_("listLink"))) ?> </li>
          <li> <?php echo $this->tag->linkTo(array(array("for" => "registration", "language" => $this->dispatcher->getParam("language")), $t->_("registerLink"))) ?> </li>

        </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
            <?php if ($this->session->get("user_id")){ ?>
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
               <?php echo $this->session->get("username") ?>
               <span class="caret"></span></a>
               <?php }
               else {
               echo $this->tag->linkTo(array(array("for" => "login", "language" => $this->dispatcher->getParam("language")), $t->_("loginLink")));
               }?>
            <ul class="dropdown-menu" role="menu">

                        <li> <?php echo $this->tag->linkTo(array(array("for" => "account", "language" => $this->dispatcher->getParam("language")), $t->_("yourAccount"))) ?> </li>
                        <li> <?php echo $this->tag->linkTo(array(array("for" => "yourReservation", "language" => $this->dispatcher->getParam("language")), $t->_("yourReservation"))) ?> </li>
                        <li class="divider"></li>
                        <li> <?php echo $this->tag->linkTo(array(array("for" => "logout", "language" => $this->dispatcher->getParam("language")), $t->_("logoutLink"))) ?> </li>

                      </ul>
                    </li>
            {% for lang in languages %}
            <li> <?php echo $this->tag->linkTo("index/changeLanguage/".$lang->getName(), $this->tag->image(array("public/img/flags/".$lang->getName().".gif", "alt" => $lang->getName(), "title" => $lang->getFullname()))) ?> </li>
            {% endfor %}
            </ul>
    <?php
      }?>

  </div><!-- /.container-fluid -->
</nav>