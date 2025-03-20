<?php
require_once 'config.php';

$page_title = "SMART-IoT - Login";
$page_name = "login";
$is_home = false;

// Initialize variables
$email = $password = "";
$email_err = $password_err = $login_err = "";

// Process form data when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = sanitizeInput($_POST["email"]);
    }
    
    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if (empty($email_err) && empty($password_err)) {
        // This would normally validate against a database
        // For demonstration, we'll use a simple check
        if ($email == "admin@smartiot.com" && $password == "password123") {
            // Password is correct, start a new session
            session_start();
            
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = 1;
            $_SESSION["email"] = $email;
            $_SESSION["name"] = "Administrator";
            
            // Redirect user to dashboard
            header("location: dashboard.php");
        } else {
            // Invalid credentials
            $login_err = "Invalid email or password.";
        }
    }
}

include 'includes/header.php';
?>

<!-- login section -->
<section class="about_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                User <span>Login</span>
            </h2>
            <p>
                Please enter your credentials to access your account
            </p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if(!empty($login_err)): ?>
                    <div class="alert alert-danger"><?php echo $login_err; ?></div>
                <?php endif; ?>
                
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div>
                            
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            
                            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
                            <p><a href="forgot-password.php">Forgot Password?</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end login section -->

<?php include 'includes/footer.php'; ?>
