--TEST--
Starting Profiler: trigger, trigger match
--INI--
xdebug.mode=profile
xdebug.start_with_request=trigger
xdebug.trigger_value=something
xdebug.collect_params=0
xdebug.collect_return=0
xdebug.collect_assignments=0
--ENV--
XDEBUG_PROFILE=something
--FILE--
<?php
$fileName = xdebug_get_profiler_filename();

echo file_get_contents($fileName);
@unlink($fileName);
?>
--EXPECTF--
version: 1
creator: xdebug %d.%s (PHP %s)
cmd: %sstart_with_request_trigger_match.php
part: 1
positions: line

events: Time_(µs) Memory_(bytes)

fl=(1) php:internal
fn=(1) php::xdebug_get_profiler_filename
2 %d %d
