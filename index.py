#!/usr/bin/python3
import io
import random
import json
import urllib
import urllib2
import re
def application(req,resp):
    # Json String of format {
    #   "group_id":"bot_id"
    # }
    botstr = ''
    bots = json.loads(botstr)
    data = json.loads(req['wsgi.input'].read(int(req.get('CONTENT_LENGTH',0))))
    text = data['text']
    body = ""


    #Actual Logic
    if re.search(r'\btrump\b', text, re.I):
        quotes = [line.rstrip('\n') for line in open('PATH TO quotes.txt')]
        body = quotes[random.randint(0,(len(quotes) - 1))]
        url = "https://api.groupme.com/v3/bots/post"
        group_id = data['group_id']
        values = {'text':body,"bot_id":bots[group_id]}
        post = urllib.urlencode(values)
        req = urllib2.Request(url,post)
        response = urllib2.urlopen(req)

    # Return status
    status = '200 OK'
    response_headers = [('Content-Type', 'text/plain'),
                        ('Content-Length', str(len(body)))]
    resp(status, response_headers)
    return [body]
