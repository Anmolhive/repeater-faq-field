# Repeater FAQ field
Wordpress plugin to add faqs metabox in blog and return faqs with faqs schema

### To use Repeater FAQ field to your theme:

## rf_faqs( int $post_id);

Description
Returns faqs of the post as array of arrays

Returns
<ol>
  <li>testing</li> 
</ol>
Array([0] => Array(["question"] => question ["answer"] => answer)
If no value entered return empty string
If plugin is deactive from repeater faq admin it returns bool(False)
Best practice
if(function_exists('rf_faqs')){
  $faqa = rf_faqs($post->ID);
  foreach($faqs as $faq){
    echo $faq['question'];
    echo $faq['answer'];
  }
}
Faqs schema
rf_faqs_schema( int $post_id);
Description
Returns faqs_schema of the post with javascript tag

Returns
Return schema with javascript tag
<script>
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
  "@type": "Question",
  "name": "Your-question?",
  "acceptedAnswer": {
    "@type": "Answer",
    "text": "Your-answer."
  }
  }]
}
</script>
If no value entered return empty string
If plugin is deactive from repeater faq admin it returns bool(False)
Best practice
if(function_exists('rf_faqs_schema')){
  $faqa_schema = rf_faqs_schema($post->ID);
  echo $faqa_schema;
}
