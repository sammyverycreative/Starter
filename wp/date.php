<?php
defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );
global $vc;
get_header(); ?>

<?php /*
$weekdaynames = array(0 => __('Sunday'), 1 => __('Monday'), 2 => __('Tuesday'),3 => __('Wednesday'), 4 => __('Thursday'), 5 => 
__('Friday'), 6 => __('Saturday'));

if (have_posts()) {
        $ye = mysql2date('Y', $wp_query->posts[0]->post_date);
        $mo = mysql2date('m', $wp_query->posts[0]->post_date);
        $da = mysql2date('d', $wp_query->posts[0]->post_date);
}

function days_in_month($month, $year) {
        $daysInMonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        if ($month != 2) {
                return $daysInMonth[$month - 1];
        }
        return (checkdate($month, 29, $year)) ? 29 : 28;
}

function get_month ($posts = '', $year = '', $this_month = '', $pad = 1) {
global $wpdb, $weekdaynames, $month;

$days_in_month = days_in_month($this_month, $year);
$first_day_of_month = date('w', mktime(0, 0, 0, $this_month, '1', $year));
$last_day_of_month = date('w', mktime(0, 0, 0, $this_month, $days_in_month, $year));

$start_of_week = get_settings('start_of_week');
if (0 != $start_of_week) {
        $end_of_week = 6 - (7 - $start_of_week);
} else {
        $end_of_week = 7;
}

for ($i = $start_of_week; $i < ($start_of_week + 7); $i++) {
        if ($i >= 7) {
                $one_week[] = $weekdaynames[$i - 7];
        } else {
                $one_week[] = $weekdaynames[$i];
        }
}

$pre_pad = 0;
$before = '';
if ($start_of_week != $first_day_of_month) {
        if ($first_day_of_month > $start_of_week) {
                $pre_pad = ($first_day_of_month - $start_of_week);
        } elseif ($start_of_week > $first_day_of_month) {
                $pre_pad = (7 - $start_of_week) + $first_day_of_month;
        }
}
$days_in_last_month = date('t', mktime(0, 0, 0, $this_month-1, '1', $year));
if ( (0 != $pre_pad) && ($pad) ) {
        $start = ($days_in_last_month - $pre_pad)+1;
        $lastmonth = $this_month - 1;
        $old_posts = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_date > 
'$year-$lastmonth-$start 00:00:01' AND post_date < '$year-$lastmonth-$days_in_last_month 23:59:59' ORDER BY post_date");
        if ($old_posts) {
                $last_month = array();
                foreach ($old_posts as $post) {
                        $day = substr($post->post_date, 8, 2);
                        if (! isset($last_month[$day])) {
                                $last_month[$day] = "<a href=\"" . get_permalink($post->ID) . "\" 
title=\"$post->post_title\">$day</a>";
                        } else {
                                $last_month[$day] = "<a href=\"" . get_settings('home') . "/$year/$lastmonth/$day\" 
title=\"/$year/$lastmonth/$day\">$day</a>";
                        }
                }
        }
}
for ($i = ($days_in_last_month - $pre_pad)+1; $i <= $days_in_last_month; $i++) {
                if (! $pad) {
                        $before .= '<td> </td>';
                } else {
                        $before .= '<td class="lastmonth">';
                        if (isset($last_month[$i])) {
                                $before .= $last_month[$i];
                        } else {
                                $before .= $i;
                        }
                        $before .= '</td>';
                }
}
$the_month = array();
if (! empty($posts)) {
        foreach ($posts as $post) {
                $day = substr($post->post_date, 8, 2);
                if (10 > $day) {
                        $day = substr($day, 1, 1);
                }
                if (! isset($the_month[$day])) {
                        $the_month[$day] = "<a href=\"" . get_permalink($post->ID) . "\" title=\"$post->post_title\">$day</a>";
                } else {
                        $the_month[$day] = "<a href=\"" . get_settings('home') . "/$year/$this_month/" . zeroise($day, 2) . "\" 
title=\"$year/$this_month/" . zeroise($day, 2) . "\">$day</a>";
                }
        }
}
$daycount = $pre_pad;
$here = get_settings('home');
$cal = "<h2><a href=\"$here/$year/\" title=\"$year\">$year</a> <a href=\"$here/$year/$this_month/\" 
title=\"$year/$this_month\">" . 
$month[zeroise($this_month, 2)] . "</a></h2>";
$cal .= '<table><tr>';
foreach ($one_week as $day) {
        $cal .= "<th>$day</th>";
}
$cal .= '</tr><tr>' . $before;
for ($i = 1; $i <= $days_in_month; $i++) {
        $cal .= '<td> ';
        if (isset($the_month[$i])) {
                $cal .=  $the_month[$i];
        } else {
                $cal .= $i;
        }
        $cal .= ' </td>';
        $daycount++;
        if ($daycount >= 7) {
                $cal .= '</tr><tr>';
                $daycount = 0;
        }
}

$after = '';
if ( ($end_of_week != $last_day_of_month) && ($pad) ) {
        $end = (7 - $daycount);
        $nextmonth = $this_month + 1;
        $new_posts = $wpdb->get_results("SELECT ID, post_title, post_date FROM $wpdb->posts WHERE post_status = 'publish' AND 
post_date > '$year-$nextmonth-01 00:00:01' AND post_date < '$year-$nextmonth-0$end 23:59:59' ORDER BY post_date");
        if ($new_posts) {
                if (10 > $nextmonth) {
                        $nextmonth = "0$nextmonth";
                }
                $next_month = array();
                foreach ($new_posts as $post) {
                        $day = substr($post->post_date, 9, 1);
                        if (! isset($next_month[$day])) {
                                $next_month[$day] = "<a href=\"" . get_permalink($post->ID) . "\" 
title=\"$post->post_title\">$day</a>";
                        } else {
                                $next_month[$day] = "<a href=\"" . get_settings('home') . "/$year/$nextmonth/0$day\" 
title=\"/$year/0$nextmonth/$day\">$day</a>";
                        }
                }
        }
}
for ($i = 1; $i <= (7 - $daycount); $i++) {
        if (! $pad) {
                $after .= '<td> </td>';
        } else {
                $after .= '<td class="lastmonth">';
                if (isset($next_month[$i])) {
                        $after .= $next_month[$i];
                } else {
                        $after .= $i;
                }
                $after .= '</td>';
        }
}
$cal .= $after;
$cal .= '</tr></table>';
return $cal;
}

function get_year($posts = '', $year = '', $pad = 0) {
$months = array();
foreach ($posts as $post) {
        $y = substr($post->post_date, 0, 4);
        $m = substr($post->post_date, 5, 2);
        $d = substr($post->post_date, 8, 2);
        $months[$m][] = $post;
}
$output = '';
foreach ($months as $num => $val) {
        $output .= get_month ($val, $year, $num, $pad);
}
return $output;
}

function get_day($posts = '', $year = '', $mon = '', $day = '', $pad = 1) {
global $month;
$here = get_settings('home');
$output = "<h2><a href=\"$here/$year/\" title=\"$year\">$year</a> <a href=\"$here/$year/$mon/\" title=\"$year/$mon\">" . 
$month[zeroise($mon, 2)] . "</a> <a href=\"$here/$year/$mon/$day\" title=\"$year/$mon/$day/\">$day</a></h2>";
$output .= '<table><tr><th>Time</th><th>Post</th></tr>';

foreach ($posts as $post) {
        $h = substr($post->post_date, 11, 2);
        if (10 > $h) {
                $h = substr($h, 1, 1);
        }
        $today[$h][] = $post;
}
for ($i = 0; $i <= 24; $i++) {
        $output .= '<tr><td>';
        if (10 > $i) {
                $output .= "0$i:00";
        } else {
                $output .= "$i:00";
        }
        $output .= '</td><td>';
        if (isset($today[$i])) {
                if (1 == count($today[$i])) {
                        $output .= "<a href=\"" . get_permalink($post->ID) . "\" 
title=\"$post->post_title\">$post->post_title</a>";
                } else {
                        foreach ($today[$i] as $post) {
                                $output .= "<a href=\"" . get_permalink($post->ID) . "\" 
title=\"$post->post_title\">$post->post_title</a><br />";
                        }
                }
        } else {
                $output .= '&nbsp';
        }
        $output .= '</td></tr>';
}
$output .= '</table>';
return $output;
}

if (is_year()) {
        $one_year = query_posts("posts_per_page=-1&year=$ye");
        $output = get_year($one_year, $ye);
        $today[$h][] = $post;
}
for ($i = 0; $i <= 24; $i++) {
        $output .= '<tr><td>';
        if (10 > $i) {
                $output .= "0$i:00";
        } else {
                $output .= "$i:00";
        }
        $output .= '</td><td>';
        if (isset($today[$i])) {
                if (1 == count($today[$i])) {
                        $output .= "<a href=\"" . get_permalink($post->ID) . "\" 
title=\"$post->post_title\">$post->post_title</a>";
                } else {
                        foreach ($today[$i] as $post) {
                                $output .= "<a href=\"" . get_permalink($post->ID) . "\" 
title=\"$post->post_title\">$post->post_title</a><br />";
                        }
                }
        } else {
                $output .= '&nbsp';
        }
        $output .= '</td></tr>';
}
$output .= '</table>';
return $output;
}

if (is_year()) {
        $one_year = query_posts("posts_per_page=-1&year=$ye");
        $output = get_year($one_year, $ye);
} elseif (is_month()) {
        $one_month = query_posts("posts_per_page=-1&year=$ye&monthnum=$mo");
        $output = get_month($one_month, $ye, $mo);
} elseif (is_day()) {
        $one_day = query_posts("posts_per_page=-1&year=$ye&monthnum=$mo&day=$da");
        $output = get_day($one_day, $ye, $mo, $da);
}

defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );
get_header();

echo $output;

get_sidebar();
*/ ?>

<?php get_footer(); ?>