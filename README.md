# phonestar-call-log-webhook
This is a sample or a proof of concept that demonstrates how to use phonestar.ch webhooks and parse them in php

In the phonestar user / customer portal, navigate to My Profile then under API you can add the following webhooks

https://calllog.solvia.ch/newcall.php?event=%event%&caller=%caller%&callee=%callee%&timestamp=%timestamp%&sip_from=%sip_from%&sip_request=%sip_request%

The newcall.php needs to be uploaded to a webhost. The URL needs to be adjusted (calllog.solvia.ch -> with the URL of your webhost...)

<img width="871" alt="image" src="https://user-images.githubusercontent.com/2221944/172382624-597dfc91-295f-4950-beb0-f4dd4896a2d1.png">
