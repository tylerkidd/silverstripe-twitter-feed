<% if Tweets %>
<div class="twitter_feed" id="twitter">
	<% loop Tweets %>
		<div class="tweet">
			<span class="tweet_post_date">$Date.Ago</span>
			<div class="tweet_content">
				<div class="user_image">
					<img src="$ProfileImage" width="30" />
				</div>
				<div class="tweeted">
					<div class="twitter_user">
						<strong>$User</strong> @$ScreenName
					</div>
					<p>$Title</p>
				</div>
			</div>
			<div class="tweet_actions">
				<a href="$Retweet" target="_blank">retweet</a>
				<a href="$Reply" target="_blank">reply</a>
			</div>
		</div>
	<% end_loop %>
</div>
<% end_if %>
