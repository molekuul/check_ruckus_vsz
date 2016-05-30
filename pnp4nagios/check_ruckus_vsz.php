<?php

$def[1] = '';
$def[2] = '';
$def[3] = '';

for ($i=1; $i <= count($DS); $i++) {
  switch($NAME[$i]) {
    case 'num_ap': $def[1] .= rrd::def($NAME[$i], $RRDFILE[1], $DS[$i]); break;
    case 'num_ap_connected': $def[1] .= rrd::def($NAME[$i], $RRDFILE[1], $DS[$i]); break;
    case 'num_ap_configured': $def[1] .= rrd::def($NAME[$i], $RRDFILE[1], $DS[$i]); break;
    case 'num_sta': $def[2] .= rrd::def($NAME[$i], $RRDFILE[1], $DS[$i]); break;
    case 'stats_rx_bytes': $def[3] .= rrd::def($NAME[$i], $RRDFILE[1], $DS[$i]); break;
    case 'stats_tx_bytes': $def[3] .= rrd::def($NAME[$i], $RRDFILE[1], $DS[$i]); break;
    default: break;
  }
}

$ds_name[1] = 'Access Points';
$opt[1] = "--upper-limit 42 --lower-limit 0 --vertical-label \"Access Points\"  --title $hostname";
$def[1] .= rrd::line1("num_ap", "#21db2a", "Number of monitored accesspoints");
$def[1] .= rrd::gprint("num_ap", array("AVERAGE", "MAX", "LAST"), "%3.0lf");
$def[1] .= rrd::line1("num_ap_connected", "#db212a", "Number of connected accesspoints");
$def[1] .= rrd::gprint("num_ap_connected", array("AVERAGE", "MAX", "LAST"), "%3.0lf");
$def[1] .= rrd::line1("num_ap_configured", "#212adb", "Number of configured accesspoints");
$def[1] .= rrd::gprint("num_ap_configured", array("AVERAGE", "MAX", "LAST"), "%3.0lf");

$ds_name[2] = 'Clients';
$opt[2] = "--upper-limit 250 --lower-limit 0 --vertical-label \"Clients\"  --title $hostname";
$def[2] .= rrd::line1("num_sta", "#21db2a", "Number of Clients");
$def[2] .= rrd::gprint("num_sta", array("AVERAGE", "MAX", "LAST"), "%3.0lf");

$ds_name[3] = 'Total Throughput';
$opt[3] = "--upper-limit 250 --lower-limit 0 --vertical-label \"Bytes\"  --title $hostname";
$def[3] .= rrd::line1("stats_rx_bytes", "#21db2a", "Received Bytes");
$def[3] .= rrd::gprint("stats_rx_bytes", array("AVERAGE", "MAX", "LAST"), "%3.0lf");

$def[3] .= rrd::line1("stats_tx_bytes", "#db212a", "Transmitted Bytes");
$def[3] .= rrd::gprint("stats_tx_bytes", array("AVERAGE", "MAX", "LAST"), "%3.0lf");

?>
