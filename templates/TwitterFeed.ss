<% if Tweets %>
<div class="twitter_feed">
	<% loop Tweets %>
		<div class="tweet">
			$Title <span class="tweet_post_date">$Date.Ago</span>
		</div>
	<% end_loop %>
</div>
<% end_if %>
