# HOTP/TOTP Token Generator

This is a simple PHP library and script that will generate HOTP and TOTP tokens. The library fully conforms to RFCs 4226 and 6238. All hashing algorithms are supported as well as the length of a token and the start time for TOTP.

## generate.php

generate.php is a script that acts exactly like Google Authenticator. It takes a secret key, either as an argument or can be entered when prompted on standard input, and generates a token assuming SHA1, Unix timestamp for start, and 30 second time intervals. The secret key should be base32 encoded.

```php
$ ./generate.php
Enter secret key: turtles
Token: 338914
$
```

## License

This software is released under the MIT license which can be found in LICENSE.