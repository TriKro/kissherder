=== KissHerder ===

Contributors: trikro, pbackx
Donate link: http://grasshopperherder.com/
Tags: plugin, kissmetrics, kiss, metrics
Requires at least: 3.0
Tested up to: 3.3
Stable tag: 1.0


== Description ==

The KissHerder plugin allows you to easily add your KissMetrics code. You can also track user interaction such as commenting, tweeting, shares, etc. 


== Installation ==

Install through the admin interface, or manually in wp-content/plugins/kissherder

Once KissHerder is enabled, you should configure your KissMetrics API key.


== Frequently Asked Questions ==

= What event names should I use? =

KissMetrics allows you complete free choice in events. See the following page for a little more information:
http://support.kissmetrics.com/apis/api-tips

= How do I track Facebook events? =

The Facebook social plugins emit a number of events. Most importantly the "edge.create" event which is triggerd when a user clicks a like button on your page.
Assuming you have an XFBML like button somewhere on your page you can use the following snippet:

    <script type="text/javascript">
        FB.Event.subscribe('edge.create', function(response) {
          _kmq.push(['record', 'Facebook like']);
        });
    </script>

You should paste this code just below wherever you include the button.

You can use an XFBML like button on this page:
http://developers.facebook.com/docs/reference/plugins/like/

Other events are documented here:
http://developers.facebook.com/docs/reference/javascript/FB.Event.subscribe/

= How do I track Twitter follows? =

Tracking Twitter events is very similar to Facebook tracking. Include the following snippet just below any Twitter follow code:

    <script type="text/javascript">
        twttr.events.bind('follow', function(event) {
          _kmq.push(['record', 'Twitter follow']);
        });
    </script>

If you want to track tweets, use this:

    <script type="text/javascript">
        twttr.events.bind('tweet', function(event) {
          _kmq.push(['record', 'Tweeted']);
        });
    </script>

A full list of events you can track is in the Twitter dev docs:
https://dev.twitter.com/docs/intents/events

= How do I track Google +1 (plusone)? =

It's easiest to add the tracking when you create your button:
http://www.google.com/webmasters/+1/button/

Click on "Advanced Options" and enter "plusone_vote" into the "JS Callback Function" field.

Below the +1 code, include the following snippet:

    <script type="text/javascript">
      function plusone_vote( obj ) {
        _kmq.push(['record', 'Plus 1 vote']);
      }
    </script>
    
= How do I track LinkedIn shares? =

This currently requires an undocumented feature, so keep in mind that this might change in the future.
Start by creating your button on the LinkedIn dev pages https://developer.linkedin.com/plugins/share-button
Inside the "IN/Share" tag section you need to add the "data-onSuccess" callback function. Here's an example:

    <script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
    <script type="IN/Share" data-url="http://www.streamhead.com/" data-counter="right" data-onSuccess="linkedin_share"></script>
    <script type="text/javascript">
    function linkedin_share() {
      _kmq.push(['record', 'Shared on LinkedIn']);
    }
    </script>

== Screenshots ==

none yet


== Changelog ==

= Version 1.0 =

* Initial version.
