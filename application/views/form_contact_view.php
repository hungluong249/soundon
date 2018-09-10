<section id="form-contact">
    <div class="cover">
        <div class="mask">
            <img src="https://images.unsplash.com/photo-1512486130939-2c4f79935e4f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=dfd2ec5a01006fd8c4d7592a381d3776&auto=format&fit=crop&w=1000&q=80" alt="image contact form cover">

            <div class="overlay"></div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="subtitle-md">Contact Us</h3>

                <h2 class="title-md">Feeling free to say "Hello" to us</h2>

                <p class="paragraph">
                    We will not market to you unless you request this service. At Bose, we take privacy preferences seriously. Please visit our Privacy policy for more information.
                </p>

                <?php
                echo form_open_multipart('homepage/get_data_to_send_mail', array('class' => 'form-horizontal'));
                ?>

                <div class="form-group col-xs-12">
                    <?php
                    echo form_error('contact_name');
                    echo form_input('contact_name', set_value('contact_name'), 'class="form-control" id="contact_name" placeholder="Your Name"');
                    ?>
                </div>

                <div class="form-group col-xs-12">
                    <?php
                    echo form_error('contact_mail');
                    echo form_input('contact_mail', set_value('contact_mail'), 'class="form-control" id="contact_mail" placeholder="Your E-mail"');
                    ?>
                </div>

                <div class="form-group col-xs-12">
                    <?php
                    echo form_error('contact_phone');
                    echo form_input('contact_phone', set_value('contact_phone'), 'class="form-control" id="contact_phone" placeholder="Your Phone Number"');
                    ?>
                </div>

                <div class="form-group col-xs-12">
                    <?php
                    echo form_error('contact_address');
                    echo form_input('contact_address', set_value('contact_address'), 'class="form-control" id="contact_address" placeholder="Your Address"');
                    ?>
                </div>

                <div class="form-group col-xs-12">
                    <?php
                    echo form_error('contact_job');
                    echo form_input('contact_job', set_value('contact_job'), 'class="form-control" id="contact_job" placeholder="Your Job (optional)"');
                    ?>
                </div>

                <div class="form-group col-xs-12">
                    <?php
                        $option = array(
                            '0' => 'Select One Reason',
                            '1' => 'Speakers',
                            '2' => 'Headphones',
                            '3' => 'Accessories',
                            '4' => 'Need Helps',
                            '5' => 'Advise Corner'
                        )
                    ?>
                    <?php
                    echo form_error('contact_reason');
                    echo form_dropdown('contact_reason', $option, '0', 'class="form-control" id="contact_job"')
                    ?>
                </div>

                <div class="form-group col-xs-12">
                    <?php
                    echo form_error('contact_message');
                    echo form_textarea('contact_message', set_value('contact_message'), 'class="form-control" id="contact_message" placeholder="Message..."');
                    ?>
                </div>

                <div class="col-xs-12">
                    <?php echo form_submit('submit', 'SUBMIT', 'class="btn btn-primary"'); ?>
                </div>
                <?php echo form_close(); ?>

                <p class="paragraph">
                    To acknowledge the receipt of your message, we will send an email confirmation to the address you provided. Please note: All email from Soundon Customer Service will originate from support@soundon.store. Some spam filters may prevent our replies from reaching you. If you do not receive your email confirmation within a few hours, please add support@soundon.store to the safe list for your spam filter.
                </p>
            </div>
        </div>
    </div>
</section>