<?php
/**
 *
 *
 * @author Tyler Kidd <tyler@adaircreative.com>
 * @date 12.05.2012
 * @package silverstripe-twitter-feed
 */
class TwitterFeedExtension extends SiteTreeExtension {
	

	public static $twitter_cache_enabled = false;
	public static $twitter_cache_key;
	public static $twitter_cache_id;

	public static $twitter_consumer_key;
	public static $twitter_consumer_secret;
	public static $titter_oauth_token;
	public static $titter_oauth_token_secret;
	
	public static $twitter_user;
	
	public static $twitter_config = array(
		'include_entities' => 'true',
		'include_rts' => 'true'
	);
	
	public function TwitterFeed($limit = 5){
			
		$cache = SS_Cache::factory(self::$twitter_cache_key);
		$cacheID = self::$twitter_cache_id;
		
		if(!$output = unserialize($cache->load($cacheID))){
	
			require_once(Director::baseFolder().'/'.TWITTER_FEED_BASE.'/thirdparty/twitteroauth/twitteroauth.php');

			$connection = new TwitterOAuth(
				self::$twitter_consumer_key,
				self::$twitter_consumer_secret,
				self::$titter_oauth_token,
				self::$titter_oauth_token_secret
			);
			
			$config = self::$twitter_config;

			if(self::$twitter_user){
				$config['screen_name'] = self::$twitter_user;
			}
			
			$tweets = $connection->get('statuses/user_timeline', $config);
	
			$tweetList = new ArrayList();
						
			if(count($tweets) > 0 && !isset($tweets->error)){
				$i = 0;
				foreach($tweets as $tweet){
					
					if(++$i > $limit) break;
					
					$date = new SS_Datetime();
					$date->setValue(strtotime($tweet->created_at));
					
					$text = $tweet->text;

					if($tweet->entities && $tweet->entities->urls){
						foreach($tweet->entities->urls as $url){
							$text = str_replace($url->url, '<a href="'.$url->url.'" target="_blank">'.$url->url.'</a>',$text);
						}
					}

					$tweetList->push(
						new ArrayData(array(
							'Title' => $text,
							'Date' => $date
						))
					);
	
				}
			}
			
			$view = new ViewableData();
			$output = $view->renderWith('TwitterFeed', array('Tweets' => $tweetList));
			
			if(self::$twitter_cache_enabled){
				$cache->save(serialize($output), $cacheID);
			}
		}
		
		return $output;

	}
	
}