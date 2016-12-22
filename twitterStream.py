import tweepy

consumer_key = '5YpiybaWp8ffr3RgUDnxIHLIA'
consumer_key_secret ='kcb7LgqtFvI5Tz3bYUePNehKOQ90ULoTN3jH7uLrhGCPMpBfW0'
access_token = '71328725-T0WejPJQArFBenvJn3gRZ8BuzF9Nk61Hfub6dT2Hr'
access_token_secret = 'hCOPtaN6ei3P66K56MsCgmZ5RKsxBqriNF9fzglwtvuoZ'

##key = tweepy.OAuthHandler(consumer_key ,consumer_key_secret)
#key.set_access_token(access_token, access_token_secret)

#api = tweepy.API(key)
#print api.me().name

class TweetListener(tweepy.StreamListener):
    def on_status(self, status):
        print('Tweet text: ' + status.text)
        return True

    def on_error(self, status_code):
        print('Got an error with status code: ' + str(status_code))
        return True

    def on_timeout(self):
        print('Timeout..')
        return True

if __name__ == '__main__':
     listener = TweetListener()
     auth = tweepy.OAuthHandler(consumer_key, consumer_key_secret)
     auth.set_access_token(access_token, access_token_secret)
        
     stream = tweepy.Stream(auth, listener)
     stream.filter(follow=[], track=['#rockstargames','#gtav'])
