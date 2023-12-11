<?php

class Form
{
    private $name;
    private $method;
    private $action;
    public $inputs = [];
    private $submitButtonLabel;

    public function __construct($name, $method = 'post', $action = '')
    {
        $this->name = $name;
        $this->method = $method;
        $this->action = $action;
    }

    public function addInput(Input $input)
    {
        $this->inputs[] = $input;
    }

    public function setSubmitButtonLabel($label)
    {
        $this->submitButtonLabel = $label;
    }

    public function render()
    {
        $html = "<form name=\"{$this->name}\" method=\"{$this->method}\"";

        if (!empty($this->action)) {
            $html .= " action=\"{$this->action}\"";
        }

        $html .= ">\n";

        foreach ($this->inputs as $input) {
            $html .= $input->render();
        }

        if (!empty($this->submitButtonLabel)) {
            $html .= "<input type=\"submit\" value=\"{$this->submitButtonLabel}\">\n";
        }

        $html .= "</form>\n";

        return $html;
    }
}

abstract class Input
{
    protected $name;
    protected $attributes = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setAttribute($attribute, $value)
    {
        $this->attributes[$attribute] = $value;
    }

    abstract public function render();
}

class InputText extends Input
{
    public function render()
    {
        $html = "<input type=\"text\" name=\"{$this->name}\"";

        foreach ($this->attributes as $attribute => $value) {
            $html .= " {$attribute}=\"{$value}\"";
        }

        $html .= ">\n";

        return $html;
    }
}

$name = 'user-form';
$method = 'post';
$action = '/handle.php';

$form = new Form($name, $method, $action);
$form->addInput(new InputText('first_name'));
$form->addInput(new InputText('last_name'));
$form->setSubmitButtonLabel('Submit');

// Additional attribute for 'first_name' input
$form->inputs[0]->setAttribute('placeholder', 'Enter your first name');

echo $form->render();


