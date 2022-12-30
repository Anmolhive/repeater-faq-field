<?php

/**
 * Function to call faq and faq scema in theme.
 */

function rf_faqs($id) {
    $status = get_option('rf-faq', false);
    if($status){
        return get_post_meta($id, 're-faq', true);
    } else {
        return false;
    }
}

function rf_faqs_schema($id) {
    $status = get_option('rf-faq', false);
    $return = '';
    if($status){
        $data = get_post_meta($id, 're-faq', true);
        if(!empty($data)){
            $return .= '<script>
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [';
            $count = count($data);
            for($i = 0; $i < $count; $i++){
                if( $i == 0 ){
                    $return .= '{
    "@type": "Question",
    "name": "'.$data[$i]['question'].'",
    "acceptedAnswer": {
        "@type": "Answer",
        "text": "'.$data[$i]['answer'].'"
    }
    }';
                } else{
                    $return .= ',{
    "@type": "Question",
    "name": "'.$data[$i]['question'].'",
    "acceptedAnswer": {
        "@type": "Answer",
        "text": "'.$data[$i]['answer'].'"
    }
    }';
                }
            }
            $return .= ']
}
</script>';
        }
    } else {
        $return = false;
    }
    return $return;
}
