<!DOCTYPE html>
<html lang="en">

<?php
require_once('Header.php');
?>

<body>
    <div id="divAllContent" class="page">
        <div class="container">
            <div class="row register-form mx-0 px-0 col-md-12">
                <form id="contact-form" method="POST" action="Contact-Form" role="form">

                    <div class="messages"></div>

                    <div class="controls">
                        <div class="centering col-md-6">
                            <!--Section: Contact v.2-->
                            <section class="mb-4">

                                <!--Section heading-->
                                <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
                                <!--Section description-->
                                <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                                    a matter of hours to help you.</p>

                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-9 mb-md-0 mb-5">
                                        <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                                            <!--Grid row-->
                                            <div class="row">

                                                <!--Grid column-->
                                                <div class="col-md-6">
                                                    <div class="md-form mb-0">
                                                        <div class="form-group">
                                                            <input id="form_name" type="text" id="name" name="name" class="form-control" placeholder="Name" required="required" data-error="Name is required.">
                                                            <label for="form_name">Name *</label>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Grid column-->

                                                <!--Grid column-->
                                                <div class="col-md-6">
                                                    <div class="md-form mb-0">
                                                        <div class="form-group">
                                                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Email " required="required" data-error="Valid email is required.">
                                                            <label for="form_email">Email *</label>
                                                            <div class="help-block with-errors"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--Grid column-->

                                            </div>
                                            <!--Grid row-->

                                            <!--Grid row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="md-form mb-0">
                                                        <input type="text" id="subject" name="subject" class="form-control">
                                                        <label for="subject" class="">Subject</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="md-form mb-0">
                                                            <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Phone">
                                                            <label for="form_phone">Phone</label>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--Grid row-->
                                            </div>
                                            <!--Grid row-->
                                            <div class="row">

                                                <!--Grid column-->
                                                <div class="col-md-12">

                                                    <div class="md-form">
                                                        <div class="form-group">

                                                            <textarea id="form_message" name="message" class="form-control md-textarea" placeholder="Text" rows="2" required="required" data-error="Please, leave us a message."></textarea>
                                                            <label for="form_message">Message *</label>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--Grid row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="text-muted"><strong>*</strong> These fields are required.</p>
                                                </div>
                                            </div>
                                        </form>


                                        <div class="status"></div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-3 text-center">
                                        <ul class="list-unstyled mb-0">

                                            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                                <p>San Francisco, CA 94126, USA</p>
                                            </li>

                                            <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                                <p>+ 01 234 567 89</p>
                                            </li>

                                            <li>
                                                <i class="fas fa-envelope mt-4 fa-2x"></i>
                                                <p>contact@mdbootstrap.com</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--Grid column-->
                                </div>
                                <div class="row">


                                    <div class="col-md-12">
                                        <!--<input type="submit" class="button button-gray-light-outline big-button centered bg-green border-green border-green  margin-auto" value="Send message">-->
                                        <input type="submit" class="btn btn-primary btn-send  margin-auto" value="Send message">
                                    </div>
                                </div>
                            </section>
                            <!--Section: Contact v.2-->


                            <?php require_once('footer.php'); ?>

                </form>
            </div>
        </div>
    </div>
    <script>
        $(function() {

            // init the validator
            // validator files are included in the download package
            // otherwise download from http://1000hz.github.io/bootstrap-validator

            $('#contact-form').validator();


            // when the form is submitted
            $('#contact-form').on('submit', function(e) {

                // if the validator does not prevent form submit
                if (!e.isDefaultPrevented()) {
                    var url = "contact-form.php";

                    // POST values in the background the the script URL
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $(this).serialize(),
                        success: function(data) {
                            // data = JSON object that contact.php returns

                            // we recieve the type of the message: success x danger and apply it to the 
                            var messageAlert = 'alert-' + data.type;
                            var messageText = data.message;

                            // let's compose Bootstrap alert box HTML
                            var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';

                            // If we have messageAlert and messageText
                            if (messageAlert && messageText) {
                                // inject the alert to .messages div in our form
                                $('#contact-form').find('.messages').html(alertBox);
                                // empty the form
                                $('#contact-form')[0].reset();
                            }
                        }
                    });
                    return false;
                }
            })
        });
    </script>

</body>

</html>