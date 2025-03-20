<?php
require_once 'config.php';

$page_title = "SMART-IoT - Contact Us";
$page_name = "contact";
$is_home = false;

// Initialize variables
$name = $email = $subject = $message = "";
$name_err = $email_err = $subject_err = $message_err = "";
$success_msg = "";

// Process form data when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = sanitizeInput($_POST["name"]);
    }
    
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = sanitizeInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please enter a valid email address.";
        }
    }
    
    // Validate subject
    if (empty(trim($_POST["subject"]))) {
        $subject_err = "Please enter a subject.";
    } else {
        $subject = sanitizeInput($_POST["subject"]);
    }
    
    // Validate message
    if (empty(trim($_POST["message"]))) {
        $message_err = "Please enter your message.";
    } else {
        $message = sanitizeInput($_POST["message"]);
    }
    
    // Check if no errors
    if (empty($name_err) && empty($email_err) && empty($subject_err) && empty($message_err)) {
        // In a real application, send email or store in database
        // For demonstration, we'll just show a success message
        $success_msg = "Thank you for contacting us. We'll get back to you soon!";
        
        // Clear form fields after successful submission
        $name = $email = $subject = $message = "";
    }
}

include 'includes/header.php';
?>

<!-- contact section -->
<section class="about_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Contact <span>Us</span>
            </h2>
            <p>
                Have questions or want to learn more about our IoT solutions? Get in touch with our team.
            </p>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="map_container">
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613507778!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sPT%20Tokopedia!5e0!3m2!1sen!2sid!4v1571122286230!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0; width: 100%; height: 100%" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="contact_info mt-4">
                    <div class="contact_link_box">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                123 IoT Street, Tech City
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                Call +01 1234567890
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                                contact@smartiot.com
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php if(!empty($success_msg)): ?>
                    <div class="alert alert-success"><?php echo $success_msg; ?></div>
                <?php endif; ?>
                
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" placeholder="Your Name" value="<?php echo $name; ?>">
                        <span class="invalid-feedback"><?php echo $name_err; ?></span>
                    </div>
                    
                    <div class="form-group mb-3">
                        <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" placeholder="Your Email" value="<?php echo $email; ?>">
                        <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>
                    
                    <div class="form-group mb-3">
                        <input type="text" name="subject" class="form-control <?php echo (!empty($subject_err)) ? 'is-invalid' : ''; ?>" placeholder="Subject" value="<?php echo $subject; ?>">
                        <span class="invalid-feedback"><?php echo $subject_err; ?></span>
                    </div>
                    
                    <div class="form-group mb-3">
                        <textarea name="message" class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>" rows="5" placeholder="Message"><?php echo $message; ?></textarea>
                        <span class="invalid-feedback"><?php echo $message_err; ?></span>
                    </div>
                    
                    <div class="btn-box">
                        <button type="submit" class="btn btn-primary">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end contact section -->

<?php include 'includes/footer.php'; ?>
