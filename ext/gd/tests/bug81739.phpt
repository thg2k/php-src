--TEST--
Bug #81739 (OOB read due to insufficient validation in imageloadfont())
--EXTENSIONS--
gd
--FILE--
<?php
$s = fopen(__DIR__ . "/font.font", "w");
// header without character data
fwrite($s, "\x01\x00\x00\x00\x20\x00\x00\x00\x08\x00\x00\x00\x08\x00\x00\x00");
fclose($s);
var_dump(imageloadfont(__DIR__ . "/font.font"));
?>
--CLEAN--
<?php
@unlink(__DIR__ . "/font.font");
?>
--EXPECTF--
Warning: imageloadfont(): Error reading font in %s on line %d
bool(false)
