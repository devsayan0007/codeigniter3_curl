<?php 
    // print_r($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
    <header>
        <ul id="dropdown1" class="dropdown-content">
            <li class="divider"></li>
            <li><a href="<?php echo base_url().'logout'?>">Log out</a></li>
        </ul>
        <nav class=" yellow darken-4">
            <div class="nav-wrapper container">
                <a href="#!" class="brand-logo">Display</a>
                <ul class="right hide-on-med-and-down">
             
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">UserName<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <h4 class="center">Edit Profile</h4>
            <?php 
                if (!empty($this->session->flashdata('msgLogin'))) {
                    echo "<div class='row'><div class='col s12 m4 offset-m4'><div class='card-panel green'><p class='center white-text'>".$this->session->flashdata('msgLogin')."</p></div></div></div>";
                }
            ?>
            <form action="<?php echo base_url().'edit_profile/authenticate';?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col s2 offset-s5">
                        <?php 
                            if (empty($user['profile_img'])) { 
                        ?>
                                <img src="<?php base_url()?>assets/profile-img/user-profile-pic.jpg" alt="" class="circle responsive-img" style="height: 240px; width:250px;">
                                <p>Add a Profile Image</p>
                        <?php     
                            }else {
                        ?>      
                                <img src="<?php echo $user['profile_img'];?>" alt="" class="circle responsive-img" style="height: 240px; width:250px;">
                                <p>Change Profile Image</p>
                        <?php 
                            }
                        ?>
                            <input type="file" name="profile_img" id="profile_img">
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4 offset-m4">
                        <div class="card">
                            <div class="input-field col s12">
                                <p>Profile created at: <?php echo ' '.$user['created_at'];?></p>
                            </div>
                            <div class="input-field col s6">
                                <input id="username" name="username" value="<?php echo $user['username'];?>" type="text" class="validate">
                                <label for="username">User Name</label>
                                <?php echo form_error('username','<p class="red-text">', '</p>');?>
                            </div>
                            <div class="input-field col s6">
                                <input id="mob" name="mob" value="<?php echo $user['mob'];?>" type="text" class="validate">
                                <label for="mob">Mobile Number</label>
                                <?php echo form_error('mob','<p class="red-text">', '</p>');?>
                            </div>
                            <div class="input-field col s6">
                                <input id="firstname" name="firstname" value="<?php echo $user['firstname'];?>" type="text" class="validate">
                                <label for="firstname">First Name</label>
                                <?php echo form_error('firstname','<p class="red-text">', '</p>');?>
                            </div>
                            <div class="input-field col s6">
                                <input id="lastname" name="lastname" value="<?php echo $user['lastname'];?>" type="text" class="validate">
                                <label for="lastname">Last Name</label>
                                <?php echo form_error('lastname','<p class="red-text">', '</p>');?>
                            </div>
                            <div class="input-field col s6">
                                <button type="submit" class="btn">Update profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <footer>
    
    </footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--JavaScript at end of body for optimized loading-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    $(document).ready(function() {
        $(".dropdown-trigger").dropdown();
    });
</script>
</html>