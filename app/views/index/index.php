  <?php
    $customer = Helper::getCustomer();

    if (is_null($customer))
    {
        ?>
        <h3>Hello, unauthorized user!</h3>
        <?php
    } else {
        ?>
        <h3>Hello, <?php echo $customer["first_name"];echo " "; echo $customer["last_name"];?></h3>
    <?php }?>
</ul>
