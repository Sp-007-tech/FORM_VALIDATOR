# FORM_FIELDS_VALIDATOR
These page will show how to process PHP forms with security.Proper validation of FORM data is important to protect your FORM from Hackers and Spammers..

In this code the " $_SERVER["PHP_SELF"] " is a super global variable that return the filename of the currently executing script.

The " htmlspecialchars() " function converts special character to HTML entites.This means that it will replace HTML character like < and > with & and ; and &gt. This pervents attackers form exploiting the code by injecting HTML code or JAVASCRIPT code in form..


The first thing we will do is to pass all variable through PHP's htmlspecialchars() function.

When we use the htmlspecialchars() function; then if a user tries to submit the following in a text field:

<script>location.href('http://www.hacked.com')</script>

- this would not be executed, because it would be saved as HTML escaped code, like this:

&lt;script&gt;location.href('http://www.hacked.com')&lt;/script&gt;

This code is now safe to be displayed on a page or inside an e-mail.
