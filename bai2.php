<?php

class ParseFile
{

    private $filename;
    private $data = [];

    public function __construct($filename = '')
    {
        if ($filename != '') {
            $this->file($filename);
        }
    }

    public function file($filename)
    {
        if (!file_exists($filename)) {
            echo "File does not exist.";
            return false;
        } elseif (!is_readable($filename)) {
            echo "File is not readable.";
            return false;
        }
        $this->filename = $filename;
        return true;
    }

    public function parse()
    {
        if (!isset($this->filename)) {
            echo "File not set.";
            return false;
        }

        $file = fopen($this->filename, 'r');
        while (!feof($file)) {
            // $row = fgets($file, 0, self::$delimiter);          
            $this->data[] = preg_split("/[\s,]+/",fread($file,filesize("input.txt")));
        }
        fclose($file);
        return $this->data;
    }
}

$parse = new ParseFile("input.txt");
$array_data = $parse->parse();
$count_data = array_count_values($array_data[0]);
$number_count = array(); 
foreach ($count_data as $key => $value) {
    if ($value >= 3) {
        array_push($number_count, $key); 
    }
}
$output = implode(',', $number_count); 
echo "the number apearance 3 times is:" . $output;

