<?php
function custom_faq_block_callback($post)
{
    $postID = $post->ID;
    wp_nonce_field('custom_faq_block_save', 'custom_faq_block_nonce');
    $data = get_post_meta($postID, 're-faq', true);
?>
    <style>
        .rf-body-component {
            text-align: center;
            width: 100%;
            min-height: 0rem;
            max-height: 30rem;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .transition-all-200 {
            transition: all 200ms ease;
        }

        .rf-faq-item {
            padding: .5rem 0rem;
            display: table;
            width: 100%;
        }

        .rf-faq-item div {
            display: table-cell;
        }

        .rf-faq-item .faq-question,
        .faq-answer {
            width: 98%;
            margin: 0rem auto;
        }

        .rf-faq-item .faq-answer {
            margin-top: 1rem;
            min-height: 3rem;
            max-height: 8rem;
        }


        .rf-add-more-button {
            text-align: center;
        }

        .rf-add-more-button input {
            width: 7rem;
            padding: .5rem;
            background-color: #2271b1;
            border: none;
            border-radius: .2rem;
            color: #fff;
            font-weight: 600;
        }

        .rf-add-more-button input:hover {
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px, rgba(0, 0, 0, 0.3) 0px 4px, rgba(0, 0, 0, 0.2) 0px 6px, rgba(0, 0, 0, 0.1) 0px 8px, rgba(0, 0, 0, 0.05) 0px 10px;
            background-color: #135e96;
            transform: scale(1.07);
        }

        .faq-drop-button-div {
            vertical-align: middle;
        }

        .faq-drop-button-div input {
            padding: .5rem 1.5rem;
            border: none;
            color: #fff;
            background-color: rgb(230, 0, 0);
            font-weight: 600;
            border-radius: .3rem;

        }

        .faq-drop-button-div input:hover {
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px, rgba(0, 0, 0, 0.3) 0px 4px, rgba(0, 0, 0, 0.2) 0px 6px, rgba(0, 0, 0, 0.1) 0px 8px, rgba(0, 0, 0, 0.05) 0px 10px;
            background-color: rgb(255, 26, 26);
            transform: scale(1.07);
        }
    </style>
    <section class="rf-faq-section">
        <div class="rf-faq-block-body">
            <div id="rf-faq-component" class="rf-body-component transition-all-200">
                <?php
                if (!empty($data)) {
                    foreach ($data as $item) {
                        echo  '<div class="rf-faq-item">
                                <div>
                                <input class="faq-question" type="text" name="faq-question[]" placeholder="Question" value="' . $item['question'] . '">
                                <textarea class="faq-answer" oninput="textAreaAutoGrow(this);" name="faq-answer[]" placeholder="Answer">' . $item['answer'] . '</textarea>
                                </div>
                                <hr>
                                <div class="faq-drop-button-div">
                                    <input id="rf-faq-drop-button" class="faq-drop-button transition-all-200" type="button" value="Drop">
                                </div>
                              </div>';
                    }
                }
                ?>
            </div>
            <div class="rf-add-more-button">
                <input id="rf-faq-add-more-button" class="transition-all-200" type="button" value="Add FAQ +">
            </div>
        </div>
    </section>
    <script src="<?php echo plugin_dir_url(__DIR__) ?>repeater-faq-field/jquery.js"></script>
    <script>
        $(document).on('click', '#rf-faq-add-more-button', function() {
            let item = `<div class="rf-faq-item" style="display:none;">
                            <div>
                            <input class="faq-question" type="text" name="faq-question[]" placeholder="Question">
                            <textarea class="faq-answer" oninput="textAreaAutoGrow(this);" name="faq-answer[]" placeholder="Answer"></textarea>
                            </div>
                            <div class="faq-drop-button-div">
                                <input id="rf-faq-drop-button" class="faq-drop-button transition-all-200" type="button" value="Drop">
                            </div>
                            <hr>
                        </div>`;
            $('#rf-faq-component').append(item);
            $('#rf-faq-component').find('.rf-faq-item:last').fadeIn();
            $("#rf-faq-component").animate({
                scrollTop: $('#rf-faq-component')[0].scrollHeight - $('#rf-faq-component')[0].clientHeight
            }, 200);
        });

        $(document).on('click', '.faq-drop-button', function(e){
            $(e.target).parent().parent().fadeOut(300, function(){$(e.target).parent().parent().remove()});
        });

        function textAreaAutoGrow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight) + "px";
        }
    </script>
<?php
}

function custom_faq_block_save($post_id)
{
    if (isset($_POST['custom_faq_block_nonce']) && wp_verify_nonce($_POST['custom_faq_block_nonce'], 'custom_faq_block_save')) {
        if (isset($_POST['faq-question']) && isset($_POST['faq-answer'])) {
            $count = count($_POST['faq-question']);
            $start = 0;
            $arr = [];
            for ($i = 0; $i < $count; $i++) {
                if (!empty($_POST['faq-question'][$i]) && !empty($_POST['faq-answer'][$i])) {
                    $arr[$start] = ['question' => $_POST['faq-question'][$i], 'answer' => $_POST['faq-answer'][$i]];
                    $start++;
                }
            }
            if (count($arr) > 0) {
                update_post_meta($post_id, 're-faq', $arr);
            } else {
                delete_post_meta($post_id, 're-faq');
            }
        } else {
            delete_post_meta($post_id, 're-faq');
        }
    }
}

add_action('save_post', 'custom_faq_block_save');

?>