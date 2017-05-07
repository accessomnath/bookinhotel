<?php
/**
 * Created by PhpStorm.
 * User: kumarvikram
 * Date: १२/०४/२०१७
 * Time: ०२:०२
 * Template name: Staff Registration
 */
get_header('inner'); ?>
<!-- signup form area starts  -->

<section id="signup-form-area">
    <div class="container">

        <div class="stepwizard col-md-offset-3">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle"><i class="fa fa-heart-o"
                                                                                          aria-hidden="true"></i></a>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><i
                            class="fa fa-user-o" aria-hidden="true"></i></a>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"><i
                            class="fa fa-envelope-o" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>

        <form action="#" id="reg_form">
            <div class="row setup-content" id="step-1">
                <section>
                    <div class="col-md-6 col-md-offset-3">
                        <div class="col-md-12">
                            <div class="form-heading text-center">
                                <h3>Welcome to Hari Care</h3>
                                <p>Who needs care?</p>
                            </div>

                            <div class="form-btn">
                                <ul>
                                    <li><a href="#me" class="me">me</a></li>
                                    <li><a href="#loved" class="loved">a loved one</a></li>
                                </ul>
                            </div>

                            <div class="form-content-1" id="me">
                                <section>
                                    <div class="form-group">
                                        <label class="control-label">First Name</label>
                                        <input maxlength="100" id="f_name" type="text" required="required"
                                               class="form-control"
                                               placeholder="Enter First Name"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Last Name</label>
                                        <input maxlength="100" id="l_name" type="text" required="required"
                                               class="form-control"
                                               placeholder="Enter Last Name"/>
                                    </div>
                                    <button class="btn btn-primary nextBtn btn-lg pull-left" id="btn1nxt" type="button">
                                        Next
                                    </button>

                            </div>

                            <div class="form-content-2" id="loved">
                                <div class="form-group">
                                    <label class="control-label">Their First Name</label>
                                    <input maxlength="100" type="text" id="f_Name" required="required"
                                           class="form-control"
                                           placeholder="Enter First Name"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Their Last Name</label>
                                    <input maxlength="100" type="text" id="l_Name" required="required"
                                           class="form-control"
                                           placeholder="Enter Last Name"/>
                                </div>
                                <button id="btn2nxt" class="btn btn-primary nextBtn btn-lg pull-left" type="button">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


            <div class="row setup-content" id="step-2">
                <section>
                    <div class="col-md-6 col-md-offset-3">
                        <div class="col-md-12">
                            <div class="form-heading text-center">
                                <h3>Create your account</h3>
                                <p>To complete sign up, please enter your contact info and create a password.</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">E-mail</label>
                                <input maxlength="200" type="email" id="email" required="required" class="form-control"
                                       placeholder="demo@example.com"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Phone Number</label>
                                <input maxlength="200" type="text" required="required" id="phonee" class="form-control"
                                       placeholder="000-000-00000"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input maxlength="200" type="password" id="password" required="required"
                                       class="form-control"
                                       placeholder="**********"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">How did you hear about us?</label>
                                <select name="" id="choose">
                                    <option value="">Choose from this list…</option>
                                    <option value="Friends and Family">Friends and Family</option>
                                    <option value="News Article">News Article</option>
                                    <option value="Facebook">Facebook</option>
                                </select>
                            </div>
                            <p>By creating an account, I accept Hari Care's <a href="#">Terms and Conditions</a> and <a
                                    href="#">Privacy Policy.</a>
                                Create account
                            </p>
                            <input class="btn btn-primary btn-lg pull-right" id="crt_btnn" type="button"
                                   value="Create a account"/>

                        </div>
                    </div>
                </section>


            </div>
        </form>

    </div>
</section>


<!--                <div class="row setup-content" id="step-3">-->
<!---->
<!--                    <div class="col-md-6 col-md-offset-3">-->
<!--                        <div class="col-md-12">-->
<!--                            <div class="form-heading">-->
<!--                                <h3 class="text-center">Create your account</h3>-->
<!--                                <p class="text-center">To complete sign up, please enter your contact info and create a-->
<!--                                    password.</p>-->
<!--                            </div>-->
<!--                            <div class="col-md-6 pl0">-->
<!--                                <div class="form-group">-->
<!--                                    <label class="control-label">Your First Name</label>-->
<!--                                    <input maxlength="100" type="text" required="required" class="form-control"-->
<!--                                           placeholder="Name here"/>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-6 p0">-->
<!--                                <div class="form-group">-->
<!--                                    <label class="control-label">Your Last Name</label>-->
<!--                                    <input maxlength="100" type="text" required="required" class="form-control"-->
<!--                                           placeholder="Name here"/>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label class="control-label">E-mail</label>-->
<!--                                <input maxlength="200" type="email" required="required" class="form-control"-->
<!--                                       placeholder="demo@example.com"/>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label class="control-label">Phone Number</label>-->
<!--                                <input maxlength="200" type="text" required="required" class="form-control"-->
<!--                                       placeholder="000-000-00000"/>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label class="control-label">Password</label>-->
<!--                                <input maxlength="200" type="password" required="required" class="form-control"-->
<!--                                       placeholder="**********"/>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label class="control-label">How did you hear about us?</label>-->
<!--                                <select name="" id="">-->
<!--                                    <option value="">Choose from this list…</option>-->
<!--                                    <option value="">Friends and Family</option>-->
<!--                                    <option value="">News Article</option>-->
<!--                                    <option value="">Facebook</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                            <p>By creating an account, I accept Hari Care's <a href="#">Terms and Conditions</a> and <a-->
<!--                                    href="#">Privacy Policy.</a>-->
<!--                                Create account-->
<!--                            </p>-->
<!--                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Create a account-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </div>-->


<!-- signup form area ends  -->

<?php get_footer(); ?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>

<script type="text/javascript">

    $('#crt_btnn').click(function () {

        var me_fname = $('#f_name').val();
        alert(me_fname);
        var me_lname = $('#l_name').val();
        alert(me_lname);
        var email1 = $('#email').val();
        var phonee = $('#phonee').val();
        var password = $('#password').val();
        var choose = $('#choose').val();

        if (me_fname == "" || me_lname == "" || email1 == "" || phonee == "" || zip == "" || password == "" || choose == "") {
            alert("All Fields are required !!");
            return false;
        }
        var data = {
            'action': 'create_user',
            'name_first': me_fname,
            'name_last': me_lname,
            'emaill': email1,
            'phoneee': phonee,
            'passwordd': password,
            'choosee': choose
        };

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: data,
            success: function (response) {
                alert(response);
                $("#reg_form")[0].reset();
                window.location.href = "<?php echo home_url(); ?>";
            },
            error: function (response) {
                alert(response);
                $("#reg_form")[0].reset();
            }
        });
    });
    })
</script>

