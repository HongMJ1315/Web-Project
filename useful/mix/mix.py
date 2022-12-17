#取得資料夾所有圖片
import os
from PIL import Image
def get_all_files(path):
    files = []
    for root, dirs, filenames in os.walk(path):
        for f in filenames:
            files.append(os.path.join(root, f))
    return files


res=get_all_files(".")
all=[]
for i in res:
    if (i[-4:]!=".png") or (i[0:6]=="border"):
        continue
    all.append(i.replace(".\\",""))
    
print(all)
imgSize = (1080, 1920)
border=Image.open("..\\border.png").convert("RGBA")
border=border.resize(imgSize)
for i in all:
    if(i=="border.png"):
        continue
    img= Image.open(i)
    img=img.resize(imgSize).convert("RGBA")
    img=Image.alpha_composite(img,border)
    img.save("fix\\"+i)