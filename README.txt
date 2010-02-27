Instructions
--------------------------------------------------------------------------------

You’ll need an install of Vanilla Forums 2 with the SSO plugin before we go any further. On the SSO settings page fill in the text fields so it looks similar:

# Authenticate Url
http://example.com/ee/index.php/sso/vanilla

# Registration Url
http://example.com/ee/index.php/member/register

# Sign-in Url
http://example.com/ee/index.php/member/login

# Sign-out Url
http://example.com/ee/index.php?ACT=12

In the Vanilla Forums config.php make sure the following cookie name is set:
$Configuration['Garden']['Cookie']['Name'] = 'exp_vanilla';

Now you’ve (hopefully) got that sorted move the “sm_vanilla” folder into your “/system/expressionengine/third_party/” folder. You can enable that in the control panel now.

Create a template matching the one used for “Authenticate Url” with the following inside:
{if logged_in}
UniqueID={member_id}
Name={username}
Email={email}
{/if}


Extra
--------------------------------------------------------------------------------

You will almost certainly want to have your EE admin account act as the Vanilla admin so you will need to make sure that in the Vanilla DB there is a row in “GDN_UserAuthentication” that matches up your admin accounts (usually both have the ID of 1).


Finally
--------------------------------------------------------------------------------

Clear all of your cookies and I think that should be it. You can now log in to you Vanilla installation using EE. I’m sorry it’s not easier but there is nothing I can do on the EE side.