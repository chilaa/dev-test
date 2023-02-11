<?php
class Path
{
    public $currentPath;

    function __construct($path)
    {
        $this->currentPath = $path;
    }

    public function cd($newPath)
    {
        $current = explode('/', $this->currentPath);
        $new = explode('/', $newPath);
        foreach ($new as $part) {
            if ($part === '..') {
                array_pop($current);
            } else {
                $current[] = $part;
            }
        }
        $this->currentPath = implode('/', $current);
    }
}

$path = new Path('/a/b/c/d');
$path->cd('../x');
echo $path->currentPath;
