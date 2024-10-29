<?php
class person {
  // Properties
  var $name;
  var $alamat;
  var $hobi;

  // Methods
    function tampilkan_nama($name) {
    return "nama saya " . $name ."<br/>";
     }
    function tampilkan_alamat($alamat) {
        return "alamat saya " . $alamat ."<br/>"; 
    }
    function tampilkan_hobi($hobi) {
        return "hobi saya " . $hobi ."<br/>"; 
    }
    
}

$person  = new Person();

echo $person->tampilkan_nama("linda");
echo $person->tampilkan_alamat("lampung barat");
echo $person->tampilkan_hobi("traveling");
?>
