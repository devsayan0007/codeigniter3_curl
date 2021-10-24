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
            <!-- <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li> -->
            <li class="divider"></li>
            <li><a href="<?php echo base_url().'logout'?>">Log out</a></li>
        </ul>
        <nav class=" yellow darken-4">
            <div class="nav-wrapper container">
                <a href="#!" class="brand-logo">Display</a>
                <ul class="right hide-on-med-and-down">
                <!-- <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li> -->
                <!-- Dropdown Trigger -->
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">UserName<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <h4 class="center">Profile Page</h4>
            <?php 
                if (!empty($this->session->flashdata('msgLogin'))) {
                    echo "<div class='row'><div class='col s12 m4 offset-m4'><div class='card-panel green'><p class='center white-text'>".$this->session->flashdata('msgLogin')."</p></div></div></div>";
                }
            ?>
            <div class="row">
                <div class="col s2 offset-s5">
                    <?php 
                        if (empty($user['profile_img'])) { 
                    ?>
                            <img src="<?php base_url()?>assets/profile-img/user-profile-pic.jpg" alt="" class="circle responsive-img" style="height: 240px; width:250px;">
                    <?php     
                        }else {
                    ?>      
                            <img src="<?php echo $user['profile_img'];?>" alt="" class="circle responsive-img" style="height: 240px; width:250px;">
                    <?php 
                        }
                    ?>
                    
                </div>
            </div>
            <div class="row">
                <div class="col s12 m4 offset-m4">
                    <div class="card">
                        <!-- <div class="card-image">
                        <img src="<?php base_url()?>assets/profile-img/user-profile-pic.jpg" alt="" class="circle responsive-img" style="height: 100px; width:100px;">
                        </div> -->
                        <div class="card-content center">
                            <p><b>Joining at :</b><?php echo ' '.$user['created_at'];?></p>
                            <p><b>Name:</b> <?php echo ' '.$user['firstname'].' '.$user['lastname'];?></p>
                            <p><b>Mobile No:</b><?php echo ' '.$user['mob'];?></p>

                        </div>
                        <div class="card-action center-align">
                            <a href="<?php echo base_url().'edit_profile'?>" class="blue-text">Edit profile</a>
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
<script>
    $(document).ready(function() {
        $(".dropdown-trigger").dropdown();
    });
</script>
</html>