<?php

use SangoBlocks\App;

function sng_faq_render($block_content, $block)
{
  $innerBlocks = isset($block["innerBlocks"]) ? $block["innerBlocks"] : [];
  $richResult = isset($block['attrs']['showRichResults']) ? $block['attrs']['showRichResults'] : false;
  if (!$richResult) {
    return $block_content;
  }

  $mainEntity = "[";

  foreach ($innerBlocks as $innerBlock) {
      $question = isset($innerBlock['attrs']['question']) ? $innerBlock['attrs']['question'] : '';
      $answer = isset($innerBlock['attrs']['answer']) ? $innerBlock['attrs']['answer'] : '';
      $question = addslashes($question);
      $answer = addslashes($answer);
      $mainEntity .= <<< EOM
      {
        "@type": "Question",
        "name": "$question",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "$answer"
        }
      }
EOM;
      if ($innerBlock !== end($innerBlocks)) {
        $mainEntity .= ",";
      }
  }
  $mainEntity .= "]";

  $jsonLd = <<< EOM
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": $mainEntity
      }
    </script>
EOM;
  return $block_content . $jsonLd;
}

add_filter( 'render_block_sgb/faq', 'sng_faq_render', 10, 2 );
