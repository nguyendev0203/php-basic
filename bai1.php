<?php
class Circle
{
    public $Radius;
    const PI = 3.14;

    public function __construct($Radius)
    {
        $this->Radius = $Radius;
    }

    public function getArea()
    {
        return round(($this->Radius * $this->Radius * self::PI), 2);
    }

    public function getCircumference()
    {
        return round(($this->Radius * 2 * self::PI), 2);
    }
}

if (isset($argv[1])) {
    if (is_numeric($argv[1])) {
        if ($argv[1] > 0) {
            $Circle = new Circle($argv[1]);
            echo "The Area :" . $Circle->getArea() . "\n";
            echo "The Curcumference :" . $Circle->getCircumference() . "\n";
        } else {
            echo "Number should > 0";
        }
    } else {
        echo "Please input number";
    }
} else {
    echo "Input can't be null";
}
