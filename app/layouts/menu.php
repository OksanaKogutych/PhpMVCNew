<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
    <?php 
    
        $menu = Helper::getMenu();
        foreach($menu as $item)  :
    ?>
        <li>
            <?php echo Helper::simpleLink($item['path'], $item['name']); ?>
        </li>
    <?php endforeach; ?>
    </ul>
      <?php
            $customer = Helper::getCustomer();

            if (is_null($customer))
            {
                ?>
      <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo route::getBP();?>/customer/register/"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="<?php echo route::getBP();?>/customer/login/"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>    
        
        </ul> 
     <?php  } else {  ?>
    <ul class="nav navbar-nav navbar-right">         
        <li><a href="<?php echo route::getBP();?>/customer/register/"><span class="glyphicon glyphicon-user"></span> <?php echo $customer["first_name"];echo " "; echo $customer["last_name"];?></a></li>
        <li><a href="<?php echo route::getBP();?>/customer/logout/"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
    </ul> 
     <?php } ?>
  </div>
</nav>