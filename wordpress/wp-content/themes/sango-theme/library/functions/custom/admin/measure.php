<?php

use SANGO\App;

App::get('builder')->addSection('🧑‍💻 クリック計測', 'measure', ['priority' => 5]);

App::get('builder')->addConfig('measure', [
  'name' => 'graph',
  'value' => '',
  'title' => 'コンテンツブロックの計測結果',
  'type' => 'graph',
  'description' => ''
]);
