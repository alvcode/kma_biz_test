<?php

namespace core;

class View {
    const BASE_PATH = '../views/';
    private $template;

    public function __construct($template) {
        $this->template = self::BASE_PATH . $template;
    }

    public function render($params = array()) {
        if (!file_exists($this->template)) {
            throw new \Exception("Шаблон не найден: " . $this->template);
        }

        extract($params);

        ob_start();

        include($this->template);

        $content = ob_get_clean();

        return $content;
    }
}