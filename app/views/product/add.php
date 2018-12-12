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
                            <input type="text" class="form-control"<?php if (isset($this->errors['sku_error'])) { ?> style="color:red;"<?php } ?> name="sku" id="mobile" value="<?php
                            if (isset($data)) {
                                echo $data['sku'];
                            }
                            ?>" placeholder="Код" required />
                        </div>


                        <div class="form-group">
                            <input type="text" class="form-control"<?php if (isset($this->errors['name_error'])) { ?> style="color:red;"<?php } ?> name="name" id="name" value="<?php
                                   if (isset($data)) {
                                       echo $data['name'];
                                   }
                                   ?>" placeholder="Назва товару" required />
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control"<?php if (isset($this->errors['price_error'])) { ?> style="color:red;"<?php } ?>  name="price" id="name" value="<?php
                                   if (isset($data)) {
                                       echo $data['price'];
                                   }
                                   ?>" placeholder="Ціна" required />
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control"<?php if (isset($this->errors['qty_error'])) { ?> style="color:red;"<?php } ?> name="qty" id="mobile" value="<?php
                            if (isset($data)) {
                                echo $data['qty'];
                            }
                            ?>" placeholder="Кількість" required />
                        </div>

                        </div>
                        <div class="form-group">
                            <textarea type="text" rows="5" cols="15" class="form-control" <?php if (isset($this->errors['description_error'])) { ?> style="color:red;"<?php } ?>  id="mobile"name="description"><?php if (isset($data)) {
    echo $data['description'];
} ?></textarea>

                        <div class="form-group">
                            <input type=submit name="submit" value="Додати" class="btn btn-info">
                            
                        </div>

                    </form>   
                </div>  
            </div>
        </div>
    </div>
</div>
