<?php
/**
 * REST API
 */

namespace SangoBlocks;

use JShrink\Minifier;


class CustomJS {
  private $codes = [];

  public function init() {
    add_action('wp_footer', [$this, 'print_codes'], 9999);
  }

  public function print_codes() {
    if (empty($this->codes)) {
      return;
    }
    $final_js = $this->ready_js();
    $final_js = $this->minify_js($final_js);
    $codes = $this->codes;
    foreach ($codes as $code) {
      $final_js .= $this->minify_js($code);
    }
    echo '<script>' . $final_js . '</script>';
  }

  public function register($key, $code, $scoped = true, $controls = []) {
    $first_code = $scoped ? "const block = document.querySelector(\"#$key\");" : '';
    if (count($controls) > 0) {
      $first_code .= 'const controls = {';
      foreach ($controls as $control) {
        $type = isset($control['variableType']) ? $control['variableType'] : 'string';
        $varName = isset($control['variableName']) ? $control['variableName'] : '';
        $value = isset($control['value']) ? $control['value'] : '';
        $disabled = isset($control['disableJS']) ? $control['disableJS'] : false;
        if ($disabled) {
          continue;
        }
        if ($type === 'number') {
          $first_code .= "\"$varName\": $value,";
        } else if ($type === 'boolean') {
          if (empty($value) || $value === 0) {
            $value = 'false';
          } else {
            $value = 'true';
          }
          $first_code .= "\"$varName\": $value,";
        } else {
          $first_code .= "\"$varName\": \"$value\",";
        }

      }
      $first_code .= '};';
    }
    $script = <<<EOT
    sgb.domReady(function() {
      $first_code
      $code
    });
EOT;
    $this->codes[$key] = $script;
  }

  public function ready_js() {
    $script = <<<EOT
    const sgb = {};
    sgb.domReady = (fn) => {
      document.addEventListener("DOMContentLoaded", fn);
      if (document.readyState === "interactive" || document.readyState === "complete" ) {
        fn();
      }
    };
EOT;
    return $script;
  }

  public function minify_js($js) {
    return Minifier::minify($js);
  }
}
