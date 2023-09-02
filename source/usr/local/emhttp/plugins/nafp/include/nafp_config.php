<?
$nafp_cfg          = parse_ini_file("/boot/config/plugins/nafp/nafp.cfg");
$nafp_service      = isset($nafp_cfg['SERVICE'])      ? htmlspecialchars($nafp_cfg['SERVICE'])       : 'disable';
$nafp_running      = (intval(trim(shell_exec( "[ -f /proc/`cat /var/lock/netatalk 2> /dev/null`/exe ] && echo 1 || echo 0 2> /dev/null" ))) === 1 );
?>
