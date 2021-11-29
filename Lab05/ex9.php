<?php

class Page{
    private $page = null;
    private $title;
    private $year;
    private $copyright;

    private function addHeader()
    {
        $this->page = "<h1>Welcome</h1><br>";
        $this->page = $this->page . "<h2> Title: $this->title </h2><br>";
    }
    public function addContent($content)
    {
        $this->addHeader();
        $this->page = $this->page . $content. "<br>";
        $this->addFooter();
    }
    private function addFooter()
    {
        $this->page = $this->page . "Copyright © $this->copyright at $this->year year<br>";
    }
    public function get()
    {
        print("$this->page");
    }
    public function setYear($year){
        $this->year = $year;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setCopyright($copyright){
        $this->copyright = $copyright;
    }

}

$new_page = new Page();
$new_page->setYear("2000");
$new_page->setTitle("My blog");
$new_page->setCopyright("Blog made by me");
$new_page->addContent("This is content");
$new_page->get();


?>