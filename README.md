# gmodstore-fingerprinting
log all your downloads via gmodstores file string replacement

## I never intended for public use so code is really messy
## do not recommend using this in production servers
## you're free to use but it'd be cool to know who is using it so let me know!

# Usage:
in your gmod Client lua code include
`{{ web_hook "https://yourwebsite.com/request.php" "your key" }}` and it'll automatically be replaced with a fake func that the user will not be aware of, if this file is then leaked online you can track him by his fake function details.
