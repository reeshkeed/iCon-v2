import random, MySQLdb
from escpos import printer
from PIL import Image, ImageDraw, ImageFont

#Code printing
p = printer.File("/dev/usb/lp0")

img = Image.new('RGB', (370, 70), color = (255, 255, 255))
fnt = ImageFont.truetype('font.ttf', 74)

code = ''.join(random.choice('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ') for i in range(5))

d = ImageDraw.Draw(img)
d.text((80, 5),code, font=fnt, fill=(0, 0, 0))

img.save('/tmp/code.png')

p.image('logo.png')
p.image("/tmp/code.png")

p.cut()

#Saving random code to database
con = MySQLdb.connect("localhost", "admin", "password", "icon")

mycursor = con.cursor()

mycursor.execute("INSERT INTO user(passcode, status) VALUES('" +code+ "', 'inactive')")

con.commit()
con.close()

print(mycursor.rowcount, "new code generated")
