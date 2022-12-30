<?php

function repeater_faq_field_callback()
{
    if (isset($_POST['rf-switch'])) {
        if ($_POST['rf-switch'] == 'Activate') {
            update_option('rf-faq', true);
        } elseif ($_POST['rf-switch'] == 'Deactivate') {
            delete_option('rf-faq');
        }
    }
    $status = get_option('rf-faq', false);
?>
    <style>
        .rf-admin-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 85vh;
            position: relative;
        }

        .rf-admin-card {
            width: 25rem;
            background-color: rgba(255, 255, 255, .7);
            text-align: center;
            padding: 3rem 1rem;
            border-radius: 1rem;
            box-shadow: rgba(0, 0, 0, 0.4) 5px 5px, rgba(0, 0, 0, 0.35) 10px 10px, rgba(0, 0, 0, 0.25) 15px 15px, rgba(0, 0, 0, 0.15) 20px 20px, rgba(0, 0, 0, 0.05) 25px 25px, rgba(0, 0, 0, 0.02) 30px 30px;
        }

        .rf-read-use-button-div {
            padding-bottom: 2rem;
        }

        .rf-read-use-button-div input,
        .rf-switch-button-div input {
            border: none;
            border-radius: .5rem;
            color: #fff;
            font-weight: 700;
            transition: all 300ms ease-out;
        }

        .rf-read-use-button-div input:hover,
        .rf-switch-button-div input:hover {
            transform: scale(1.07);
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px, rgba(0, 0, 0, 0.3) 0px 4px, rgba(0, 0, 0, 0.2) 0px 6px, rgba(0, 0, 0, 0.1) 0px 8px, rgba(0, 0, 0, 0.05) 0px 10px;
        }

        .rf-read-use-button-div input {
            padding: .5rem 2rem;
            background-color: rgb(26, 163, 255);
        }

        .rf-read-use-button-div input:hover {
            background-color: rgb(26, 117, 255);
        }

        .rf-switch-button-div input {
            padding: .5rem 5rem;
        }

        .rf-use-read-more {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            color: #2C5363;
            background-color: rgba(0, 0, 0, 0.7);
            display: none;
            z-index: 9999;
        }

        .rf-use-read-more-block {
            display: flex;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

        .rf-read-uses {
            border-radius: 1rem;
            padding: 2rem;
            background-color: rgba(255, 255, 255, 2);
            height: 28rem;
            overflow-y: auto;
            overflow-x: hidden;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .rf-read-uses::-webkit-scrollbar {
            width: .7rem;
        }

        .rf-read-uses::-webkit-scrollbar-track {
            background: lightgray;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }

        .rf-read-uses::-webkit-scrollbar-thumb {
            background-color: rgb(0, 0, 0);
            border-radius: 20px;
        }

        .rf-use-read-close {
            position: absolute;
            top: -.5rem;
            right: -.5rem;
            background-color: rgb(230, 0, 0);
            border: none;
            border-radius: 100%;
            width: 2rem;
            height: 2rem;
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            transition: all 300ms ease-out;
            z-index: 999;
        }

        .rf-use-read-close:hover {
            transform: scale(1.2);
            background-color: rgb(255, 26, 26);
            box-shadow: rgba(255, 26, 26, 0.4) -2px 2px, rgba(255, 26, 26, 0.3) -5px 5px, rgba(255, 26, 26, 0.2) -7px 7px, rgba(255, 26, 26, 0.1) -10px 10px, rgba(255, 26, 26, 0.05) -12px 12px;
        }

        .rf-faq-deactive {
            background-color: rgb(230, 0, 0);
        }

        .rf-faq-deactive:hover {
            background-color: rgb(255, 26, 26);
        }

        .rf-faq-active {
            background-color: rgb(0, 179, 60);
        }

        .rf-faq-active:hover {
            background-color: rgb(0, 230, 77);
        }

        .rf-function-best-practice p {
            margin: 0rem 3rem;
            background-color: rgb(0, 0, 0);
            color: #fff;
            font-weight: 700;
            padding: 1rem 2rem;
            border-radius: 1rem;
        }
    </style>
    <div class="rf-admin-page">
        <div class="rf-admin-card">
            <form action="" method="post">
                <h2 style="margin-top: 0rem">Welcom to Repeater FAQ field</h2>
                <p>Repeater FAQ field allow you to add ass much faq as you like in wordpress post and return faq and faq Schema</p>
                <p>To know function use click below</p>
                <div class="rf-read-use-button-div">
                    <input id="rf-use-button" type="button" value="Read uses">
                </div>
                <div class="rf-switch-button-div">
                    <input type="submit" class="<?php if ($status) {
                                                    echo 'rf-faq-deactive';
                                                } else {
                                                    echo 'rf-faq-active';
                                                } ?>" name="rf-switch" value="<?php if ($status) {
                                                                                    echo 'Deactivate';
                                                                                } else {
                                                                                    echo 'Activate';
                                                                                } ?>">
                </div>
            </form>
        </div>
        <div class="rf-use-read-more">
            <div class="rf-use-read-more-block">
                <div style="position:relative">
                    <div class="rf-read-uses">
                        <input id="rf-use-read-close-button" type="button" class="rf-use-read-close" value="X">
                        <center>
                            <h1>Repeater FAQ field</h1>
                            <p>To use Repeater FAQ field to your theme:</p>
                            <h2>rf_faqs( <i>int</i> $post_id);</h2>
                            <h4>Description</h4>
                            <p>Returns faqs of the post as array of arrays</p>
                            <ol>Returns
                                <li><strong>Array([0] => Array(["question"] => question ["answer"] => answer)</strong></li>
                                <li>If no value entered return <strong>empty string</strong></li>
                                <li>If plugin is deactive from repeater faq admin it returns <strong>bool(False)</strong></li>
                            </ol>
                            <div class="rf-function-best-practice">
                                <h5>Best practice</h5>
                                <p style="text-align:left">
                                    if(function_exists('rf_faqs')){ <br>
                                    &nbsp;&nbsp;$faqa = rf_faqs($post->ID); <br>
                                    &nbsp;&nbsp;foreach($faqs as $faq){ <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;echo $faq['question']; <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;echo $faq['answer']; <br>
                                    &nbsp;&nbsp;} <br>
                                    } <br>
                                </p>
                            </div>
                            <h4>Faqs schema</h4>
                            <h2>rf_faqs_schema( <i>int</i> $post_id);</h2>
                            <h4>Description</h4>
                            <p>Returns faqs_schema of the post with javascript tag</p>
                            <ol>Returns
                                <li style="text-align:left;">Return schema with javascript tag <strong><br>&lt;script&gt; <br>
                                {
                                <br>&nbsp;&nbsp;"@context": "https://schema.org", <br>
                                &nbsp;&nbsp;"@type": "FAQPage", <br>
                                &nbsp;&nbsp;"mainEntity": [{ <br>
                                &nbsp;&nbsp;"@type": "Question", <br>
                                &nbsp;&nbsp;"name": "Your-question?", <br>
                                &nbsp;&nbsp;"acceptedAnswer": { <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;"@type": "Answer", <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;"text": "Your-answer." <br>
                                &nbsp;&nbsp;} <br>
                                &nbsp;&nbsp;}] <br>
                                } <br>
                                &lt;/script&gt;</strong>
                            </li>
                                <li>If no value entered return <strong>empty string</strong></li>
                                <li>If plugin is deactive from repeater faq admin it returns <strong>bool(False)</strong></li>
                            </ol>
                            <div class="rf-function-best-practice">
                                <h5>Best practice</h5>
                                <p style="text-align:left">
                                    if(function_exists('rf_faqs_schema')){ <br>
                                    &nbsp;&nbsp;$faqa_schema = rf_faqs_schema($post->ID); <br>
                                    &nbsp;&nbsp;echo $faqa_schema; <br>
                                    } <br>
                                </p>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo plugin_dir_url(__DIR__) ?>repeater-faq-field/jquery.js"></script>
    <script>
        $(document).on('click', '#rf-use-button', function() {
            $('.rf-use-read-more').fadeIn();
        });

        $(document).on('click', '#rf-use-read-close-button', function() {
            $('.rf-use-read-more').fadeOut();
        });
    </script>
<?php
}

?>