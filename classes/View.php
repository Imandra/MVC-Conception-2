<?php


class View
{

    protected $data = [];

    public function assign($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function display($template)
    {
        //делаем красивые имена переменных перед показом шаблона
        //$this->data['items'] преобразовываем в $items
        foreach ($this->data as $key => $val) {
            $$key = $val; //переменная с именем , содержащимся в другой переменной($key)
        }
        include __DIR__ . '/../views/' . $template;
    }

}