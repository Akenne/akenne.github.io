import glob
list2 = glob.glob("C:/Users/Adam/desktop/a/*.jpg")

# for i in list2:
# 	i = i.replace("C:/Users/Adam/Documents/akenne.github.io/gallery/","").replace("/","\\")
# 	print("<li data-src=\"" + i + "\">")
# 	print("<a href=\"\">")
# 	print("<img src=\"" + i + "\">")
# 	print("</a>")
# 	print("</li>")

sizes = [(240,240)]

from PIL import Image

size = 1920, 1080

for infile in list2:
    im = Image.open(infile)
    im.thumbnail(size)
    im.save(infile, "JPEG")
