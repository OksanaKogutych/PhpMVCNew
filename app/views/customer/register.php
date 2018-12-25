<?php if (isset($this->registry['userdata'])) {
    $data = $this->registry['userdata'];
} ?>
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Зареєструватися</div>
            <div class="panel-body">   
                <div id="form-container">
                    <form method="post" id="signup-form" autocomplete="off">

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" value="<?php if (isset($data)) {
    echo $data['last_name'];
} ?>" placeholder="Прізвище" required />
                        </div>
<div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" value="<?php if (isset($data)) {
    echo $data['first_name'];
} ?>" placeholder="Ім'я" required />
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" name="name" id="name" value="<?php if (isset($data)) {
    echo $data['telephone'];
} ?>" placeholder="Номер телефона" required />
                        </div>

                         <div class="form-group">
                             <input type="email" class="form-control" name="name" id="name" value="<?php if (isset($data)) {
    echo $data['email'];
} ?>" placeholder="E-mail" required />
                        </div>
                       <div class="form-group">
                            <input type="password" class="form-control" name="name" id="name" value="<?php if (isset($data)) {
    echo $data['password'];
} ?>" placeholder="Password" required />
                        </div>
                            <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" value="<?php if (isset($data)) {
    echo $data['city'];
} ?>" placeholder="Місто" required />
                        </div>
                        <hr />

                        <div class="form-group">
                            <button class="btn btn-primary">Додати</button>
                        </div>

                    </form>   
                </div>  
            </div>
        </div>
    </div>
</div>