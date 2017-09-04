<?php

/**
 * @property array|bool items
 * @property mixed item
 */
class View
{

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function render($template)
    {
        //делаем красивые имена переменных перед показом шаблона
        //$this->data['items'] преобразовываем в $items
        foreach ($this->data as $key => $val) {
            $$key = $val; //переменная с именем , содержащимся в другой переменной($key)
        }
        ob_start();
        include __DIR__ . '/../views/' . $template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public function display($template)
    {
       echo $this->render($template);
    }
}