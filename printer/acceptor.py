import RPi.GPIO as GPIO
import time
import random, MySQLdb, datetime
from escpos import printer
from PIL import Image, ImageDraw, ImageFont

GPIO.setmode(GPIO.BCM)

GPIO.setup(14, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)

counter = 0
last_insert_time = time.time()
has_new_coin = False

def add_coin(channel):
	global counter, last_insert_time, has_new_coin
	
	counter += 1
	last_insert_time = current_time
	has_new_coin = True

GPIO.add_event_detect(14, GPIO.RISING, callback=add_coin, bouncetime=5)

try:
        while True:
		current_time = time.time()

		if ((current_time - last_insert_time) > 5 and has_new_coin):
			has_new_coin = False
						
			coins = str (counter)
			#Code printing
			p = printer.File("/dev/usb/lp0")

			currentDT = datetime.datetime.now()
			dateNow = currentDT.strftime("%b %d, %Y (%a)")
			timeNow = currentDT.strftime("%I:%M:%S %p")

			img = Image.new('RGB', (370, 70), color = (255, 255, 255))
			fnt = ImageFont.truetype('font.ttf', 74)

			code = ''.join(random.choice('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ') for i in range(5))

			d = ImageDraw.Draw(img)
			d.text((70, 5), code, font=fnt, fill=(0, 0, 0))

			img.save('/tmp/code.png')

			p.image('header.png')
			p.image('/tmp/code.png')
			p.text(coins.center(42, ' '))
			p.text(dateNow.center(42, ' '))
			p.text(timeNow.center(42, ' '))

			p.cut()
			print counter
			int (counter)
			counter = 0

		time.sleep(1)

except KeyboardInterrupt:
        GPIO.cleanup()
