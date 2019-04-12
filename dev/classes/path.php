<?php
class Path {
  const DATA_DIR  = ABSPATH . 'data';
  const VIEWS_DIR = ABSPATH . 'views';
  const PAGES_DIR = self::VIEWS_DIR . '/pages';

  const CSS_URL = BASE_URL . 'css';
  const JS_URL = BASE_URL . 'js';
  const IMAGES_URL = BASE_URL . 'res/images';
}