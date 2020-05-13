<!DOCTYPE html>
<html lang="en">

<?php
require_once('HeaderSignin.php');
?>

<body>
    <div id="divAllContent" class=" register py-5">
        <div class="container">
            <form id="contact-form" method="POST" action="../Controller/contact-form" role="form">
                <div class="controls">
                    <div class="centering col-md-12">
                        <!--Section: Contact v.2-->
                        <section class="mb-4">

                            <!--Section heading-->
                            <h2 class="register-heading h1-responsive font-weight-bold text-center my-4">Contact Us</h2>
                            <!--Section description-->
                            <p class="text-center w-responsive mx-auto mb-5 text-white" style="font-family:Times New Roman, Times, serif; size:16px">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                                a matter of hours to help you.</p>
                            <div class="row" style="margin-left: 149px;">
                                <!--Grid column-->
                                <div class="col-md-10 mb-md-0 mb-5 py-2">
                                    <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                                        <!--Grid row-->
                                        <div class="row ">

                                            <!--Grid column-->
                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <div class="form-group">
                                                        <input id="form_name" type="text" id="name" name="name" class="form-control" placeholder="Name*" required="required" data-error="Name is required.">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Grid column-->

                                            <!--Grid column-->
                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <div class="form-group">
                                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Email* " required="required" data-error="Email is required.">
                                                        <div class="help-block with-errors"></div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--Grid column-->

                                        </div>
                                        <!--Grid row-->

                                        <!--Grid row-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="md-form mb-0">
                                                        <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Phone*" required="required" data-error="Phone number is required.">
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

                                                        <textarea id="form_message" name="message" class="form-control md-textarea" placeholder="Text message*" rows="2" required="required" data-error="Please, leave us a message."></textarea>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <p class="text-muted"><strong>*</strong> These fields are required.</p>
                                            </div>
                                        </div>
                                    </form>


                                    <div class="status"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-primary btn-send  margin-auto" value="Send message">
                                        </div>
                                    </div>
                                </div>

                                <!--Grid column-->


                            </div>
                        </section>
                    </div>
                </div>
                <div class="messages "></div>
            </form>
        </div>
        <?php require_once('footer.php'); ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
    <script>
        $(function() {

            // init the validator
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