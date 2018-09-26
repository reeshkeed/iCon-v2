import random, MySQLdb, datetime
from escpos import printer
from PIL import Image, ImageDraw, ImageFont

#Code printing
p = printer.File("/dev/usb/lp0")

currentDT = datetime.datetime.now()
dateNow = currentDT.strftime("%b %d, %Y (%a)")
timeNow = currentDT.strftime("%I:%M:%S %p")

img = Image.new('RGB', (370, 70), color = (255, 255, 255))
fnt = ImageFont.truetype('font.ttf', 74)

code = ''.join(random.choice('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ') for i in range(5))

d = ImageDraw.Draw(img)
d.text((70, 5), "TINTIN", font=fnt, fill=(0, 0, 0))

img.save('/tmp/code.png')

p.image('header.png')
p.image('/tmp/code.png')
p.text(dateNow.center(42, ' '))
p.text(timeNow.center(42, ' '))

p.cut()

"""
#Saving random code to database
con = MySQLdb.connect("localhost", "admin", "password", "icon")

mycursor = con.cursor()

mycursor.execute("INSERT INTO user(passcode, status) VALUES('" +code+ "', 'inactive')")

con.commit()
con.close()

print(mycursor.rowcount, "new code generated")
"""
