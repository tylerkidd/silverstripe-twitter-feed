SilverStripe Twitter Feed
=========================

## Requirements
Silverstripe 3.0+

## Maintainer (of this fork)
francisco arenas - fa@dospuntocero.cl
Pull requests welcome.

## Whats new?
More flexibility on templating. you can see it working on [fortispartners.com](http://fortispartners.com "fortis & partners website")


## Installation
Download this module into a folder in the root of your project. Does not require /dev/build.

## Usage
The simplest case is to add this to _config.php:

```php
Object::add_extension('Page', 'TwitterFeedExtension');
```

Then setup your Twitter config:

```php
TwitterFeedExtension::$twitter_cache_enabled = true; //optional

TwitterFeedExtension::$twitter_cache_key = ''; //optional - required if $twitter_cache_enabled is true
TwitterFeedExtension::$twitter_cache_id = ''; //optional - required if $twitter_cache_enabled is true

TwitterFeedExtension::$twitter_consumer_key = ''; //required
TwitterFeedExtension::$twitter_consumer_secret = ''; //required
TwitterFeedExtension::$twitter_oauth_token = ''; //required
TwitterFeedExtension::$twitter_oauth_token_secret = ''; //required

TwitterFeedExtension::$twitter_user = ''; //optional
```

To obtain Twitter consumer keys and oauth tokens visit <https://dev.twitter.com/apps>.

Then just add $TwitterFeed anywhere you want.
