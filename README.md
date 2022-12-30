# Repeater FAQ field
Wordpress plugin to add faqs metabox in blog and return faqs with faqs schema

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
        &nbsp;&nbsp;$faqs = rf_faqs($post->ID); <br>
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
