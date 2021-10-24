<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    <li><a href="<?php base_url()?>signup">Sign up</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col s12 m4 offset-m4">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title center-align">Login</span>
                            <?php 
                                if (!empty($this->session->flashdata('msg'))) {
                                    echo "<div class='row'><div class='col s12'><div class='card-panel red accent-2 white-text'><p class='center'>".$this->session->flashdata('msg')."</p></div></div></div>";
                                }
                            ?>
                            <form action="<?php echo base_url().'login/authenticate';?>" method="POST">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="userName" name="userName" type="text" class="validate" value="<?php echo set_value('userName');?>">
                                        <label for="userName">User name*</label>
                                        <?php echo form_error('userName','<p class="red-text">', '</p>');?>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="pws" name="pws" type="password" class="validate">
                                        <label for="pws">Password*</label>
                                        <?php echo form_error('pws','<p class="red-text">', '</p>');?>
                                    </div>
                                    <div class="col s12">
                                    <button class="btn">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                           
                </div>
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