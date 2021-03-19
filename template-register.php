<?php
/*
Template Name: Register
*/
?>

<?php get_header();?>

<section id="register">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div>
                <h3>Register</h3>
                <form action="">
                    <input type="text" name="fname" placeholder="First Name" class="fname">
                    <input type="text" name="lname" placeholder="Last Name">
                    <br>
                    <input type="text" name="date" placeholder="Telephone">
                    <input type="text" name="phone" placeholder="Email">
                    <br>
                    <input type="text" name="date" placeholder="Address">
                    <input type="text" name="date" placeholder="Email">
                    <br>
                    <hr>
                    <input type="text" name="pw" placeholder="Password">
                    <input type="text" name="cpw" placeholder="Confirm Password">
                    <br>

                    <button type="submit" class="blue">Register</button>
                </form>
                <p class="form-note">Already have an account? <a href="/log-in/">Log in</a> here.</p>
            </div>
        </div>
    </div>
</section>




<?php get_footer();?>
