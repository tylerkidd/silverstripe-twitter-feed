<% if Tweets %>
<div class="twitter_feed" id="twitter">
	<% loop Tweets %>
		<div class="tweet">
			<p>$Title</p>
			<span class="tweet_post_date">$Date.Ago</span>
		</div>
	<% end_loop %>
</div>
<% end_if %>
