
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

          <?php if ($this->session->get("user_id")){ ?>
          <li> <?php echo $this->tag->linkTo(array(array("for" => "logout", "language" => $this->dispatcher->getParam("language")), $t->_("logoutLink"))) ?> </li>
          <?php }
          else { ?>
             <li> <?php echo $this->tag->linkTo(array(array("for" => "login", "language" => $this->dispatcher->getParam("language")), $t->_("loginLink"))) ?> </li>
          <?php  } ?>

        </ul>
            <ul class="nav navbar-nav navbar-right">
            {% for lang in languages %}
            <li> <a href="index/changeLanguage/{{ lang.getName() }}"><img src="/booking/public/img/flags/{{ lang.getName() }}.gif" alt="{{ lang.getName() }}" title="{{ lang.getFullname() }}"> </a> </li>
            {% endfor %}
             </ul>
    <?php
      }?>

  </div><!-- /.container-fluid -->
</nav>