<?php
if (isset($this->registry['product'])) {
    $data = $this->registry['product'];
}
?>
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">Додати новий товар</div>
            <div class="panel-body">   
                <div id="form-container">
                    <form method="post" id="signup-form" autocomplete="off">

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" value="<?php
                                   if (isset($data)) {
                                       echo $data['name'];
                                   }
                                   ?>" placeholder="Назва товару" required />
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="price" id="name" value="<?php
                                   if (isset($data)) {
                                       echo $data['price'];
                                   }
                                   ?>" placeholder="Ціна" required />
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="sku" id="mobile" value="<?php
                            if (isset($data)) {
                                echo $data['sku'];
                            }
                            ?>" placeholder="Код" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="qty" id="mobile" value="<?php
                            if (isset($data)) {
                                echo $data['qty'];
                            }
                            ?>" placeholder="Кількість" required />
                        </div>

                        <hr />

                        <div class="form-group">
                            <input type=submit name="submit" value="Додати" class="btn btn-info">
                            
                        </div>

                    </form>   
                </div>  
            </div>
        </div>
    </div>
</div>
