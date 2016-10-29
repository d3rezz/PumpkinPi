import RPi.GPIO as GPIO
import requests
from requests.auth import HTTPBasicAuth
from bs4 import BeautifulSoup
import time

GPIO.setmode(GPIO.BOARD)
GPIO.setup(3, GPIO.OUT)

while True:
	print "Fetching status..."
	r = requests.get('url', auth=HTTPBasicAuth('username', 'password'))

	if r.status_code == requests.codes.ok:
		print r.text
		html = r.text
		parsed_html = BeautifulSoup(html)
		status_string = parsed_html.body.find('h2').text
		status = status_string.split(": ", 2)[1]
		print "Current Status: " + status
		
		if status == 'On':
			print "leds on"
			GPIO.output(3, True)
		else:
			print "leds off"
			GPIO.output(3, False)
	else:
		print "Server Error"

	time.sleep(10) 	#sleep 10 seconds
