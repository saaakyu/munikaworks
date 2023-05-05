<?php

namespace SangoBlocks;

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

class Color
{
  private $table_name = 'sgb_color';

  public function init() {}

  public function createDb() {
    global $wpdb;
    $table_name = $wpdb->prefix . $this->table_name;
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name(
      color_id BIGINT(20) NOT NULL AUTO_INCREMENT,
      color_name VARCHAR(255) NOT NULL,
      color_code VARCHAR(255),
      PRIMARY KEY (color_id)
    ) $charset_collate";
    dbDelta($sql);
  }

  public function get() {
    global $wpdb;
    $table_name = $wpdb->prefix . $this->table_name;
    $results = $wpdb->get_results("SELECT *
      FROM $table_name
    ");
    if ($results) {
      return $results;
    }
    return array();
  }

  public function remove($id) {
    global $wpdb;
    $table_name = $wpdb->prefix . $this->table_name;
    $wpdb->query(
    "DELETE FROM $table_name
      WHERE color_id = \"$id\"
    ");
  }

  public function create($data) {
    global $wpdb;
    $table_name = $wpdb->prefix . $this->table_name;

    $wpdb->insert($table_name, array(
      "color_name" => $data['name'],
      "color_code" => $data["code"],
    ));
  }

  public function update($data) {
    global $wpdb;
    $table_name = $wpdb->prefix . $this->table_name;

    $wpdb->update($table_name,
      array(
        "color_name" => $data['name'],
        "color_code" => $data["code"],
      ),
      array(
        "color_id" => $data['id']
      )
    );
  }
}
