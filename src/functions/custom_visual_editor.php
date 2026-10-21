<?php
// ビジュアルエディタカスタマイズ
// h1使えないように
function my_h_style()
{
  echo '<style>
  button[aria-label="見出し1"],button[aria-label="見出し6"]
{
  display: none;
}
  </style>' . PHP_EOL;
}
add_action('admin_print_styles', 'my_h_style');
