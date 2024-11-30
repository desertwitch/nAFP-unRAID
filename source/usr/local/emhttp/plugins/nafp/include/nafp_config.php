<?
/* Copyright Derek Macias (parts of code from NUT package)
 * Copyright macester (parts of code from NUT package)
 * Copyright gfjardim (parts of code from NUT package)
 * Copyright SimonF (parts of code from NUT package)
 * Copyright Dan Landon (parts of code from Web GUI)
 * Copyright Bergware International (parts of code from Web GUI)
 * Copyright Lime Technology (any and all other parts of Unraid)
 *
 * Copyright desertwitch (as author and maintainer of this file)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 */
$nafp_cfg          = parse_ini_file("/boot/config/plugins/nafp/nafp.cfg");
$nafp_service      = trim(isset($nafp_cfg['SERVICE']) ? htmlspecialchars($nafp_cfg['SERVICE']) : 'disable');
$nafp_metricsapi   = trim(isset($nafp_cfg['METRICSAPI']) ? htmlspecialchars($nafp_cfg['METRICSAPI']) : 'enable');
$nafp_running      = !empty(shell_exec("pgrep -x netatalk 2>/dev/null"));
$nafp_installed_backend = htmlspecialchars(trim(shell_exec("find /var/log/packages/ -type f -iname 'netatalk*' -printf '%f\n' 2>/dev/null") ?? "n/a"));
?>
