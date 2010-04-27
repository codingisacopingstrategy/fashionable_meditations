<?php
// 
// Application: Fashionable meditations
// File: 'index.php' 

include('corpus.php');
require_once 'facebook.php';

$appapikey = '';
$appsecret = '';
$facebook = new Facebook($appapikey, $appsecret);

$user_id = $facebook->require_login();
?>
<style>

p {
    font-family: Georgia, Gentium, sans-serif;
    font-size: 16px;
    line-height: 22px;
    width: 420px;
    margin-left:8px;
}
a,a:visited,a:active {
  font-style: normal;
    color:#fd297e;
}
a:hover{
    font-style: italic;
    text-decoration:underline;
}
a#generate {
    display: block;
    padding: 10px;
    width: 372px;
    margin: 0px 12px;
    font-size: 24px;
    text-align: center;
    font-weight: 700;
}

a#generate {
    font-size: 36px;    
}

hr {
    width: 420px;
    height: 1px;
    text-align:left;
}
p.footnotes {
    font-size:10px;
}

blockquote {
    margin 0 24px;
    font-size: 20px;
}
h1 {
    font-size:24px;
    font-weight:normal;
}
</style>
<?php
if($_GET['publish']) {
$user = $facebook->require_login($required_permissions = 'publish_stream');
$status = $corpus[rand(0,16)];
$facebook->api_client->stream_publish($status);
?>
<p>Succes! The unique status that has been generated for you:</p>
<blockquote><?php echo $status; ?></blockquote>
<p>View it on your <a href="http://blog.facebook.com/profile.php?id=<?php echo $fb_user; ?>"  target="_top">profile</a>.</p>
<?php
}
else {
?>
<h1>Fashionable meditations<sup>1</sup></h1>

<p>is an application that will generate a status update.</p>

<p>The algorithm makes use of your individuality in order to come up with a message that is just right: it strikes a balance between the ridiculous and sublime.</p>

<p>Go ahead and:</p>

<p><a href="?publish=true" id="generate" class="awesome">generate your status!</a></p>

<p>The algorithm has been based on drafts for an artist&rsquo;s statement.</p>

<hr>

<p class="footnotes"><sup>1</sup> The title is a pun on the title of Nietzsche&rsquo;s book &ldquo;Unzeitgem&auml;sse Betrachtungen&rdquo;: &lsquo;untimely observations&rsquo; or &lsquo;unfashionable meditations&rsquo;. We do not want to be that thinker on top of a mountain.</p>
<?php
}
?>