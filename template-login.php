<?php
/*
Template Name: Log In
*/
?>

<?php get_header('secondary');?>

<section id="login">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div>
                <h3>Member Log In</h3>
                <form action="">
                    <input type="text" name="email" placeholder="Email">
                    <br>
                    <input type="text" name="password" placeholder="Password">
                    <br>
                    <button type="submit" class="blue">Login</button>
                </form>
                <p class="form-note">Don't know your log-in details?<br>Contact <a href="#">Support</a> to request access to site.</p>
            </div>
        </div>
    </div>
</section>




<?php get_footer();?>
