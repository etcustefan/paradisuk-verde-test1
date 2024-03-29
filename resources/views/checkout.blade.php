<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background: linear-gradient(180.3deg, rgb(214, 224, 255) 37.2%, rgb(254, 168, 168) 137.3%);
        }
        .button:hover {
            background-color: #fff;
            color: #1ABFAF;
        }
        .button:focus {
            outline: none;
        }
        .button, .button:link, .button:visited {
            color: #fff;
            height: 48px;
            display: flex;
            align-items: center;
            padding: 0 18px;
            min-width: 80px;
            background-color: #FA691C;
            outline: none;
            border-radius: 6px;
            width: min-content;
            white-space: nowrap;
            text-decoration: none;
            border: 2px solid #FA691C;
            transition: background-color 0.2s ease-out, color 0.2s ease-out;
            cursor: pointer;
        }
        @media only screen and (min-width: 992px) {
            .button:hover {
                background-color: #fff;
                color: #FA691C;
            }
        }
        .button:focus {
            outline: none;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 " style="margin-top:189px; ">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table">
                    <h3 class="panel-title">Payment Details</h3>
                </div>
                <div class="panel-body" >

                    @if (Session::has('message'))
                        <div class="alert text-center error alert-danger" id="error" >
                            <a class="close" data-dismiss="alert" aria-label="close"><button onclick="hideError()">×</button></a>
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif

                    <form role="form" action="<?php  echo route('pay') ?>" method="post" class="require-validation"
                          data-cc-on-file="false"
                          id="payment-form"
                          data-stripe-publishable-key="<?php echo env('STRIPE_KEY') ?>">
                        @csrf

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Email</label>
                                <input class='form-control' autocomplete="off" size='4' type='text' name="email" autofocus="true">
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='false'
                                                                                class='form-control card-cvc'
                                                                                placeholder='ex. 311' maxlength="4"
                                                                                type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' maxlength='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' maxlength='4'
                                    type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>
                                    Please correct the errors and try again.
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex">
                            <div class="col-xs-12">
                                <input type="hidden" name="price" value="<?= $price ?>">
                                <button class="button" type="submit">
                                    Plateste <?php echo $price ?> Ron
                                </button>

                            </div>
                        </div>
                        <input type="hidden" value="<?= $name ?>" name="name">
                        <input type="hidden" value="<?= $phone_number ?>" name="phone_number">
                        <input type="hidden" value="<?= $from_date ?>" name="from_date">
                        <input type="hidden" value="<?= $stand ?>" name="stand">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</body>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">

    function hideError (){
        let errorCardMessage = document.getElementById('error');
        errorCardMessage.style.display = 'none';
    }
    $(function () {

        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function (e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function (i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>
</html>
