<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
    <header>
        <nav class="yellow darken-4">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo center">Display</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="<?php base_url()?>login">Login</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
    <div class="container">
    <?php 
        if (!empty($this->session->flashdata('msg'))) {
            echo "<div class='row'><div class='col s12 m4 offset-m4'><div class='card-panel red accent-2 white-text'><p class='center'>".$this->session->flashdata('msg')."</p></div></div></div>";
        }
    ?>
        <div class="row">
            <form class="col s12 m6 offset-m3" action="<?php echo base_url().'signup/authenticate';?>" method="POST">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="userName" name="userName" type="text" class="validate" value="<?php echo set_value('userName');?>">
                        <label for="userName">User name*</label>
                        <?php echo form_error('userName','<p class="red-text">', '</p>');?>
                    </div>
                    <div class="input-field col s6">
                        <input id="mob" name="mob" type="text" class="validate" value="<?php echo set_value('mob');?>">
                        <label for="mob">Mobile Number*</label>
                        <?php echo form_error('mob','<p class="red-text">', '</p>');?>
                    </div>
                    <div class="input-field col s6">
                        <input id="pws" name="pws" type="password" class="validate">
                        <label for="pws">Password*</label>
                        <?php echo form_error('pws','<p class="red-text">', '</p>');?>
                    </div>
                    <div class="input-field col s6">
                        <input id="cpws" name="cpws" type="password" class="validate">
                        <label for="cpws">Confirm Password*</label>
                        <?php echo form_error('cpws','<p class="red-text">', '</p>');?>
                    </div>
                    <div class="input-field col s6">
                        <input id="firstName" name="firstName" type="text" class="validate" value="<?php echo set_value('firstName');?>">
                        <label for="firstName">First Name*</label>
                        <?php echo form_error('firstName','<p class="red-text">', '</p>');?>
                    </div>
                    <div class="input-field col s6">
                        <input id="lastName" name="lastName" type="text" class="validate" value="<?php echo set_value('lastName');?>">
                        <label for="lastName">Last Name*</label>
                        <?php echo form_error('lastName','<p class="red-text">', '</p>');?>
                    </div>
                    <div class="col s12">
                       <button class="btn">Sign up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </main>
    <footer>
    
    </footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--JavaScript at end of body for optimized loading-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>