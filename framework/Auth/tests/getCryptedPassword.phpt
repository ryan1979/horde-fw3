--TEST--
Auth::getCryptedPassword() test
--FILE--
<?php

require_once 'Horde/Util.php';
require_once 'Horde/String.php';
require_once dirname(__FILE__) . '/../Auth.php';
require_once dirname(__FILE__) . '/credentials.php';

for ($i = 0; $i < count($passwords); $i++) {
    echo $encryptions[$i] . ':' . Auth::getCryptedPassword('foobar', $passwords[$i], $encryptions[$i], false) . "\n";
}

?>
--EXPECT--
plain:foobar
msad:" f o o b a r " 
sha:iEPX+SQWIR3p67lj/0zigSWTKHg=
crypt:8e3IWstJmsmxs
crypt-des:45MibW6/G3XEY
crypt-md5:$1$537a3a0e$CWyLVJdQKfxbKPBv/Efzm0
crypt-blowfish:*0OayF9ttbxIs
md5-base64:OFj2IjCsPJFfMAxmQxLGPw==
ssha:buQrQ9vazjrHtO6oIfSZhSBjVxdjemZvZHVubg==
ssha:BLDmpxHYTH2/Bmg4veVfbglU68jQKEuK
ssha:2iXr83rPabLxmrx7uulT4W7mJFrawT41
smd5:ISCNJwzwP30CadahjpkbL2l6bHJxd2h2
smd5:bn3EnZ0TFc+yyx3KotqS5GlydmM=
smd5:GZ4KWKk2W6eSOHjVXLhOOzADuwA=
smd5:6y2n+CGCZhuB32dyFu3keQtY0Vc=
aprmd5:$apr1$11CBbKXP$AvvMGBjr81bC/NSMZIxrG.
md5-hex:3858f62230ac3c915f300c664312c63f
